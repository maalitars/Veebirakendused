<?php
/* Kasutaja sisselogimise protsess */
session_start();

$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ($result->num_rows == 0) {
    $_SESSION['message'] = "Sellist kasutajat ei eksisteeri!";
    header("location: error.php");
} else { // Kasutaja on olemas
    $user = $result->fetch_assoc();

    if (password_verify($_POST['password'], $user['password'])) {

        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['logged_in'] = 1;

        //vaatab, mis urlil inimene oli enne sisse logimist
        if(isset ($_SESSION['url'])){
            $url = $_SESSION['url'];
        }else{
            $url = "/pages/esileht.php";
        }
        header("location: http://46.101.6.112$url");
    } else {
        $_SESSION['message'] = "Vale parool, proovi uuesti!";
        header("location: error.php");
    }
}
