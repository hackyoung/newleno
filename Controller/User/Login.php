<?php
namespace Controller\User;

class Login extends \Controller\App
{
	public function index()
	{
		$this->render('user.login');
	}

	public function modify()
	{
		$this->checkParameters($_POST, [
			'username' => ['type' => 'string'],
			'password' => ['type' => 'string'],
		]);
	}
}
