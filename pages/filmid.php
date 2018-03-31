<!DOCTYPE html>
<?php
require __DIR__ . '/../init.php';
?>
<html lang="en">
<link href="main2.css" rel="stylesheet" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <?php include 'header.php'; ?>
    <title>SeenItAll</title>
</head>
<body>
<p><?php echo $lang['filmid'] ?></p>
<!--     Control buttons -->
<div id="myBtnContainer">
    <button class="btn active" onclick="filterSelection('all')" style="margin-left: 10%;"> Show all</button>
    <button class="btn" onclick="filterSelection('Drama')">Drama</button>
    <button class="btn" onclick="filterSelection('Action')"> Action</button>
    <button class="btn" onclick="filterSelection('Comedy')"> Comedy</button>
    <button class="btn" onclick="filterSelection('Family')"> Family</button>
</div>

<!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
<div class="container">
    <div class="filterDiv Drama">La La Land</div>
    <div class="filterDiv Action">Mad Max: Fury Road</div>
    <div class="filterDiv Comedy">Get Out</div>
    <div class="filterDiv Family">Inside Out</div>
    <div class="filterDiv Family">Toy Story 3</div>
    <div class="filterDiv Comedy">The Big Sick</div>
    <div class="filterDiv Action">Wonder Woman</div>
    <div class="filterDiv Drama">Baby Driver</div>
    <div class="filterDiv Drama">Spider-Man: Homecoming</div>
    <div class="filterDiv Action">Star Wars: Episode VII - The Force Awakens</div>
    <div class="filterDiv Comedy">The LEGO movie</div>
    <div class="filterDiv Family">Finding Nemo</div>
    <div class="filterDiv Drama">Whiplash</div>
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
