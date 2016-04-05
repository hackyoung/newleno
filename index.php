<?php
define('ROOT', dirname(__FILE__));

require dirname(__FILE__)."/vendor/autoload.php";

\Leno\Worker::setRouterClass('\\Router');

\Leno\View\Template::setCacheDir(ROOT . '/tmp/view');
$worker = \Leno\Worker::instance();
$worker->execute();
