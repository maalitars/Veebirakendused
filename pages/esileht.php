<!DOCTYPE html>
<html lang="et">
<head>
    <link href="main2.css" rel="stylesheet" type="text/css"/>
    <?php include 'header.php'; ?>
    <script async defer src=
    "https://maps.googleapis.com/maps/api/js?key=AIzaSyCHd2o0ql69mOmEEme_IGDyaXoMSlGIzBk&callback=initMap"></script>
    <script src="../js/googlemap.js"></script>
    <title>SeenItAll-Esileht</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description"
          content="See on SeenItAll veebilehe esileht, kus on võimalik vaadata parima Tartu kino asukohta, populaarseid filme ja filmisoovitusi."/>
    <meta name="keywords" content="filmid, esileht, kino, Cinamon, Google Maps, kaart, asukoht, soovitus, populaarsed"/>
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
<div id="google"></div>
</body>
</html>
