<?php
namespace Leno;

/**
 * Router 通过一个Uri路由到正确的controller and action
 */
class Router
{
    protected $path;

    protected $rules = [];

    protected $base = "Controller";

    public function __construct(string $path, array $rules=[])
    {
        $this->path = $path;
        $this->rules = array_merge($this->rules, $rules);
    }

    public function route($request, $response)
    {
        $target = [
            'controller' => false,
            'action' => false,
            'parameters' => []
        ];
        foreach($this->rules as $reg => $rule) {
            if(preg_match($reg, $this->path)) {
                $target = $this->handleRule($reg, $rule);
            }
        }
        if(!$target['controller']) {
            $patharr = array_filter(array_merge(
                explode('/', $this->base), 
                explode('/', $this->path)
            ));
            $path = array_values(array_map(function($p) {
                return \camelCase($p);
            }, $patharr));
            $target['action'] = preg_replace_callback('/^([A-Z])/', function($matches) {
                if(isset($matches[0])) {
                    return strtolower($matches[0]);
                }
            }, $path[count($path) - 1]);
            array_splice($path, count($path) - 1, 1);
            $target['controller'] = implode('\\', $path);
        }
        $this->beforeRoute();
        $this->invoke($target, $request, $response);
        $this->afterRoute();
    }

    protected function invoke($target, $request, $response)
    {
        try {
            $rc = new \ReflectionClass($target['controller']);
        } catch(\ReflectionException $e) {
            return $response->withStatus(404);
        }
        if(!$rc->hasMethod($target['action'])) {
            return $response->withStatus(404);
        }
        $controller = $rc->newInstance($request, $response);
        $action = $rc->getMethod($target['action']);
        if($rc->hasMethod('beforeExecute')) {
            $before = $rc->getMethod('beforeExecute');
            $before->invoke($controller);
        }

        $result = $action->invoke($controller, $target['parameters']);

        if($rc->hasMethod('afterExecute')) {
            $before = $rc->getMethod('beforeExecute');
            $before->invoke($controller);
        }
        if($result instanceof \GuzzleHttp\Psr7\Stream) {
            $response->withBody($result);
        } else if(is_string($result)) {
            $response->withBody(new \GuzzleHttp\Psr7\Stream($result));
        } else {
            throw new \Exception('result error');
        }
        $response;
    }

    protected function handleRule()
    {
    
    }

    protected function beforeRoute()
    {
    
    }

    protected function afterRoute()
    {
    
    }
}
