<?php 
namespace App\Http\Controllers;
use App\roles;
trait RolesActions {
    private function roleId($nama){
        $nama = strtolower($nama);
        $role = roles::where(["nama"=>$nama])->first();
        if(is_null($role)){
            return null;
        }
        return $role->role_id;       
    }
    private function roleAdd($roleName){
        $role = roles::where(["nama"=>strtolower($roleName)])->first();
        if(is_null($role)){
            $roles = roles::Create(["nama"=>strtolower($roleName)]);
            return $roles->id;
        }
        return null;
    }   
}
