<?php
namespace \Leno\DataMapper;

class Data implements \JsonSerializable
{
    /**
     * @var ['value' => '', 'dirty' => '',];
     */
    protected $data;

    protected $config = [];

    public function __construct($config = null)
    {
        if(is_array($config)) {
            $this->config = config;
        }
    }

    public function __call($method, $parameters=null)
    {
        if(preg_match('/^get\w+/', $method)) {
            return $this->get(unComelCase(preg_replace('/^get/', '', $method)));
        }
        if(preg_match('/^set\w+/', $method)) {
            return $this->set(unComelCase(preg_replace('/^set/', '', $method)), $paramters);
        }
        throw new \Exception($method . ' Not Define');
    }

    public function __set($key, $val)
    {
        return $this->set($key, $val);
    }

    public function __get($key)
    {
        return $this->get($key);
    }

    public function set($key, $val)
    {
        $data = $this->data[$key] ?? null;
        if($data) {
            $dirty = true;
        } else {
            $dirty = false;
        }
        if($data && $val === $data['value']) {
            return true;
        }
        if(!$this->validate($key, $val)) {
            return false;
        }
        $this->data[$key] = [
            'value' => $val, 'dirty' => $dirty
        ];
        return true;
    }

    public function get($key)
    {
        $data = $this->data[$key] ?? ['value' => null];
        return $data['value'];
    }

    public function isset($key)
    {
        return $this->get($key) ? true : false;
    }

    public function isDirty($key)
    {
        if(!isset($this->data[$key])) {
            throw new \Exception($key . ' Not Found');
        }
        return $this->data[$key]['dirty'];
    }

    public function validate($key, $val)
    {
        if(!isset($this->config[$key])) {
            return true;
        }
        $config = $this->config[$key];
        return (new \Leno\Validator($config, $key))->check($val);
    }

    public function jsonSerialize()
    {
        $data = [];
        foreach($this->data as $k=>$val) {
            if($val instanceof \Datetime) {
                $data = $val->format('Y-m-d H:i:s');
                continue;
            }
            $data = $val;
        }
        return json_encode($data);
    }

    public function getConfig($key)
    {
        return $this->config[$key] ?? false;
    }

    public function getConfigs()
    {
        return $this->config;
    }
}
