<?php

// database connectie
$dbhost = "mariadb";
$dbuser = "user";
$dbpass = "password";
$dbname = "projectweek5B";

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
