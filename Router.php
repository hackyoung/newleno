<?php
namespace Leno;

/**
 * Router 通过一个Uri路由到正确的controller and action
 */
class Router
{
    protected $path;

    protected $rules = [];

    protected $base;

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
        $rules = $this->rules;

        foreach($rules as $reg => $rule) {
            if(preg_match($reg, $this->path)) {
                $target = $this->handleRule($reg, $rule);
            }
        }
        if(!$target['controller']) {
            $patharr = array_merge(
                explode('/', $this->base), 
                explode('/', $this->path)
            );
            $path = preg_replace( '/\\$/', '',
                implode('\\', array_map(function($p) {
                    return \camelCase($p);
                }, $patharr))
            );
        
            $target['controller'] = preg_replace('/\\.+$/U', '', $path);
            $target['action'] = \unComelCase(
                $patharr[count($patharr - 1)]
            );
        }
        $this->beforeRoute($request, $response);
        $this->invoke($target);
        $this->afterRoute();
    }

    protected function invoke($target)
    {
        $controller = new ReflectionClass($target['controller']);
        $action = $rc->getMethod($target['action']);
        $response = $action->invoke($controller, $target['parameters']);
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
