<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '2015671711981238',
  'app_secret' => 'fc95b662847ec08e4c080a1b61d9754d',
  'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = []; // Optional information that your app can access, such as 'email'
$loginUrl = $helper->getLoginUrl('https://localhost/Veebirakendused/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook</a>';
?>
