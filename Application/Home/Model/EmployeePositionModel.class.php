<?php
namespace Home\Model;

use Home\Model\BaseModel;

class EmployeePositionModel extends BaseModel
{
    public function employeePositionList(){
        return $this->where('DEL_FLG = "0"') ->select();
    }
    
    public function employeePositionAdd($data) {
        return $this ->add($data);
    }
    
    public function employeePositionUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function employeePositionDelete($where) {
        return $this->where($where)->delete();
    }
    
    public function employeePositionFind($where) {
        return $this->where($where)->find();
    }
    
    public function employeePositionSelect($where) {
        return $this->where($where)->select();
    }
}

?>