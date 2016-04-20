<?php
require __DIR__."/vendor/autoload.php";
require __DIR__."/generated-conf/config.php";

define('BASE_URL', preg_replace('/index.php\/$/', '',base_url()));
define('ROOT', __DIR__);

\Leno\Worker::setRouterClass('\\Router');

\Leno\View\Template::setCacheDir(ROOT . '/tmp/view');
\Leno\View::addViewDir(ROOT . '/View');

$worker = \Leno\Worker::instance();
$worker->execute();
