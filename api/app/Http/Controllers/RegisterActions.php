<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
trait RegisterActions {
    use DOMActions;
    use Thn_ajaransActions;
    use RolesActions;
    use PpdbsActions;
    use UsersActions;
    use UsersbioActions;
    use RoleUsersActions;
    public function register(Request $request){
        $email = $request->input('email');
        $nisn = $request->input('nisn');
        $year = $this->selectYear();
        $roles = $this->roleId('pdb');
        if(is_null($year) || is_null($roles) ){
            $data = array("result"=> "Roles or Year Not Available");
            return $this->respond(Response::HTTP_NOT_FOUND,$data);
        }
        $query['email']= $email;
        $query['nisn']= $nisn; 
        $checkUser = $this->usersCheck($query);
        if(!is_null($checkUser)){
            $data = array("result"=> "Email Or NISN Already Registers");
            return $this->respond(Response::HTTP_NOT_FOUND,$data);
        }
        $profil = $this->dom_nisn($request->input('nisn'));
        if($profil["tmpat_lahir"] != strtoupper($request->input('tmpat_lahir'))  && $profil["nisn"] == $request->input('nisn')  ){
            $data = array("result"=> "Not Your NISN");
            return $this->respond(Response::HTTP_NOT_FOUND,$data);
        }
        $profil['role_id'] = $roles;    
        $profil['id_thn_ajaran'] = $year;
        $profil['email'] = $email;
        $profil['password'] = md5($request->input('password'));
        $users = $this->usersAdd($profil);
        $usersbio = $this->usersbioAdd($profil);
        if(is_null($users)|| is_null($usersbio)){
            $data = array("result"=> "Register Failed");
            return $this->respond(Response::HTTP_NOT_FOUND,$data);
        }
        $profil['user_id']=$users;
        $this->roleuserAdd($profil);
        $this->ppdbAdd($profil);
        return $this->respond(response::HTTP_OK,$profil);

    }
}