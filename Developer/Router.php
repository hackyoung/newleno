<?php
namespace Developer;

class Router extends \Leno\Routing\Router
{
    protected $base = 'developer/controller';

    protected $mode = self::MOD_RESTFUL;
}
