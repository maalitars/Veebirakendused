<?php
    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['first_name'] = $_POST['firstname'];
    $_SESSION['last_name'] = $_POST['lastname'];

    $first_name = $mysqli->escape_string($_POST['firstname']);
    $last_name = $mysqli->escape_string($_POST['lastname']);
    $email = $mysqli->escape_string($_POST['email']);
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $mysqli->escape_string(md5(rand(0, 1000)));

// Kas kasutaja eksisteerib?
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
    if ($result->num_rows > 0) {

        $_SESSION['message'] = 'Selline kasutaja juba eksisteerib';
        header("location: error.php");

    } else {
        $sql = "INSERT INTO users (first_name, last_name, email, password, hash) "
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

        // Add user to the database
        if ($mysqli->query($sql)) {
            $_SESSION['message'] =
                "Tervitus sõnum on saadetud teie emailile: $email.";
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $email;

            $to = $email;
            $subject = 'Kasutaja kinnitus lehelt SeenItAll';
            $message_body = '
            Tere ' . $first_name . ',

            Täname, et kasutad SeenItAll veebilehte!';
            $headers = "From: seenitalloffical@gmail.com";
            mail($to, $subject, $message_body, $headers);
            header("location: welcome.php");
        }
    }
