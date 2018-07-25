<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use App\Users;
use App\role_users;
trait LoginActions{
    private function detailLogin($data){
        $userId= $data->user_id;
        $this->ApiKey($userId);
        $check= Users::join('users_bios','users_bios.nisn','=','users.nisn')
        ->where('users.user_id',$userId)->first()->toArray();
        $roleusers= role_users::join('roles','roles.role_id','=','role_users.role_id')
                    ->where('user_id',$userId)
                    ->select('roles.nama')->first();
        return array('result'=>$check+array("access"=>$roleusers));

    }
    private function Apikey($userId){
        $generate = sha1(time());
        return Users::where('user_id',$userId)->update(['apikey'=>$generate]); 
    }
    private function getnisn($apikey){
        $result = Users::where('apikey',$apikey)->first();
        return $result->nisn;
    }
    public function login(REQUEST $request){
        $email = $request->input('username');
        $nisn = $request->input('username');
        $password = md5($request->input('password'));
        $check= Users::where(['users.email'=>$email,'users.password'=>$password])
            //->OrWhere(['users.nisn'=>$nisn,'users.password'=>$password])
            ->first();
        if(is_null($check)){
            $respond= array("status"=>"failed",'result'=>"Email Or Password doesn't exist");
            return $this->respond(Response::HTTP_NOT_FOUND,$respond);
        }
        return array('status'=>'true')+$this->detailLogin($check);
    }
    public function updatePassword(REQUEST $request,$nisn){
        $password= md5($request->input('password'));
        $field= ['password'=> $password];
        $users = Users::where('nisn',$nisn)->update($field);
        return $users;
    }
}