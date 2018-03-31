<!DOCTYPE html>
<?php
    require __DIR__ . '/../init.php';
    require '../db.php';
?>
<html>
<link href="main2.css" rel="stylesheet" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <?php include 'header.php'; ?>
    <title>SeenItAll</title>
</head>
<body>
<div class="card">
    <p>Profiilipilt</p>

    <p><?php echo "Vali pilt üleslaadimiseks:" ?><p>

    <div class="s"></div>
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
                    $path = $row["path"];
                    echo "<picbox><img src='$path' height='40%' width='40%' /></picbox>";
                }
            }
        ?>
    <br><br>
    <form action="deletepic.php" method="post">
        <button type="submit" name="submit">Eemalda pilt</button>
    </form>
</div>
</body>
</html>
