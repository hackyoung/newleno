<?php
namespace Controller\User;

class Register extends \Controller\App
{
	public function index()
	{
		$this->render('user.register');
	}

	public function modify()
	{
		$this->checkParameters($_POST, [
			'username' => ['type' => 'string'],
			'password' => ['type' => 'string'],
		]);
	}
}
