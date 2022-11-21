<?php

include "/var/www/html/functions/config.php";

$db = new PDO("pgsql:host=db;port=5432;dbname=prj1", $username, $password);