<?php
    if (isset($_GET['logout'])) {
        session_destroy();
        session_unset();
        unset($_SESSION['email']);
        header("Location: http://46.101.6.112");
    }
?>
<link href="header.css" rel="stylesheet" type="text/css"/>
<header>
    <div class="container">
        <h1>SEENITALL</h1>
        <nav>
            <div itemscope itemtype="http://schema.org/WebPage">
                <form itemprop="potentialAction" action="header.php" method="POST">
                    <ul>
                        <li><a itemprop="url" href="esileht.php"><div>Esileht</div></a></li>
                        <li><a itemprop="url" href="filmid.php"><div>Filmid</div></a></li>
                        <li><a itemprop="url" href="andmed.php"><div>Andmed</div></a></li>
                        <li><a itemprop="url" href="kontakt.php"><div>Kontakt</div></a></li>
                        <?php if (!($_SESSION['email'] == "") || $_SESSION['idcard'] == true || $_SESSION['facebook_id']== true):?>
                            <li><a itemprop="url" href="?logout='1'"><div>Logi välja</div></a></li>
                        <?php else: ?>
                        <li><a itemprop="url" href="../login.php">Logi sisse</a></li>
                        <?php endif; ?>
                    </ul>
                </form>
            </div>
        </nav>
        <div class="line"></div>
    </div>
</header>

