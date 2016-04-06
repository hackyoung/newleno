<?php
namespace Leno;

use \Leno\View as View;
use \Leno\View\Template as Template;

abstract class Controller
{
    protected $view_dir = ROOT . '/View';

    protected $request;

    protected $response;

    protected $title = 'leno';

    protected $keywords = '';

    protected $description = '';

    protected $js = [];

    protected $css = [];

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
        if(!isset($data['__head__'])) {
            $data['__head__'] = [];
        }
        if(!empty($this->title)) {
            $data['__head__']['title'] = $this->title;
        }
        if(!empty($this->description)) {
            $data['__head__']['description'] = $this->description;
        }
        if(!empty($this->keywords)) {
            $data['__head__']['keywords'] = $this->keywords;
        }

        if(!empty($this->js)) {
            $data['__head__']['js'] = $this->js;
        }

        if(!empty($this->js)) {
            $data['__head__']['css'] = $this->css;
        }
        foreach($this->data as $k=>$d) {
            $data[$k] = $d;
        }
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
