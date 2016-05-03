<?php
namespace Model;

abstract class Service
{
    protected $user;

    abstract public function execute();

    public static function setCurrentUser(\Model\Entity\User $user)
    {
    }

    public static function getCurrentUser()
    {
    }
}
