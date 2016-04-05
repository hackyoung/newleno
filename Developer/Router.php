<?php
namespace Developer;

class Router extends \Leno\Routing\Router
{
    protected $base = 'developer/controller';

    protected $mode = self::MOD_RESTFUL;

    protected function beforeRoute()
    {
        \Leno\View\View::addViewDir(ROOT . '/Developer/View');
    }

    protected function handleResult($response)
    {
        $data = [];
        if(is_array($response)) {
            $data = $response;
        } elseif($response instanceof \Leno\Http\Response) {
            $this->response = $response;
        }

        $this->response = $this->response->withHeader('Content-Type', 'application/json')
            ->write(json_encode($data));
        return false;
    }
}
