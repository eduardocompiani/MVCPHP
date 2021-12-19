<?php

require_once "../vendor/autoload.php";

$app = new App\MyClass();
echo $app->getHello();

error_log("Working log");

\App\TestDatabase::run();