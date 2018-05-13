<!DOCTYPE html>
<?php
    include('tmdb_v3-PHP-API--master/tmdb-api.php');
    $tmdb = new TMDB();
    $tmdb->setAPIKey('2db62735185c590d8057361f7a3bf663');
?>
<html lang="et">
<head>
    <link href="main2.css" rel="stylesheet" type="text/css"/>
    <title>SeenItAll-Filmid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/filmid.js" rel="script"></script>
</head>
<body>
<?php include 'header.php';
?>
<div class="container">
    <div class="jumbotron">
        <h2 class="text-center">Otsi filme</h2>
        <form id="searchForm">
            <label class="regLabel" for="searchText">Otsi</label>
            <input type="text"  id="searchText" name="searchText" placeholder="Otsi filme...">
        </form>
    </div>

<?php
    $title =  $_GET['searchText'];
    $movies = $tmdb->searchMovie($title);
echo "<div>";
foreach($movies as $movie) {
    $info = $movie->get();
    echo "<br>";
    $presen = null;
    $title = $movie->getTitle();
    echo "<h3>". $title. "</h3><br>";
    $presen = 'https://image.tmdb.org/t/p/w200';
    $presen .= $movie->getPoster();
    $raiting = $movie -> getVoteAverage();
    echo 'Keskmine hinne: ' . $raiting . "<br><br>";
    echo "<img class='avatarPicture' src='$presen' alt='Movie poster' />";
    echo "<br>".'----------------' ."<br><br>";
}
echo "</div>";?>
</div>

<!---<div>
    <br><br>
    <div id="filmsTable">
    </div>
    <button class="frontbutton" id="filmsbutton">Lae rohkem</button>

</div>-->
<!--<div itemscope itemtype="http://www.schema.org/WebPage">
    <p itemprop="headline">FILMID</p>

    <div id="myBtnContainer">
        <button itemprop="genre" class="btn active" onclick="filterSelection('all')" style="margin-left: 10%;"> Show
            all
        </button>
        <button itemprop="genre" class="btn" onclick="filterSelection('Drama')">Drama</button>
        <button itemprop="genre" class="btn" onclick="filterSelection('Action')"> Action</button>
        <button itemprop="genre" class="btn" onclick="filterSelection('Comedy')"> Comedy</button>
        <button itemprop="genre" class="btn" onclick="filterSelection('Family')"> Family</button>
    </div>

    //The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories)
    <div class="container">
        <div itemprop="name" class="filterDiv Drama">La La Land</div>
        <div itemprop="name" class="filterDiv Action">Mad Max: Fury Road</div>
        <div itemprop="name" class="filterDiv Comedy">Get Out</div>
        <div itemprop="name" class="filterDiv Family">Inside Out</div>
        <div itemprop="name" class="filterDiv Family">Toy Story 3</div>
        <div itemprop="name" class="filterDiv Comedy">The Big Sick</div>
        <div itemprop="name" class="filterDiv Action">Wonder Woman</div>
        <div itemprop="name" class="filterDiv Drama">Baby Driver</div>
        <div itemprop="name" class="filterDiv Drama">Spider-Man: Homecoming</div>
        <div itemprop="name" class="filterDiv Action">Star Wars: Episode VII - The Force Awakens</div>
        <div itemprop="name" class="filterDiv Comedy">The LEGO movie</div>
        <div itemprop="name" class="filterDiv Family">Finding Nemo</div>
        <div itemprop="name" class="filterDiv Drama">Whiplash</div>
    </div>
</div>
<script>
    filterSelection("all");

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c === "all") c = "";
        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    // Show filtered elements
    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) === -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    // Hide elements that are not selected
    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current control button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>-->
</body>
</html>