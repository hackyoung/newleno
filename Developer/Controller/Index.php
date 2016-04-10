<?php
namespace Developer\Controller;

class Index extends \Developer\Controller
{
    public function index()
    {
        $this->title = 'hello world';
        $this->keywords = 'hello,world';
        $this->description = 'hello world';
        if(!$this->checkParameters([
            'hello' => 'jjj',
            'world' => 'world'
        ], [
            'hello' => [
                'type' => 'string',
            ],
            'world' => [
                'type' => 'uuid',
                'notPass' => function($key, $rule) {
					throw new \Exception('请填写world');
                }
            ]
        ])) {
            return $this->response;
        }
        $this->set('hello', 'helloworld');
        $this->set('llist', [
            1, 2, 3, 4, 5
        ]);
        $this->render('index');
        return ['hello' => 'world', 'hhh' => 'jfak'];
    }
}
