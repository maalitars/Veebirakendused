<?php

if (!session_id()) {
    session_start();
}
session_unset();
session_destroy();

header("Location: http://46.101.6.112/login.php");