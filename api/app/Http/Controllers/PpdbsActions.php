<?php 
namespace App\Http\Controllers;
use App\ppdbs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

Trait PpdbsActions{
    public function ppdbAll(){
        $years= $this->selectYear();
        $result = ppdbs::join('users_bios','users_bios.nisn','=','ppdbs.nisn')
        ->join('users','users.nisn','=','ppdbs.nisn')
        ->join('thn_ajarans','thn_ajarans.id_thn_ajaran','=','ppdbs.id_thn_ajaran')
        ->where(['ppdbs.id_thn_ajaran'=>$years])->paginate(12);
        return $this->respond(Response::HTTP_FOUND,$result);
    }
    public function ppdbAdd($query){
        $query['no_daftar'] = $this->ppdbAutonumber($query);
        $matchThese =[ 'nisn'=>$query['nisn'] ];
        $result = ppdbs::where($matchThese)->first();
        if(is_null($result)){
            $data = ppdbs::Create($query);
            return $data->id;    
        }
        return null;
    }

    private function ppdbAutonumber($query){
        $matchThese =[ 'id_thn_ajaran'=> $query['id_thn_ajaran']];
        $result = ppdbs::where($matchThese)->count();
        if($result < 1){
            $matchThese =[ 'id_thn_ajaran'=> $query['id_thn_ajaran']];
            $resultyears = $this->Thn_ajaransGet($matchThese);
            return $resultyears['thn_ajaran']."0001";    
        }
        $result = ppdbs::all()->last()->no_daftar;
        return $result+ 1;
    }
    private function ppdbSelect($query){
        $result = ppdbs::where($query)->first();
        if(is_null($result)){
            return null;
        }
        return $result; 
    }
    public function ppdbProfile(Request $request, $id){
        $nisn = $this->getnisn($id);
        if(is_null($nisn)){
            return $this->respond(Response::HTTP_FOUND, array('result'=>'apikey not found'));
        }else{
            $result = ppdbs::join('users_bios','users_bios.nisn','=','ppdbs.nisn')
            ->leftJoin('users','users.nisn','=','ppdbs.nisn')
            ->leftJoin('thn_ajarans','thn_ajarans.id_thn_ajaran','=','ppdbs.id_thn_ajaran')
            ->where(['ppdbs.nisn'=>$nisn])->select(
                ['no_daftar','users.nisn','thn_ajaran','id_nilai','id_minat','id_ijazah','alamat', 'ortu_id','nama','users.email','jenis_kelamin','tgl_lahir','tmpat_lahir']
            )->first();
            return $this->respond(Response::HTTP_FOUND,$result);
        }
    }
}
