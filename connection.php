<?php
//start session
session_start();
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "root");
define("DATABASE", "pin");
define("PORT", "8889");
//new pdo connection
$pdo = new PDO('mysql:host=localhost;port=' . PORT . ';dbname=' . DATABASE, USER, PASSWORD);

function encrypt($string, $key)
{
    $result = '';
    return sha1($string);
}
