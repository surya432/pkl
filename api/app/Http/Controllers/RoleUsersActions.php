<?php 
namespace App\Http\Controllers;
use App\role_users;

Trait RoleUsersActions {
    public function getroles($data){
        $data = role_users::where($data)->first();
        return $data;       
    }
    public function user_roles($data){
        $matchThese =[ 'user_id' => $data['user_id'] ];
        $result = role_users::where($matchThese)->get();
        if(is_null($result)){
            return false;
        }
        return $result;
    }
    public function roleuserAdd($data){
        $matchThese =[ 'user_id' => $data['user_id'], 'role_id'=>$data['role_id'] ];
        $result = role_users::where($matchThese)->first();
        if(is_null($result)){
            $data = role_users::Create($data);
            return $data->id;    
        }
        return null;            
    }     
}
