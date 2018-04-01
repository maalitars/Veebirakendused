<?php
/* Realiseerib andmebaasi */
$host = 'localhost';
$user = 'root';
$pass = 'ALMVeebirakendus';
$db = 'accounts';

$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
