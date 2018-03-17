<?php
require __DIR__ . '/../init.php';
?>

<DOCTYPE html>
<php>
    <head>
      <link href="header.css" rel="stylesheet" type="text/css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SeenItAll</title>
    </head>

    <body>
      <header>
        <div class="container">
            <logo id="logo">SEENITALL</logo>
          <nav>
          <li><a href="esileht.php"><?php echo $lang['esileht'] ?></a></li>
          <li><a href="filmid.php"><?php echo $lang['filmid'] ?></a></li>
          <li><a href="andmed.php"><?php echo $lang['minu_andmed']?></a></li>
          <li><a href="../index.php"><?php echo $lang['logi_välja'] ?></a></li>
      </nav>
      <div class= "line">
        </div>
      </header>
    </body>
</php>
