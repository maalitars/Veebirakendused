<?php
if (isset($_POST['submit'])){
    $file = $_FILES{'file'};
    $fileName = $file['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];



    $filesExt = explode('.', $fileName); //teeme stringi katki kaheks osaks
    $fileActualExt = strtolower(end($filesExt));


    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if($fileSize < 50000){
                $fileDestination = 'uploads/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: andmed.php?uploadsuccess");

            }else {
                echo "Fail on liiga suur!";
            }

        } else {
            echo "Faili üleslaadimisel oli viga!";
        }
    }else{
            echo "Selliseid failitüüpe ei saa üles laadida";
    }
}