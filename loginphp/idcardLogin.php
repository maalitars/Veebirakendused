<?php

include '../helper.php';

if (isset($_GET["error"])) {
    echo("<pre>OAuth Error: " . $_GET["error"] . "\n");
    echo('<a href="../index.php">Retry</a></pre>');
    die;
}

$clientId = config('clientId');
$clientSecret = config('clientSecret');
$redirectUrl = "https://46.101.6.112/pages/esileht.php";

$authorizeUrl = 'https://id.smartid.ee/oauth/authorize';
$accessTokenUrl = 'https://id.smartid.ee/oauth/access_token';

require("client.php");
require("grantType/iGrantType.php");
require("grantType/authorizationCode.php");

$client = new OAuth2\Client($clientId, $clientSecret,
    OAuth2\Client::AUTH_TYPE_AUTHORIZATION_BASIC);

$client->setCurlOption(CURLOPT_USERAGENT, "UserAgent");
$redirectUrl = "http://46.101.6.112/pages/esileht.php";

if (!isset($_GET["code"]) && isset($_GET["login"])) {
    $authUrl = $client->getAuthenticationUrl($authorizeUrl, $redirectUrl, array());
    header("Location: " . $authUrl);
    die("Redirect");
}elseif (isset($_GET["code"])) {
    $params = array("code" => $_GET["code"], "redirect_uri" => $redirectUrl);
    $response = $client->getAccessToken($accessTokenUrl, "authorization_code", $params);

    $accessTokenResult = $response["result"];
    $client->setAccessToken($accessTokenResult["access_token"]);
    $client->setAccessTokenType(OAuth2\Client::ACCESS_TOKEN_BEARER);

    $response = $client->fetch("https://id.smartid.ee/api/v2/user_data");

    echo '<strong>Response for user_data:</strong><pre>';
    var_dump($response);
    echo '</pre>';
}
?>