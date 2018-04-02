<?php

include_once 'helper.php';
/* Realiseerib andmebaasi */
$host = 'host';
$user = 'username';
$pass = 'password';
$db = 'database';

$mysqli = mysqli_connect(config($host), config($user), config($pass), config($db));

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}