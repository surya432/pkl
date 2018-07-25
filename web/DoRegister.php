<?php
include_once("config.php");
include_once("module/curl.class.php");
if($_POST){
	$email = $_POST['email'];
	$tmpat_lahir = $_POST['tmpat_lahir'];
	$nisn = $_POST['nisn'];
	$password = $_POST['password'];
	$url= WEBSERVICE.'/register';
	$curl= new curls();
	$result=  $curl->curlPost($url, [
			'email' => $email,
			'nisn' => $nisn,
			'password' => $password,
			'tmpat_lahir' => $tmpat_lahir,
	]);
	
	if(!$result){
		echo $result;
	}else{
		echo $result;
	}
}