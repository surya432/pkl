<?php 
namespace App\Http\Controllers;
use App\users_bio;

Trait UsersbioActions{
    public function usersbioAll(){
        $data = users_bio::all();
        return $data;       
    }
    public function usersbioAdd($data){
        $matchThese= ['nisn'=> $data['nisn']];
        $result = users_bio::where($matchThese)->first();
        if(is_null($result)){
            $data = users_bio::Create($data);
            return $data->id;    
        }
        return null;
           
    }   
}
