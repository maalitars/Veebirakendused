<?php
    require '../db.php';

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
                if ($fileSize < 50000) {
                    $fileDestination = 'uploads/' . $fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $result = $mysqli->query("SELECT * FROM img WHERE path= '$fileDestination'") or die($mysqli->error);
                    if ($result->num_rows > 0) {
                        $_SESSION['message'] = 'Selline pilt juba eksisteerib';
                        header("location: error.php");
                    }
                    $sql = "INSERT INTO img (path) VALUES ('$fileDestination')";
                    if ($mysqli->query($sql))
                        $sql1 = "SELECT path FROM img order by id desc limit 1";
                }
                header("Location: andmed.php?uploadsuccess");
            } else {
                echo "Fail on liiga suur!";
            }
        } else {
            echo "Faili üleslaadimisel oli viga!";
        }
    } else {
        echo "Selliseid failitüüpe ei saa üles laadida";
    }
