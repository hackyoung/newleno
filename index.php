<?php
define('ROOT', dirname(__FILE__));

require dirname(__FILE__)."/vendor/autoload.php";
require dirname(__FILE__)."/Router.php";
require dirname(__FILE__)."/Developer/Router.php";
require dirname(__FILE__)."/Developer/Controller.php";
require dirname(__FILE__)."/Developer/Controller/Index.php";

\Leno\Worker::setRouterClass('Router');
$worker = \Leno\Worker::instance();
$worker->execute();
