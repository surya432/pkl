<?php
class user_role extends DbConnect{
    function get_user_rules_id($value){
        $query = $this->conn->from('rules')->where($value)->select('role_id');
        return $query->fetch('role_id');
    }
    public function add_role_user($role,$user_id){
        if($this->count_role_users($role,$user_id) < 1){
            $query_role = $this->conn->insertInto('role_users',$values)->execute();
            return true;
        }
        return false;
    }
    public function count_role_users($role,$user_id){
        $role_id = $this->get_user_rules_id($role);
        $values =array("user_id"=>$user_id,"role_id"=>$role_id);
        $query = $this->conn->from('role_users')
                ->where($values)
                ->select(null)->select("COUNT(*)")->fetch('COUNT(*)');
        return $query;
    }
    public function delete_role_users($role,$user_id){
        if($this->count_role_users($role,$user_id) >= 1){
            //$value=array("role_id"=>$this->get_user_rules_id($role),"user_id"->$user_id);
            $query_role = $this->conn->deleteFrom('role_users')->where($value)->execute();
            return true;
        }
        return false;
    }
}