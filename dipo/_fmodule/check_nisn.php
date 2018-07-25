<?php
	use PHPHtmlParser\Dom;
    if(isset($_POST["no_nisn"])){
        $parse_html = new Dom;
        $parse_html->loadFromFile('http://nisn.data.kemdikbud.go.id/page/data?nisn='.$_POST["no_nisn"]);
            $data = array();
            $data["nisn"]= $parse_html->find('span[id=contentCenter_lRes1NISN]')->innerhtml;
            $data["nama"]= $parse_html->find('span[id=contentCenter_lRes1Nama]')->innerhtml;
            $data["jenis_kelamin"]= $parse_html->find('span[id=contentCenter_lRes1Kelamin]')->innerhtml;
            $data["tmpt_lahir"]= $parse_html->find('span[id=contentCenter_lRes1Tmptlahir]')->innerhtml;
            $data["tgl_lahir"]= $parse_html->find('span[id=contentCenter_lRes1TglLahir]')->innerhtml;
            $data["email"]= $_POST['email'];
        if($data["nisn"]!="" && strtolower($_POST['tempat_lahir']) == strtolower($data['tmpt_lahir'])){
            echo json_encode(array("status"=>true, "result"=> $data));
        }else{
            echo json_encode(array("status"=> false, "result"=> "NISN Tidak Ditemukan atau salah NISN!!"));
        }
    }else{
        echo json_encode(array("status"=> false, "result"=> "Wrong Parameter!!"));
    }

