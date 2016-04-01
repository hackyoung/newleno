<?php
require dirname(__FILE__) . "/vendor/autoload.php";

$router = new \Leno\Router('/he_ll_o/world');
$router->route(
    new \GuzzleHttp\Psr7\Request('GET', ''),
    new \GuzzleHttp\Psr7\Response
);


