<?php
require_once '../db.php';
session_start();

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if (isset($_POST['submit'])) {
    $file = $_FILES{'file'};
    $fileName = $file['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $filesExt = explode('.', $fileName); //teeme stringi katki kaheks osaks
    $fileActualExt = strtolower(end($filesExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileDestination = 'uploads/' . $fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "INSERT INTO img (path) VALUES ('$fileDestination')";
                if ($mysqli->query($sql)) {
                    $sql1 = "SELECT path FROM img order by id desc limit 1";
                }

                header("Location: andmed.php?uploadsuccess");
            } //õnnestunud üleslaadimine
            else {
                $_SESSION['message'] = "Fail on liiga suur!";
                header("Location: ../picerror.php");
            }
        } else {
            $_SESSION['message'] = "Faili üleslaadmisel esines viga!";
            header("Location: ../picerror.php");
        }
    } else {
        $_SESSION['message'] = "Selliseid failitüüpe ei saa üles laadida!";
        header("Location: ../picerror.php");

    }
}

