<?php
namespace Leno\DataMapper;

class Data implements \JsonSerializable, \Iterator
{
    /**
     * @var ['value' => '', 'dirty' => '',];
     */
    protected $data;

    /**
     * @var [
     *      'value' => [
     *          'type' => '',
     *          'required' => '', 
     *          'allow_empty' => '', 
     *          'extra' => []
     *      ],
     * ];
     */
    protected $config = [];

    protected $position = 0;

    public function __construct($data = [], $config = null)
    {
        if(is_array($config)) {
            $this->config = $config;
        }
        foreach($data as $k=>$v) {
            $this->set($k, $v, false);
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
        throw new \Exception($method . ' Not Defined');
    }

    public function __set($key, $val)
    {
        return $this->set($key, $val);
    }

    public function __get($key)
    {
        return $this->get($key);
    }

    public function set($key, $val, $dirty = true)
    {
        $data = $this->data[$key] ?? null;
        if($data && $val === $data['value']) {
            $this->data[$key]['dirty'] = true;
            return;
        }
        if(!$this->validate($key, $val)) {
            return;
        }
        $this->data[$key] = [
            'value' => $val, 'dirty' => $dirty
        ];
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

    public function each($callback)
    {
        foreach($this->data as $key=>$value) {
            if($callback($key, $this) === false) {
                return;
            }
        }
    }

    public function validate($key, $val)
    {
        if(!isset($this->config[$key])) {
            return true;
        }
        $config = $this->config[$key];
        return (new \Leno\Validator($config, $key))->check($val);
    }

    public function getConfig($key)
    {
        return $this->config[$key] ?? false;
    }

    public function getConfigs()
    {
        return $this->config;
    }
    /**实现json**/
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

    /**实现iterator**/
    public function rewind()
    {
        $this->position = 0;
    }

    public function valid()
    {
        if($k = $this->key()) {
            return $this->isset($k);
        }
        return false;
    }

    public function current()
    {
        if($k = $this->key()) {
            return $this->$k;
        }
    }

    public function key()
    {
        $pos = 0;
        $idx = null;
        foreach($this->data as $k => $val) {
            if($pos == $this->position) {
                break;
            }
            $idx = $k;
            $pos++;
        }
        if($pos < $this->position) {
            return false;
        }
        return $k;
    }

    public function next()
    {
        $this->position++;
        $pos = 0;
        foreach($this->data as $k=>$v) {
            if($pos++ === $this->position) {
                return $v;
            }
        }
    }
}
