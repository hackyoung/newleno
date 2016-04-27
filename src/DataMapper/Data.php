<?php
namespace \Leno\DataMapper;

class Data implements \JsonSerializable
{
    /**
     * @var ['value' => '', 'dirty' => ''];
     */
    protected $data;

    protected $config = [];

    public function set($key, $val)
    {
        $data = $this->data[$key] ?? null;
        if($data && $val === $data['value']) {
            return true;
        }
        if(!$this->validate($key, $val)) {
            return false;
        }
        $this->data[$key] = ['value' => $val, 'dirty' => true];
    }

    public function get($key)
    {
        $data = $this->data[$key] ?? ['value' => null];
        return $data['value'];
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
            return false;
        }
        $config = $this->config[$key];
    }

    public function __set($key, $val)
    {
        return $this->set($key, $val);
    }

    public function __get($key)
    {
        return $this->get($key);
    }

    public function jsonSerialize()
    {
        json_encode($data);
    }

    public function getConfig($key)
    {
        return $this->normalizeConfig($key);
    }

    public function getConfigs()
    {
        return $this->config;
    }
}
