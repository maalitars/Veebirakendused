<!DOCTYPE html>
<?php
    session_start();
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    include('tmdb_v3-PHP-API--master/tmdb-api.php');
    // if you have no $conf it uses the default config
    $tmdb = new TMDB();
    //Insert your API Key of TMDB
    //Necessary if you use default conf
    $tmdb->setAPIKey('2db62735185c590d8057361f7a3bf663');
?>
<html lang="et">
<head>
    <link href="main2.css" rel="stylesheet" type="text/css"/>
    <title>SeenItAll-Esileht</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script>
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
<?php include 'header.php';
    include_once 'loginphp/idcardLogin.php';
?>
<div class="container">
    <div id="movies">
        <h1>Populaarseimad filmid praegu:</h1>
    </div>
    <br><br>
    <br><br>
    <br><br>
    <?php
        $moviespop = $tmdb->getPopularMovies();
        $number = 1;
        foreach ($moviespop as $movie123) {
            $presen = null;
            echo '<br>';
            echo  $number . "." . $movie123->getTitle() . "<br>";
            echo '<br><br>';
            $presenPop = 'https://image.tmdb.org/t/p/w200';
            $presenPop .= $movie123->getPoster();
            echo "<img class='avatarPicture' src='$presenPop' alt='Movie poster' />";
            $number++;
        } ?>
</div>
<script src="js/main.js"></script>
</body>
</html>