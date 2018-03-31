<?php
/* Realiseerib andmebaasi */
$host = '46.101.6.112';
$user = 'root';
$pass = 'ALMVeebirakendus';
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
