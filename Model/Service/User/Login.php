<?php
namespace Model\Service\User;

class Login extends \Model\Service\User
{
    public function execute()
    {
        $user = \Model\Entity\User::selector()
            ->byEqEmail($this->username)
            ->findOne();
        if(empty($user)) {
            throw new \Exception('用户名不存在');
        }
        if($user->getPassword() !== self::crypt($this->password)) {
            throw new \Exception('密码不正确');
        }
        self::setCurrentUser($user);
    }
}
