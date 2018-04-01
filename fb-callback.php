<?php

require_once __DIR__ . 'php-graph-sdk-5.4.0/src/Facebook/autoload.php';
require  __DIR__ . 'db.php';

$fb = new Facebook\Facebook([
    'app_id' => '2015671711981238',
    'app_secret' => 'fc95b662847ec08e4c080a1b61d9754d',
    'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();
$_SESSION['FBRLH_state']=$_GET['state'];
try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (! isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
}

// Logged in
echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());
// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();
// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
echo '<h3>Metadata</h3>';
var_dump($tokenMetadata);
// Validation (these will throw FacebookSDKException's when they fail)
try {
    $tokenMetadata->validateAppId($config['app_id']);
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
    echo $e;
}
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
try {
    $tokenMetadata->validateExpiration();
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
    echo $e;
}

if (! $accessToken->isLongLived()) {
    // Exchanges a short-lived access token for a long-lived one
    try {
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
        exit;
    }
    echo '<h3>Long-lived</h3>';
    var_dump($accessToken->getValue());
}
$_SESSION['fb_access_token'] = (string) $accessToken;
// Logged in

$dtb = new Dtb();
$conn = $dtb->getConnection();
$_SESSION['dtb'] = $dtb;
if (mysqli_ping($conn)) {
    echo ("Connection is establihed! <br>");
    $response = $fb->get('/me?fields=id,name,email', $_SESSION['fb_access_token']);
    $user = $response->getGraphUser();
    $ipaddr =  $_SERVER['REMOTE_ADDR'];
    if (!($dtb->isUser($user['id'], $ipaddr))) {
        $dtb->insertUser($user['id'], $user['name'], $user['email'], $ipaddr);
    }
} else {
    printf(mysqli_error($conn));
}

header('Location: http://46.101.6.112/pages/esileht.php');
