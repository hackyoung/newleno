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

    public function exceptionHandler($e, $request, $response)
    {
        if($e instanceof \Leno\Http\Exception) {
            $response->withStatus($e->getCode())
                ->write($e->getMessage());
        }
    }
}
