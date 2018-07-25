<?php
class bio_siswa extends DbConnect{
    /** setup biodata untuk calon_user */
    public function insert_bio($values){
        $id_biodata = $this->conn->insertInto('biodata_siswa',$valuesbiodata_siswa)->execute();
        if($id_biodata){
            return $id_biodata;
        }
        return false;
    }
    public function update_bio($field, $where){
        $id_biodata = $this->conn->update('biodata_siswa',$field,$where)->execute();
        if($id_biodata){
            return $id_biodata;
        }
        return false;
    }
    public function delete_bio($where){
        $id_biodata = $this->conn->deleteFrom('biodata_siswa',$where)->execute();
        if($id_biodata){
            return $id_biodata;
        }
        return false;
    }

}