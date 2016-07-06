<?php
namespace Home\Model;

use Home\Model\BaseModel;

class MemberCardCommissionModel extends BaseModel
{
    public function memberCardCommissionAdd($data){
        return $this->add($data);
    }
    
    public function memberCardCommissionList() {
        return $this->where('DEL_FLG = "0"')
        ->select();
    }
    
    public function memberCardCommissionUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function memberCardCommissionDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function memberCardCommissionFind($where){
        return $this->where($where)->find();
    }
    
    public function memberCardCommissionSelect($where){
        return $this->where($where)->select();
    }
}

?>