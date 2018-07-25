<?php

include_once('../config.php');
include_once('curl.class.php');
session_start();
if($_SESSION){
	$url=WEBSERVICE.'/profile/'.$_SESSION['apikey'];
	$curl= new curls();
	$result =   $curl->curlPost($url); 
	$array = json_decode($result,true);
	echo '
	
		<script type="text/javascript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
		<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
	<form id="kartu" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel">
		<div class="panel-heading">
			<h4 class="text-center">Folmulir Pendaftaran '.$array['thn_ajaran'].'</h4>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="form-group row gutter">
					<label for="inputnama" class="col-sm-2 control-label">No Registrasi:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="no_daftar" value="'.$array['no_daftar'].'" disabled>
					</div>
				</div>
				<div class="form-group row gutter">
					<label for="inputnama" class="col-sm-2 control-label">Email:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name value="'.$array['email'].'" disabled>
					</div>
				</div>
				<div class="form-group row gutter">
					<label for="inputnama" class="col-sm-2 control-label">NISN:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nisn" value="'.$array['nisn'].'" disabled>
					</div>
				</div>
				<div class="form-group row gutter">
					<label for="inputnama" class="col-sm-2 control-label">Nama Lengkap:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nama"  name="nama" value="'.$array['nama'].'" disabled>
					</div>
				</div>
				<div class="form-group row gutter">
					<label for="inputnama" class="col-sm-2 control-label">Tanggal Lahir:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tgl_lahir" value="'.$array['tgl_lahir'].'" disabled>
					</div>
				</div>
				<div class="form-group row gutter">
					<label for="inputnama" class="col-sm-2 control-label">Tempat Lahir:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tmpat_lahir" value="'.$array['tmpat_lahir'].'" disabled>
					</div>
				</div>
				<div class="form-group row gutter">
					<label for="inputnama" class="col-sm-2 control-label">Jenis Kelamin:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="jenis_kelamin" name value="'.$array['jenis_kelamin'].'" disabled>
					</div>
				</div>
				<div class="form-group row gutter">
					<label for="inputnama" class="col-sm-2 control-label">Alamat:</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="alamat" name value="'.$array['alamat'].'"/>
					</div>
				</div>
				<button type="submit" class="btn btn-info">Submit</button>

			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
				<img src="'.BASE_URL_THEMES.'/img/student.jpg"  height="300px" weight="100%">
			</div>
			</form>
		</div>
	</div>
	</form>
	';
}