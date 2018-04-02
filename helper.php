<?php

function config($key){
    $database = include('config.php');
    return $database[$key];
}