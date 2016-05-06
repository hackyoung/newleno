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
        $user = $this->inputs(['username', 'password']);
        try {
            $this->getService('user.register', $user)->execute();
        } catch(\Exception $e) {
            throw new Exception(500, $ex->getMessage());
        }
	}
}
