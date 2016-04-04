<?php

class Router extends \Leno\Routing\Router
{
    protected $rules = [
        '/developer/' => [
            'type' => self::TYPE_ROUTER,
            'target' => 'Developer\\Router',
        ],
        '/comsumer/' => [
            'type' => self::TYPE_ROUTER,
            'target' => 'Comsumer\\Router',
        ]
    ];
    public function beforeRoute()
    {
    }
}
