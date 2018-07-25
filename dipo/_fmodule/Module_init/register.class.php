<?php
class register extends DbConnect{   
    public function insert_users($value){
        /** check duplicate data */
        $values =array("users.email"=>$value['email'],"users.password"=>$value['password'],"biodata_siswa.nisn"=>$value['nisn']);
        $query = $this->conn->from('users')
                ->innerJoin("biodata_siswa on biodata_siswa.id_biodata = users.user_id")
                ->innerJoin("role_users on role_users.user_id = users.user_id")
                ->where($values)
                ->select(null)->select("COUNT(*)")->fetch('COUNT(*)');
        if($query < 1){
            /** add user untuk calon_user */
            $values =array("email"=>$value['email'],"password"=> $value['password']);
            $result_user_id = $this->conn->insertInto('users',$values)->execute();
            /** setup roles untuk calon_user */
            $this->add_roles($result_user_id,$this->get_rules());
            /** setup biodata untuk calon_user */
            $valuesbiodata_siswa =array(
                                        "id_biodata"=>$result_user_id,
                                        "nisn"=>$value['nisn'],
                                        "nama"=>$value['nama'],
                                        "jenis_kelamin"=>$value['jenis_kelamin'],
                                        "tgl_lahir"=>$value['tgl_lahir'],
                                        "tmpt_lahir"=>$value['tmpt_lahir'],
                                    );
            $id_biodata = $this->conn->insertInto('biodata_siswa',$valuesbiodata_siswa)->execute();
            $valuesppdb_det =array(
                "id_biodata"=>$result_user_id,
            );
            
            $id_ppdb_det = $this->conn->insertInto('ppdb_det',$valuesppdb_det)->execute();
            return $this->get_detail_register($id_ppdb_det);
        }
        return false;
    }
    
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
}