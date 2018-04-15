<?php

if (!session_id()) {
    echo "pole sessiooni alustatud";
}
session_unset();
session_destroy();

header("Location: http://46.101.6.112/login.php");