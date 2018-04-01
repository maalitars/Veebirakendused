<?php
    /* Registration process, inserts user info into the database
       and sends account confirmation email message
     */

// Set session variables to be used on profile.php page
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['first_name'] = $_POST['firstname'];
    $_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
    $first_name = $mysqli->escape_string($_POST['firstname']);
    $last_name = $mysqli->escape_string($_POST['lastname']);
    $email = $mysqli->escape_string($_POST['email']);
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $mysqli->escape_string(md5(rand(0, 1000)));

// Check if user with that email already exists
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

            $_SESSION['logged_in'] = true;
            $_SESSION['message'] =

                "Tervitus sõnum on saadetud teie emailile: $email.";

            $to = $email;
            $subject = 'Kasutaja kinnitus (seeniatll)';
            $message_body = '
        Hello ' . $first_name . ',

        Aitäh, et kasutate meie veebilehte!';

            mail($to, $subject, $message_body, 'From:ludvigleis@gmail.com');
            header("location: profile.php");
        } else {
            header("location: login.php");
        }
    }