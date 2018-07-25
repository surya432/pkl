<?php 
namespace App\Http\Controllers;
use App\users;
Trait UsersActions {
    public function usersall(){
        $data = users::all();
        return $data;       
    }
    private function usersCheck($data){
        $email= $data['email'];
        $nisn = $data['nisn'];
        $result = users::where("email",'=',$email)->OrWhere("nisn",'=',$nisn)->first();
        if(is_null($result)){
            return null;
        }
        return $result;       
    }
    public function usersAdd($data){
        $matchThese= ['nisn'=> $data['nisn']];
        $result = users::where($matchThese)->first();
        if(is_null($result)){
            $data = users::Create($data);
            return $data->id;    
        }
        return null;
    }

    
}
