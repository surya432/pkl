<?php
include_once('config.php');
session_start();


if($_GET && $_SESSION){
	include_once('pages/header.php');
		$page = $_GET['page'];
		switch($page){
			case "dashboard":
				include_once("pages/dashboard.php");
				break;
			default:
				include_once('pages/not_found.php');
		}
	include_once('pages/footer.php');

}else{

			include_once('pages/login.php');
}
