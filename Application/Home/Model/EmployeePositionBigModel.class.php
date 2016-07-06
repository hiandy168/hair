<?php
namespace Home\Model;

use Home\Model\BaseModel;

class EmployeePositionBigModel extends BaseModel
{
    public function employeePositionBigList(){
        return $this->where('DEL_FLG = "0"') ->select();
    }
    
    public function employeePositionBigAdd($data) {
        return $this ->add($data);
    }
    
    public function employeePositionBigUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function employeePositionBigDelete($where) {
        return $this->where($where)->delete();
    }
    
    public function employeePositionBigFind($where) {
        return $this->where($where)->find();
    }
    
    public function employeePositionBigSelect($where) {
        return $this->where($where)->select();
    }
}

?>