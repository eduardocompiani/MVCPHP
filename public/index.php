<?php

require_once "../vendor/autoload.php";

$app = new App\MyClass();
echo $app->getHello();

\App\TestDatabase::run();