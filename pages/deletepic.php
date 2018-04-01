<?php
    require '../db.php';

        $sql = "SELECT * FROM img order by id desc limit 1";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $path = $row["path"];
                unlink($path);
                $res= $mysqli->query("DELETE FROM img WHERE path='$path'") or die($mysqli->error);
            }
        }
        header("Location: andmed.php");

