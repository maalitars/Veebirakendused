<?php
require '../db.php';
    session_start();
$sql = 'SELECT * FROM users';
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $useremail = $_SESSION["email"];
        echo $useremail;
        $res = $mysqli->query("DELETE FROM users WHERE users.email= '$useremail'") or die($mysqli->error);
}
$_SESSION['email'] = "";
}
header('Location: ../index.php');
