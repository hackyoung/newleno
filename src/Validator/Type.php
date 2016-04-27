<?php
namespace Leno\Validator;

abstract class Type
{
    public static $types = [
        'int' => '\Leno\Validator\Type\Number',
        'integer' => '\Leno\Validator\Type\Number',
        'number' => '\Leno\Validator\Type\Number',
        'enum' => '\Leno\Validator\Type\Enum',
        'array' => '\Leno\Validator\Type\Arrayl',
    ];

    abstract public function check($val);

    public static function get($idx)
    {
        if(!isset(self::$handler[$idx])) {
            throw new \Exception($idx . ' Not Surpported');
        }
        return self::$handler[$idx];
    }

    public static function register($idx, $class)
    {
        self::$handler[$idx] = $class;
    }
}
