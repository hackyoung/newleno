<?php
namespace Model\Service;

abstract class User extends \Model\Service
{
    protected $username;

    protected $password;

    public function __construct($username, $password)
    {
        try {
            (new \Leno\Validator([
                'type' => 'email'
            ], 'username'))->check($username);
        } catch(\Exception $ex) {
            throw new \Leno\Exception('用户名不是一个Email');
        }
        try {
            (new \Leno\Validator(['type' => 'string', 'extra' => [
                'max_length' => 64, 'min_length' => 6
            ]], 'username'))->check($username);
        } catch(\Exception $ex) {
            throw new \Leno\Exception('密码不合法');
        }
        $this->username = $username;
        $this->password = $password;
    }

    public static function crypt($password)
    {
        return md5($password);
    }
}
