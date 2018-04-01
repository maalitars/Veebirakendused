<!DOCTYPE html>
<?php
    require_once '../db.php';
    session_start();
?>
<html lang="et">
<head>
    <link href="main2.css" rel="stylesheet" type="text/css"/>
    <?php include 'header.php'; ?>
    <title>SeenItAll-Andmed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description"
          content="Siin lehel on võimalik vaadata kõiki enda SeenItAll kasutaja andmeid: lemmikžanrit, filmide vaatamisele kulutatud aega, vaadatud filme ja lemmikfilme."/>
    <meta name="keywords" content="filmid, andmed, konto, pilt, lemmikžanr, vaadatud filmid, lemmikfilmid"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        if (!window.jQuery) {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'js/jquery-3.3.1.min.js';
            var firstScript = document.getElementsByTagName('script')[0];
            firstScript.parentNode.insertBefore(script, firstScript);
        }
    </script>
</head>
<body>
<div class="card">
    <h2>Profiilipilt</h2>
    <br><br>
    <?php

        $result = $mysqli->query("SELECT COUNT(*) as total from users;");
        $row = mysqli_fetch_assoc($result);
        $count = $row['total'];
        echo 'Praegu registreeritud kasutajate arv:  ';
        echo $count;
    ?>
    <br><br>
    <h3>Vali pilt üleslaadimiseks:</h3>
    <br><br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input name="file" type="file"/><br><br>
        <button type="submit" name="submit">Lae pilt üles</button>
    </form>
    <br><br>
    <?php
        $sql = "SELECT path FROM img order by id desc limit 1";
        $result1 = $mysqli->query($sql);
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $path = $row['path'];
                echo "<picbox><img src='$path' height='40%' width='40%' alt='Profile picture' /></picbox>";
            }
        } else {
            echo "<picbox><img src='uploads/profilesdefault.jpg' height='20%' width='20%' alt='Profile picture' /></picbox>";
        }
    ?>
    <br><br>
    <form action="deletepic.php" method="POST">
        <button type="submit" name="delete">Eemalda pilt</button>
    </form>
</div>
</body>
</html>
