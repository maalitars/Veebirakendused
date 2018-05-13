<!DOCTYPE html>
<?php
include_once "../pay.php";

session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

?>
<html lang="et">
<head>
    <link href="main2.css" rel="stylesheet" type="text/css"/>
    <title>SeenItAll-Kontakt</title>
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
<?php include 'header.php';?>


<div class="card">
    <p>Makse teostamise näidisrakendus <strong>"SeenItAll"</strong></p>
    <form method="post" action="http://localhost:3480/banklink/swedbank" id="banklink">
        <!-- include all values as hidden form fields -->
        <?php foreach($fields as $key => $val):?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
        <?php endforeach; ?>
        <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
        <button type="submit" form="banklink">Edasi panga lehele</button>
        <br>
        <p>Pangalink töötab, kui arvutisse on paigaldatud pangalink.net rakendus</p>
    </form>
</div>


<?php
        if(!isset($_GET['payment_action'])){
            //echo"Töötab, kui pangalink.net rakendus arvutis töötab";
        }elseif ($_GET["payment_action"]=="success") {
            echo "Annetatud";
        }elseif ($_GET["payment_action"]=="cancel") {
            echo "Ei õnnestunud";
        }
?>

</body>
</html>
