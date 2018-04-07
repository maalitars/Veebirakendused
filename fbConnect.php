<?php
include_once 'helper.php';
include_once '/facebook/facebook-php-sdk/src/Facebook/autoload.php';

$host = 'host';
$user = 'username';
$pass = 'password';
$db = 'database';

$mysqli = mysqli_connect(config($host), config($user), config($pass), config($db));

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

$username = "";
$email = "";
$passwdHash = "";

$options = [
    'cost' => 13,
];

//kasutaja jm errorite jaoks
$errors = array();

if (isset($_SESSION['fbUserId'])) {
    $userId = $_SESSION['fbUserId'];
    $userEmail = $_SESSION['fbUserEmail'];

    $queryFbId = "SELECT fbid FROM fbusers WHERE fbid = $userId";
    $resultsFbId = $mysqli->query($queryFbId);
    if ($resultsFbId) {
        $fbId = mysqli_fetch_array($resultsFbId)[0];
        mysqli_free_result($resultsFbId);
    }

    if (!isset($fbId)) {
        //Kasutaja email on märgitud -> kontrollime, kas selline email on meie andmebaasis
        if (isset($userEmail)) {
            $queryFbEmail = "SELECT email FROM fbusers WHERE email = $userEmail";
            $resultsFbEmail = $mysqli->query($queryFbEmail);
            if ($resultsFbEmail) {
                $fbEmail = mysqli_fetch_array($resultsFbEmail)[0];
                mysqli_free_result($resultsFbEmail);
            }
            if (isset($fbEmail)) {
                $queryRowCount = "SELECT COUNT(*) FROM fbusers";
                $resultRowCount = $mysqli->query($queryFbEmail);
                if ($resultRowCount) {
                    $rowCount = mysqli_fetch_array($resultRowCount)[0];
                }
                mysqli_free_result($resultRowCount);
                $newUsername = "user" . $rowCount;
                $queryAddUser = "INSERT INTO fbusers (fbid, email,username) VALUES ('$userId','$userEmail','$newUsername')";
                $mysqli->query($queryAddUser);
                $_SESSION['username'] = $newUsername;
                $_SESSION['loggedin'] = true;
                mysqli_free_result($resultRowCount);
            } else {
                $queryEmailUser = "SELECT username FROM fbusers WHERE email = $userEmail";
                $resultsEmailUser = $mysqli->query($queryEmailUser);
                if ($resultsEmailUser) {
                    $emailUser = mysqli_fetch_array($resultsEmailUser)[0];
                    $_SESSION['username'] = $emailUser;
                    $_SESSION['loggedin'] = true;
                    mysqli_free_result($resultsEmailUser);
                }
            }

        } else {
            $queryRowCount = "SELECT COUNT(*) FROM fbusers";
            $resultRowCount = mysqli_query($mysqli, $queryRowCount);
            $newUserNo = mysqli_fetch_array($resultRowCount)[0];
            $newUsername = "user" . $newUserNo;
            try {
                $queryAddUser = "INSERT INTO fbusers (fbid,username) VALUES ('$userId', '$newUsername')";
                if ($mysqli->query($queryAddUser) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $queryAddUser . "<br>" . $mysqli->error;
                }
            } catch (mysqli_sql_exception $e) {
                echo $e->getMessage();
            }
            $_SESSION['username'] = $newUsername;
            $_SESSION['loggedin'] = true;
            mysqli_free_result($resultRowCount);

        }
    } else {
        $queryUsername = "SELECT username FROM fbusers WHERE fbid = $userId";
        $resultsUsername = $mysqli->query($queryUsername);
        if ($resultsUsername) {
            $fbUsername = mysqli_fetch_array($resultsUsername)[0];
            $_SESSION['username'] = $fbUsername;
            $_SESSION['loggedin'] = true;
            mysqli_free_result($resultsUsername);
        }
    }
}