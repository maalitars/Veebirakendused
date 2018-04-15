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

/*if (isset($_POST['login'])){
    $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
}*/
