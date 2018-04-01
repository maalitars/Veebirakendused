<!DOCTYPE html>
<?php
require __DIR__ . '/../init.php';
?>
<link href="header.css" rel="stylesheet" type="text/css"/>
<header>
    <div class="container">
        <logo  id="logo">SEENITALL</logo>
        <nav>
            <form itemprop="potentialAction" action="../logout.php" method="POST">
                <ul itemprop="pages">
                    <li><a itemprop="page" href="esileht.php">Esileht</a></li>
                    <li><a itemprop="page" href="filmid.php">Filmid</a></li>
                    <li><a itemprop="page" href="andmed.php">Andmed</a></li>
                    <li><a itemprop="page" href="../index.php">Logi välja</a></li>
                </ul>
            </form>
        </nav>
        <div itemprop="line" class="line"></div>
    </div>
</header>


