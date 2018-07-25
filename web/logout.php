<?php
include_once('config.php');
 session_start();

    $helper = array_keys($_SESSION);
    foreach ($helper as $key){
        unset($_SESSION[$key]);
    }
if($_SESSION['apikey'] ==""){
	header("location: ".BASE_URL);
	die();
}