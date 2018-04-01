<!DOCTYPE html>
<?php
require __DIR__ . '/../init.php';
?>
<link href="header.css" rel="stylesheet" type="text/css"/>
<header>
    <div class="container">
        <logo id="logo">SEENITALL</logo>
        <nav>
            <form action="../logout.php" method="POST">
                <ul>
                    <li><a href="esileht.php">Esileht</a></li>
                    <li><a href="filmid.php">Filmid</a></li>
                    <li><a href="andmed.php">Andmed</a></li>
                    <li><a href="../index.php">Logi välja</a></li>
                </ul>
            </form>
        </nav>
        <div class="line"></div>
    </div>
</header>


