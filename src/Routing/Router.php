<?php
namespace Leno\Routing;

/**
 * Router 通过一个Uri路由到正确的controller and action
 * 这个Router可以通过规则路由到其他Router，也可以路由到controller
 */
class Router
{
    const TYPE_ROUTER = 'Router';

    const TYPE_CONTROLLER = 'Controller';

    const MOD_NORMAL = 0;

    const MOD_RESTFUL = 1;

    protected $request;

    protected $response;

    protected $path;

    protected $rules = [];

    protected $base = 'controller';

    protected $mode = self::MOD_NORMAL;

    protected $restful = [
        'GET' => 'index',
        'POST' => 'add',
        'DELETE' => 'delete',
        'PUT' => 'edit',
    ];

    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
        $this->path = $this->getPath();
    }


    public function route()
    {
        $this->beforeRoute();
        foreach($this->rules as $reg => $rule) {
            if(preg_match($reg, $this->path)) {
                return $this->handleRule($reg, $rule);
            }
        }
        $target = $this->getTarget();
        $this->response = $this->invoke($target);
        $this->afterRoute();
        $this->send($this->response);
    }

    protected function invoke($target)
    {
        try {
            $rs = new \ReflectionClass($target['controller']);
        } catch(\Exception $e) {
            return $this->_404();
        }
        $controller = $rs->newInstance($this->request, $this->response);
        if(!$rs->hasMethod($target['action'])) {
            return $this->_404();
        }
        if($rs->hasMethod('beforeExecute')) {
            $rs->getMethod('beforeExecute')->invoke($controller);
        }
        $action = $rs->getMethod($target['action']);
        $result = $action->invoke($controller, $target['parameters']);
        if($rs->hasMethod('afterExecute')) {
            $rs->getMethod('afterExecute')->invoke($controller);
        }
        $this->response->getBody()->write($result);
        return $this->response;
    }

    protected function handleRule($regexp, $rule)
    {
        $rule = $this->normalizeRule($rule);
        if($rule['type'] == self::TYPE_ROUTER) {
            $request= $this->request->withUri(
                new \GuzzleHttp\Psr7\Uri(
                    preg_replace(
                        $regexp, '',
                        (string)$this->request->getUri()
                    )
                )
            );
            try {
                $rc = new \ReflectionClass($rule['target']);
            } catch(\Exception $e) {
                throw new \Leno\Exception(
                    'router:'.$rule['target'].' not found'
                );
            }
            $rc->getMethod('route')->invoke(
                $rc->newInstance($request, $this->response)
            );
        }
    }

    protected function beforeRoute()
    {
    }

    protected function afterRoute()
    {
    }

    protected function normalizeRule($rule)
    {
        if(!isset($rule['type'])) {
            $ret = [
                'type' => self::TYPE_CONTROLLER,
                'target' => $rule
            ];
        } else {
            $ret = $rule;
        }
        return $ret;
    }

    protected function send($response)
    {
        if (!headers_sent()) {
            $code = $response->getStatusCode();
            $version = $response->getProtocolVersion();
            if ($code !== 200 || $version !== '1.1') {
                header(sprintf('HTTP/%s %d %s', $version, $code, $response->getReasonPhrase()));
            }

            $header = $response->getHeaders();
            foreach ($header as $key => $value) {
                $key = ucwords(strtolower($key), '-');
                if (is_array($value)) {
                    $value = implode(',', $value);
                }
                header(sprintf('%s: %s', $key, $value));
            }
        }

        $body = $response->getBody();
        if ($body instanceof \Owl\Http\IteratorStream) {
            foreach ($body->iterator() as $string) {
                echo $string;
            }
        } else {
            echo (string)$body;
        }
    }

    private function getPath()
    {
        $path = trim(preg_replace(
            '/^.*index\.php/U', '', 
            (string)$this->request->getUri()
        ), '\/') ?: (
            ($this->mode === self::MOD_RESTFUL) ?
            'index' : 'index/index'
        );
        return $path;
    }

    private function getTarget()
    {
        $patharr = array_merge(
            explode('/', $this->base),
            explode('/', $this->path)
        );
        $path = array_filter(array_map(function($p) {
            return \camelCase($p);
        }, $patharr));
    
        if($this->mode == self::MOD_RESTFUL) {
            return $this->getRestFulTarget($path);
        } else {
            $target = [
                'controller' => false,
                'action' => false,
                'parameters' => [],
            ];
            $target['action'] = preg_replace_callback('/^\w/', function($matches) {
                if(isset($matches[0])) {
                    return strtolower($matches[0]);
                }
            }, preg_replace('/\..*$/', '', array_pop($path)));
            $target['controller'] = implode('\\', $path);
            return $target;
        }
    }

    private function getRestfulTarget($path)
    {
        $method =strtoupper(
            isset($_POST['_method']) ? 
            $_POST['_method'] : $this->request->getMethod()
        );
        if(!isset($this->restful[$method])) {
            throw new \Leno\Exception($method . ' not supported!');
        }
        $target = [
            'controller' => implode('\\', $path),
            'action' => $this->restful[$method],
            'parameters' => [],
        ];
        return $target;
    }

    private function _404()
    {
        $response = $this->response->withStatus(404);
        $response->getBody()->write('<h1><center>404 '.$response->getReasonPhrase().'</center></h1>');
        return $response;
    }
}
