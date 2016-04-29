<?php
namespace Model;

class Entity extends \Leno\DataMapper\Mapper
{
    protected $table = 'user';

    protected $attributes = [
        'id' => ['type' => 'uuid'],
        'name' => ['type' => 'string', 'extra' => ['max_length' => 32]],
        'age' => ['type' => 'int', 'extra' => ['min' => 0, 'max' => 200]],
        'created' => ['type' => 'datetime', 'required' => false],
    ];

    protected static $primary = 'id';

    protected static $unique = ['id'];

}
