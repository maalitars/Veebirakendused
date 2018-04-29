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
    <div class="jumbotron">
        <h3 class="text-center">Search For Any Movie</h3>
        <form id="searchForm">
            <label class="regLabel" for="searchText">Otsi</label>
            <input type="text"  id="searchText" name="searchText" placeholder="Search Movies...">
        </form>
    </div>
</div>

<div class="container">
    <div id="movies" class="row"></div>
</div>
<?php
    $title =  $_GET['searchText'];
    $movies = $tmdb->searchMovie($title);
    // returns an array of Movie Object
    foreach($movies as $movie) {
        echo $movie->getTitle() . "<br>";
    }?>


<script src="js/main.js"></script>
</body>
</html>