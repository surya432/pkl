<?php
    use PHPHtmlParser\Dom;
    $bio_siswa= new bio_siswa();
    $user_role= new user_role();
    
    if(isset($_POST["no_nisn"])){
        $register_model= new register();
        $parse_html = new Dom;
        $parse_html->loadFromFile('http://nisn.data.kemdikbud.go.id/page/data?nisn='.$_POST["no_nisn"]);
            $data = array();
            $data["nisn"]= $parse_html->find('span[id=contentCenter_lRes1NISN]')->innerhtml;
            $data["nama"]= $parse_html->find('span[id=contentCenter_lRes1Nama]')->innerhtml;
            $data["jenis_kelamin"]= $parse_html->find('span[id=contentCenter_lRes1Kelamin]')->innerhtml;
            $data["tmpt_lahir"]= $parse_html->find('span[id=contentCenter_lRes1Tmptlahir]')->innerhtml;
            $data["tgl_lahir"]= $parse_html->find('span[id=contentCenter_lRes1TglLahir]')->innerhtml;
            $data["email"]= $_POST['email'];
            $data["password"] = md5("PasswordKey".$_POST['password']."keyPassword");
        if($data["nisn"] !="" && $data["password"] !="" && strtolower($_POST['tempat_lahir']) == strtolower($data['tmpt_lahir'])){
            $result = $register_model->insert_users($data);
            //if($result){
                echo json_encode(array("status"=>true, "result"=> $result));
            //}else{
                //echo json_encode(array("status"=>false, "result"=> "NISN Sudah Terdaftar"));
            //}
        }else{
            echo json_encode(array("status"=> false, "result"=> "NISN Tidak Ditemukan atau NISN salah !!"));
        }
    }else{
        echo json_encode(array("status"=> false, "result"=> "Wrong Parameter!!"));
    }

