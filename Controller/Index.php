<?php
namespace Controller;
use \Leno\DataMapper\Table\Selector;
use \Leno\DataMapper\Table;

class Index extends App
{
    public function index()
    {
		$this->render('index');
    }
}
