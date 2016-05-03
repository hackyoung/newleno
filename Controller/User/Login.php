<?php
namespace Controller\User;

use \Model\Service\User\Login as Login;
use \Leno\Http\Exception;

class Login extends \Controller\App
{
	public function index()
	{
		$this->render('user.login');
	}

	public function modify()
	{
        $username = $this->input('username');
        $passowrd = $this->input('password');
        try {
            (new Login($username, $password))->execute();
        } catch(\Exception $ex) {
            throw new Exception(400, $ex->getMessage());
        }
        return '操作成功';
	}
}
