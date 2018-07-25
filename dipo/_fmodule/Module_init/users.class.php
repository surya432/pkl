<?php 
class users extends DbConnect{
    public function get_detail_register($id){
        $values=array("ppdb_det.id_ppdb"=>$id);
        $query = $this->conn->from('biodata_siswa')
                ->select(null)
                ->select(array('ppdb_det.id_ppdb','biodata_siswa.nama','biodata_siswa.tgl_lahir','users.email'))
                ->innerJoin('ppdb_det ON ppdb_det.id_biodata=biodata_siswa.id_biodata')
                ->innerJoin('users ON users.user_id=biodata_siswa.id_biodata')
                ->where($values)
                ;
        if($query){
            return $query->fetchAll('id_ppdb','id_ppdb,email,nama,tgl_lahir');
        }
        return false;
    }
    public function check_users($where){
        //$values =array("users.email"=>$value['email'],"users.password"=>$value['password'],"biodata_siswa.nisn"=>$value['nisn']);
        $query = $this->conn->from('users')
                ->innerJoin("biodata_siswa on biodata_siswa.id_biodata = users.user_id")
                ->innerJoin("role_users on role_users.user_id = users.user_id")
                ->where($where)
                ->select(null)->select("COUNT(*)")->fetch('COUNT(*)');
        if($query < 1){
            return true;
        }
        return false;
    }
    public function insert_users($value){        
            /** add user untuk calon_user */
            //$values =array("email"=>$value['email'],"password"=> $value['password']);
            $result_user_id = $this->conn->insertInto('users',$values)->execute();
            if($result_user_id){
                return $result_user_id;
            }
            return false;
          
            $valuesppdb_det =array(
                "id_biodata"=>$result_user_id,
            );
            
            $id_ppdb_det = $this->conn->insertInto('ppdb_det',$valuesppdb_det)->execute();
            return $this->get_detail_user($id_ppdb_det);
    }
}