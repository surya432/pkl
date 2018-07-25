<?php
class roles extends DbConnect{
    function check_roles($values){
        $values= array("nama"=>$values);
        $query = $this->conn->from('roles')
                ->where($values)
                ->select(null)->select("COUNT(*)")->fetch('COUNT(*)');
        return $query;
    }
    public function insert_role($values){
        if($this->check_roles($values)){
            $query = $this->conn->insertInto('roles', $values)->execute();
            return $query;
        }
        return false;
    }
    public function delete_role($values){
        $query = $this->conn->deleteFrom('roles', $values)->execute();
        return true;
    }
    public function getAll_role(){
        $query= $this->conn->from('roles');
        if($query->fetch()){
            return $query->fetchAll('role_id','role_id,nama');
        }
        return false;
    }
    public function update_role($values){
        $query = $this->conn->update('roles',$values['nama'],$values['role_id'])->execute();
        if($query){
            return true;
        }
        return false;
    }

}