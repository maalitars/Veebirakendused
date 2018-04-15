<?php

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2018 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
    "-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEA0tQ+hc4CNFzJiaMTSmqa+4Yyf2L6upzp8jYt3JNWqGDIwmyK
h0hSAZ16j2N8PiI0CiM+wLree2FCjWN/NV0PRVq2pKwET0ofWn2LLflYfX0LuqLW
G/lCBwo3y5PSqpQ0MPbf+Dm4MCara4D4BitS8a0+UNWYmkzCavUwYemUsmG7e7Ln
448QC+KEjuF5I4NIJHHXUzH8q6LSqrl640agmeUt+Z98NLgQBiGG4EQYxgWr7Yk0
xS26oCanRk0lGBJkDYxUafTkEnnOipyUoxFh9ruAO9nwFNKBvJJN3cjzJ45rrQUo
54J3aoghAjMQL5wBjbg/A09dgNe6M40EsKg7owIDAQABAoIBACXHouyXXg3EEtl3
P522PM+V3La3JfcK52FgFBfSz1SdA1zT1n8nlopzjeLkEP+RYYHvju86jWPOqf5s
Nf96DaJ//vrDWIJc5gFxPd+fLxxNrCxlwbiBkjNwwU7ZzoaCyFd95eS1cywtwcoh
8lAos1Rbly8lF5OO7cf86A6jrOHKDlxLsUvu4UvD/fFgw7OikGj9KgewMUL5dA9F
aApWIp9sZqwxjhJSuaIkdeAkLs/XgvSwIUHJdwsBfbwBSZqbNvsA1CN3l5gQ2D/Y
+CQaGZWeeDKAzIKcDlF9sCkbXaR0pLH25uKeR55E7JJ1fN5pY7Ta8VEKRkuh3JHj
VrDOMgECgYEA8T59fqyd9TCmTH8H+DubmtUCrB9pKGmw+Fp7Bghsswci7R7ZAbRK
mGgTgQ01dE7mjrm1VYDWt6qC8KGLrBHOjaKxazJvuX+4ysc4TUnmz+K8njY+Wzu3
fKy7k4D0KYi3N9b33QOYdyNg2bkXGaYdFGTAtdOXnNiL5DI0Uc7CipkCgYEA37mA
cymvPz7eiTWLncIZz++TBtLziIEwIUXsVdHSq4iqZ2GSSZa7VPuRVfEuZ1eYE95P
jqiNk5psaqpbgi6eIqnQHiMJHEfusnvd056F//KvwkMlBRQ12uno1AYVgywLUa/I
ZSSsZMzPJrBNJ6ETdThXqbW+OCh3mkh/kw28eZsCgYEAznr69JoQFJVQMPclPhze
wTYCNIop+lIEC31+AJrjVpQMG8IkYOYMVsf1saY5k1QY2B4xC37byJXjvsu1/U+8
Z9PRYPvpTm74Hm9HTDetm07ou82Xr4S8NrStU8GyuX3vu5Z9zahPLeGU+qUGFYjt
KNBXdQkmojNiAK3LxB1guzkCgYBUVtgHkhVQoGDAFQF3DW8xpj0k+213bkw4nuWD
TMBAjhq/Mlc1iq9AUD3vyiYWKz1XcB1JyFzm4fYxF9u7bduLcbzVP5v1n2BqxKtR
VZdqb5C2iR1xlrbeugNdupVth7MUrlG7X2Hl9he5nAjaAa0WKZFSlwMIpKjB7sa5
JxqANQKBgHWM6JXHQyb1QS0uDrGGOExA6Nda3JfIAB7tWIKDHIT3L7qID9thXf0Y
Xh6TiUZ3tNST19054dNExzqNuJVGtIg+OD1WLP1IT0FCU+iWuK4F/zhT8tABGgMJ
lyU2UHeJHeUFWy0sbeu+FDaLUMzzlPUlEJhGbAXc6frDz5cCr3UQ
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
    "VK_SERVICE"     => "1011",
    "VK_VERSION"     => "008",
    "VK_SND_ID"      => "uid13",
    "VK_STAMP"       => "12345",
    "VK_AMOUNT"      => "15",
    "VK_CURR"        => "EUR",
    "VK_ACC"         => "EE152200221234567897",
    "VK_NAME"        => "SeenItAll",
    "VK_REF"         => "1234561",
    "VK_LANG"        => "EST",
    "VK_MSG"         => "Torso Tiger",
    "VK_RETURN"      => "http://46.101.6.112/pages/kontakt.php?payment_action=success",
    "VK_CANCEL"      => "http://46.101.6.112/pages/kontakt.php?payment_action=cancel",
    "VK_DATETIME"    => "2018-04-15T17:33:24+0000",
    "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! Swedbank expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
    str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
    str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid13 */
    str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
    str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
    str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
    str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE152200221234567897 */
    str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
    str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
    str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
    str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost/project/5ad38b768398036bf2b66bc3?payment_action=success */
    str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost/project/5ad38b768398036bf2b66bc3?payment_action=cancel */
    str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2018-04-15T17:33:24+0000 */

/* $data = "0041011003008005uid1300512345003150003EUR020EE152200221234567897009ÕIE MÄGER0071234561011Torso Tiger072http://localhost/project/5ad38b768398036bf2b66bc3?payment_action=success071http://localhost/project/5ad38b768398036bf2b66bc3?payment_action=cancel0242018-04-15T17:33:24+0000"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* gLD3cpyckpqg3XIGWkf87gaevNU8ngLKq50ptbV6UabMPrwbOa9D8VgjLKmVNPstD5juNZ2d5lxhrs7pnytgkACYiWoRSsWvNOY7tNDI7FKmttf5bmFYTL0XSd79NuaIWGNK/WSMAqe7xrupU3JhmnchXmdYXcLlSdKYPOUAG1pmPldLFVnDyHVNsDqifO1YBmR0VoTqaBx9mJ80Sz+mJR+SHr1NEXiwtSi/aEVa1DKoTgaP2N5xPGsvKkgB6ntb9ow587zZWOMkUmZZhdBx1INoGrkMo0KxT187foslCLTSgh0+VMu2a6J0hh1v2YFoyKcoNqkE2ODPJl/NEgWjFw== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

