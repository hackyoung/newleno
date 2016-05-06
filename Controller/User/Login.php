<?php
namespace Controller\User;

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
            $this->getService('user.login', [
                $username, $password
            ])->execute();
        } catch(\Exception $ex) {
            throw new Exception(500, $ex->getMessage());
        }
        return $this->output('操作成功');
	}
}
