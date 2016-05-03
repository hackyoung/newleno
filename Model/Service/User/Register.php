<?php
namespace Model\Service\User;

class Register extends Model\Service\User
{
    protected $address;

    protected $age;

    protected $gender;

    public function execute()
    {
        $user = new \Model\Entity\User;
        $user->setEmail($this->username)
            ->setPassword(self::crypt($this->password))
            ->setName($this->username)
            ->setAge($this->age)
            ->setAddress($this->address)
            ->setGender($this->gender)
            ->save();
        self::setCurrentUser($user);
    }

    public function __set($attr, $val)
    {
        $this->$attr = $val;
        return $this;
    }
}
