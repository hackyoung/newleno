<?php
require dirname(__FILE__) . "/vendor/autoload.php";

echo "<pre>";
var_dump(get_included_files());
\Leno\Worker::setRouterClass('Router');
$worker = \Leno\Worker::instance();
$worker->execute();
