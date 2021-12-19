<?php

namespace App;

use PDO;

class TestDatabase
{
    public static function run(): void
    {
        $host = "pgsql";
        $db = "applicationphp";
        $user = "root";
        $pw = "root";

        $myPDO = new PDO("pgsql:host=$host;dbname=$db", $user, $pw);

        $myPDO->query("INSERT INTO MYTABLE (DESCRIPTION) VALUES ('TEST PHP')");
    }
}