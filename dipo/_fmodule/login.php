<?php
include_once "Module_init/register.php";
if(isset($_POST["id"])){
    $register_model= new register();
    $result= $register_model->get_detail_register($_POST['id']);
    print_r($result);
}