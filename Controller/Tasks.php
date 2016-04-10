<?php
namespace Controller;

class Tasks extends \Controller\App
{
	/**
	 * 查看任务列表
	 */
	public function index()
	{
        $this->set('list', [
            1,2,3,4,5,6,7,8,9,0
        ]);
        $this->render('index');
	}
}
