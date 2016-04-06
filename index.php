<?php
define('ROOT', dirname(__FILE__));

require dirname(__FILE__)."/vendor/autoload.php";
define('BASE_URL', preg_replace('/index.php\/$/', '',base_url()));
\Leno\Worker::setRouterClass('\\Router');

\Leno\View\Template::setCacheDir(ROOT . '/tmp/view');
\Leno\View::addViewDir(ROOT . '/View');
$worker = \Leno\Worker::instance();
$worker->execute();