<!DOCTYPE html>
<?php
    require __DIR__ . '/../init.php';;
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
                <div class="picbox">
                </div>
            <div class="s"></div>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                    <button type="submit" name="submit">Lae pilt üles</button>
                </form>
        </div>
        </body>
</html>
