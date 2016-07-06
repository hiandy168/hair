<?php
namespace Home\Model;

class CourseCommissionModel extends BaseModel
{
    public function courseCommissionAdd($data){
        return $this->add($data);
    }
    
    public function courseCommissionList() {
        return $this->where('DEL_FLG = "0"')
        ->select();
    }
    
    public function courseCommissionUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function courseCommissionDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function courseCommissionFind($where){
        return $this->where($where)->find();
    }
    
    public function courseCommissionSelect($where){
        return $this->where($where)->select();
    }
}

?>