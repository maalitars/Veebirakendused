<!DOCTYPE html>
<?php
require __DIR__ . '/../init.php';
?>
<html lang="et">
<head>
    <link href="main2.css" rel="stylesheet" type="text/css"/>
    <?php include 'header.php'; ?>
    <title>SeenItAll-Filmid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description"
          content="See on SeenItAll veebilehe filmide leht, kus on võimalik otsida filme ning samuti filmisoovitused."/>
    <meta name="keywords" content="filmid, soovitused, otsing"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
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
<p itemprop="headline">FILMID</p>
<!--     Control buttons -->
<div itemprop="genreButtons" id="myBtnContainer">
    <button itemprop="genre" class="btn active" onclick="filterSelection('all')" style="margin-left: 10%;"> Show all</button>
    <button itemprop = "genre" class="btn" onclick="filterSelection('Drama')">Drama</button>
    <button itemprop="genre" class="btn" onclick="filterSelection('Action')"> Action</button>
    <button itemprop="genre" class="btn" onclick="filterSelection('Comedy')"> Comedy</button>
    <button itemprop="genre" class="btn" onclick="filterSelection('Family')"> Family</button>
</div>

<!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
<div itemprop="filmNames" iclass="container">
    <div itemprop="filmName" class="filterDiv Drama">La La Land</div>
    <div itemprop="filmName" class="filterDiv Action">Mad Max: Fury Road</div>
    <div itemprop="filmName" class="filterDiv Comedy">Get Out</div>
    <div itemprop="filmName" class="filterDiv Family">Inside Out</div>
    <div itemprop="filmName" class="filterDiv Family">Toy Story 3</div>
    <div itemprop="filmName" class="filterDiv Comedy">The Big Sick</div>
    <div itemprop="filmName" class="filterDiv Action">Wonder Woman</div>
    <div itemprop="filmName" class="filterDiv Drama">Baby Driver</div>
    <div itemprop="filmName" class="filterDiv Drama">Spider-Man: Homecoming</div>
    <div itemprop="filmName" class="filterDiv Action">Star Wars: Episode VII - The Force Awakens</div>
    <div itemprop="filmName" class="filterDiv Comedy">The LEGO movie</div>
    <div itemprop="filmName" class="filterDiv Family">Finding Nemo</div>
    <div itemprop="filmName" class="filterDiv Drama">Whiplash</div>
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
</script>
</body>
