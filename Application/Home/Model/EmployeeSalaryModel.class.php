<?php
namespace Home\Model;

use Home\Model\BaseModel;

class EmployeeSalaryModel extends BaseModel
{
    public function employeeSalaryAdd($data){
        return $this->add($data);
    }
    
    public function employeeSalaryList() {
        return $this->where('DEL_FLG = "0"')
        ->select();
    }
    
    public function employeeSalaryUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function employeeSalaryDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function employeeSalaryFind($where){
        return $this->where($where)->find();
    }
    
    public function employeeSalarySelect($where){
        return $this->where($where)->select();
    }
}

?>