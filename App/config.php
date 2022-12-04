<?php

$global= $_SERVER;

$folderPath= dirname($global['SCRIPT_NAME']);
$urlPath= $global['REQUEST_URI'];
$url = substr($urlPath,strlen($folderPath));

DEFINE('URL',$url);
// var_dump($folderPath);
