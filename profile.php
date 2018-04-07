<!DOCTYPE html>
<?php
/* Displays user information and some useful messages */
session_start();
// Check if user is logged in using the session variable
if ($_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");
} else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <title>Seenitall - Profiil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<div class="form">
    <div itemscope itemtype="http://schema.org/Webpage">
        <h1 itemprop="headline">Tere tulemast!</h1>
        <h3 itemprop="text">
            <?php
            // Display message about account verification link only once
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                // Don't annoy the user with more messages upon page refresh
                unset($_SESSION['message']);
            }
            ?>
        </h3>

        <h2 itemprop="text"><?php echo $first_name . ' ' . $last_name; ?></h2>
        <h2 itemprop="text"><?= $email ?></h2>

        <div itemprop="url" class="button" id="centerbutton" onclick='location.href="pages/esileht.php"'>Sisene lehele
        </div>
    </div>
</div>
</body>
</html>