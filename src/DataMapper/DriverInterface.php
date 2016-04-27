<?php
namespace DataMapper;

interface DriverInterface
{
    public function beginTransaction();

    public function commit();

    public function errorCode();

    public function errorInfo();

    public function exec();

    public function query();

    public function getAttribute();

    public function getAvailableDrivers();

    public function inTransaction();

    public function lastInsertId();

    public function prepare();

    public function quote();

    public function rollback();

    public function setAtttribute();
}
