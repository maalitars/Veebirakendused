<?php
    require 'init.php';
    require 'db.php';
    require_once __DIR__ . '/php-graph-sdk-5.4.0/src/Facebook/autoload.php';
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css">
    <title>SeenItAll - Logi sisse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Siit saab SeenItAll veebilehele sisse logida."/>
    <meta name="keywords" content="logi sisse, filmid, kasutaja, konto, salasõna"/>
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

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['login'])) { //user logging in

            require 'loginsite.php';
        }
        elseif(isset($_POST['tagasi'])){
            header("Location: index.php");
        }
    }
?>
<div class="login">
    <form class="form" action="login.php" method="POST">
        <div class="text">
            <p>Sisene filmimaailma</p>
        </div>
            <input type="text" name="email" placeholder="e-mail">
            <input type="password" name="password" placeholder="salasõna">
            <button class="button" name="login">Logi sisse</button>
            <button class="button" id="reg" name="tagasi">Mine tagasi</button>
        <div>
            <p id="status">
                <?php
                // Initialize the Facebook PHP SDK v5.
                $fb = new Facebook\Facebook([
                    'app_id' => '2015671711981238',
                    'app_secret' => 'fc95b662847ec08e4c080a1b61d9754d',
                    'default_graph_version' => 'v2.10',
                ]);
                //helper is used to log user in
                $helper = $fb->getRedirectLoginHelper();
                try {
                    $session = $_SESSION['fb_access_token'];
                } catch (FacebookRequestException $ex) {
                    // When Facebook returns an error
                    echo $ex;
                } catch (\Exception $ex) {
                    // When validation fails or other local issues
                    echo $ex;
                }
                //show if the user is logged in or not
                if ($session) {
                    //Logged in
                    ?>
                    <?= $isLoggedin; ?><br/>
                <?php
                $response = $fb->get('/me?fields=id,name,email', $_SESSION['fb_access_token']);
                $user = $response->getGraphUser();
                ?>
                <?//= $helloMessage . $user['name']; ?>. <br/>
               <?php
                $logout_url = "logout.php";
                $dtb = new Dtb();
                $conn = $dtb->getConnection();
                $andmed = $dtb->getUserData($user['id']);
                $users = $dtb->getUserCount();
                ?>
                <?= $userCount . $users; ?> <br/>

                <?= $loginTime . $andmed[0]; ?>. <br/>
                <?= $ipMessage . $andmed[1]; ?>. <br/>

                    <button id="logoutButton" class="float-left submit-button"><?= $logoutMessage?></button>

                    <script>
                        document.getElementById("logoutButton").onclick = function () {
                            location.href = "logout.php";
                        };
                    </script>
                <?php
                } else {
                ?>
                    <?/*= $isNotLoggedin; */?><!--<br/>-->
                <?php
                $permissions = ['email', 'public_profile']; // Optional permissions
                $loginUrl = $helper->getLoginUrl('http://46.101.6.112/fb-callback.php', $permissions);
                ?>

                    <button id="loginButton" class="float-left submit-button"><?php echo $lang['logi_sisse_facebookiga'] ?></button>

                    <script>
                        document.getElementById("loginButton").onclick = function () {
                            location.href = "<?=htmlspecialchars($loginUrl)?>";
                        };
                    </script>
                    <?php
                }
                ?>
            </p>
        </div>
        <div class="buttonen" onclick='location.href="?lang=english"'>
        </div>
        <div class="buttonet" onclick='location.href="?lang=estonian"'>
        </div>

    </form>
</div>
</body>