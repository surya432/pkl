<?php 
namespace App\Http\Controllers;
use App\Thn_ajarans;
Trait Thn_ajaransActions {
    private function selectYear(){
        $result = Thn_ajarans::where(["status"=>'active'])->first();
        if(is_null($result)){
            return null;
        }
        return $result->id_thn_ajaran; 
    }
    private function Thn_ajaransGet($data){
        $result = Thn_ajarans::where($data)->first();
        return $result; 
    }
    
}
