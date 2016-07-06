<?php
namespace Home\Model;

class AdminRoleModel extends BaseModel
{
    public function adminRoleAdd($data){
        return $this->add($data);
    }
    
    public function adminRoleList() {
        return $this->where('DEL_FLG = "0"')
        ->select();
    }
    
    public function adminRoleUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function adminRoleDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function adminRoleFind($where){
        return $this->where($where)->find();
    }
    
    public function adminRoleSelect($where){
        return $this->where($where)->select();
    }
}

?>