<?php
require 'init.php';
?>
<html>
<link href="pages/main2.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <title>SeenItAll</title>
    </head>
    <body>
<div class="login">
    <form class="form">
      <text><?php echo $lang['sisene_filmimaailma']?></>
      <input type="text" placeholder='<?php echo $lang['kasutajanimi']?>'/>
      <input type="password" placeholder='<?php echo $lang['salasõna']?>'/>
      <button> <a href="pages/esileht.php"><?php echo $lang['logi_sisse']?></button>
      <button><?php echo $lang['registreeru']?></button>
      <div class= "language">
        	<a href = "?lang=english"><buttonEN ></buttonEN></a>
          <a href = "?lang=estonian"><buttonET ></buttonET></a>
      </div>
    </form>
  </div>
  <div class="pic">
    <img src="bat.jpg" height="300" width="500">
  </div>
</body>
