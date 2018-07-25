<?php
session_start();
include_once("config.php");
include_once("module/curl.class.php");
if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$url= WEBSERVICE.'/login';
	$curl= new curls();
	$result=  $curl->curlPost($url, [
			'username' => $username,
			'password' => $password,
	]);
	
	if($result){
		$decode = json_decode($result,true);
		if($decode['status'] !='failed'){
			$_SESSION['apikey']=$decode['result']['apikey'];
			$_SESSION['nisn']=$decode['result']['nisn'];
			$_SESSION['nama']=$decode['result']['nama'];
			foreach($decode['result']['access'] as $a=>$b){
				if($b== 'pdb'){
				$_SESSION['ppdb'] = TRUE; 
				}
			}
					$result = array('status'=>true, 'apikey'=>$decode['result']['apikey'],"result"=>'Login Success');
							echo json_encode($result);
		}else{
			echo $result;
		}
	}
}