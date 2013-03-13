<?php

require_once('includes/JOFB_Handler.php');

$data = json_decode(file_get_contents('includes/5134ac970f8c4.json'), true);;

$webPath = dirname('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

$config = array(
    'uploadDirectory' => dirname(__FILE__) . '/uploads/',
    'webPath' => $webPath,
    'webUploadDirectory' => $webPath . '/uploads/',
);

new JOFB_Handler($data, $config);