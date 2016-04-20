<?php
namespace Controller;

class Tasks extends \Controller\App
{
	/**
	 * 查看任务列表
	 */
	public function index()
	{
		/*
        $user = new \Model\User();
        $user->setName('young');
        $user->setEmail('hackyoung@163.com');
        $user->setPassword('111111');

        $category = new \Model\Category();
        $category->setLabel('test');

        $task = new \Model\Task();
        $task->setTitle('test title');
        $task->setDescription('test description');
        $task->setRequirement('test requirement');
        $task->setMinPrice(110000);
        $task->setMaxPrice(220000);
        $task->setUser($user);
        $task->setCategory($category);
        $task->save();
		 */
		$this->set('list', [
			1,2,3,4,4,5,4,3,2,2,43,4,23,23,
		]);
        $this->render('tasks');
	}
}
