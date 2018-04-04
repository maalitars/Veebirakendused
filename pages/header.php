<!DOCTYPE html>
<?php
require __DIR__ . '/../init.php';
?>
<link href="header.css" rel="stylesheet" type="text/css"/>
<header>
    <div class="container">
        <logo id="logo">SEENITALL</logo>
        <nav>
            <div itemscope itemtype="http://schema.org/WebPage">
                <form itemprop="potentialAction" action="../logout.php" method="POST">
                    <ul>
                        <li><a itemprop="url" href="esileht.php">Esileht</a></li>
                        <li><a itemprop="url" href="filmid.php">Filmid</a></li>
                        <li><a itemprop="url" href="andmed.php">Andmed</a></li>
                        <li><a itemprop="url" href="../index.php">Logi välja</a></li>
                    </ul>
                </form>
            </div>
        </nav>
        <div class="line"></div>
    </div>
</header>


