<?php
/* Database connection settings - REaliseerib andmebaasi */
$host = 'localhost';
$user = 'root';
$pass = ''; //pane siia oma DB  pass
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
