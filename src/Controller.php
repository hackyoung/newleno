<?php
namespace Leno;

use \Leno\View\View as View;
use \Leno\View\Template as Template;

abstract class Controller
{
    protected $view_dir = ROOT . '/View';

    protected $request;

    protected $response;

    protected $title;

    protected $keyword;

    protected $data = [];

    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
        $this->initialize();
    }

    protected function initialize()
    {
    }

    protected function set($key, $val)
    {
        $this->data[$key] = $val;
    }

    protected function render($view, $data=[])
    {
        $data = array_merge($this->data, $data);
        (new View($view, $data))->display();
    }

    protected function checkParameters($var, $rules)
    {
        try {
            return (new \Leno\Validator)->execute($var, $rules);
        } catch(\Exception $e) {
            $this->response($e->getCode(), $e->getMessage());
            return false;
        }
    }

    protected function response($code, $message)
    {
        $response = $this->response->withStatus($code);
        $response->write($message);
        $this->response = $response;
    }
}
