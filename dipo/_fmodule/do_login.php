<?php
    if(isset($_POST['username']) && isset($_POST["password"]) ){
        $query = $fpdo->from("registrasi")->where(
                    array(
                        "username"=> $_POST['username'], 
                        "password"=>$_POST['password']
                    )
                 )
                 ->execute();
        if($query->fetch()){
            echo json_encode(array("status"=> true, "result"=> "Sukses Login"));
        }else{
            echo json_encode(array("status"=> false, "reason"=> "Username / Password Salah!!"));
        }
    }else{
        echo json_encode(array("status"=> false, "reason"=> "Oh Snapp!!, Wrong Parameters"));
    }
