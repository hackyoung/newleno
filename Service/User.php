<?php
namespace Service;

class User extends Service
{
    private $entity;

    public static $type = [
        'normal',
        'anonymous',
    ];
    public function __construct()
    {
    }

    public function isAnonymous()
    {
        return $this->entity ? true : false;
    }

    public function __call($name, $parameters=null)
    {
        
    }

    public function __get($key)
    {
        if($this->isAnonymous()) {
            throw new \Exception('atempt read property on anonymous');
        }
        return $this->entity->key;
    }

    public function __set($key, $val)
    {
        $this->entity->$key = $val;
    }

    public static function getCurrent()
    {

    }
}
