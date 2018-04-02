<?php
session_start();

// Include the autoloader provided in the SDK
require_once __DIR__ . '/facebook-php-sdk/src/Facebook/autoload.php';

// Include required libraries
use Facebook\Facebook;

try {
    $fb = new Facebook([
        'app_id' => '2015671711981238',
        'app_secret' => 'fc95b662847ec08e4c080a1b61d9754d',
        'default_graph_version' => 'v2.2',
    ]);
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
    echo "Error!";
}
$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://46.101.6.112/facebook/fb-callback.php', $permissions);

header("Location: $loginUrl");