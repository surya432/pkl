<?php
require "vendor/autoload.php";
include_once("vendor/_config.php");
include_once("vendor/db_config.php");
function __autoload($classname) {
    $filename = "_fmodule/Module_init/".$classname . ".class.php";

    if(file_exists( $filename ))
    {
        include_once($filename);
    }
}
$class = new users();

if(isset($_POST['do'])){
	if( $_POST['do']== "login"){
		include_once "_fmodule/do_login.php";
	}elseif($_POST['do'] == "register"){
		include_once "_fmodule/registers.php";
	}elseif($_POST['do'] == "detail"){
		include_once "_fmodule/login.php";
	}else{
		echo json_encode(array("status"=>"false", "result"=>"Error In End Point"));
	}
}else{
	echo json_encode(array("status"=>"false", "result"=>"End Point API Not Found"));
}