<?php
namespace Home\Model;

use Home\Model\BaseModel;

class OrderItemChargeEmplopyee extends BaseModel
{
    public function orderItemChargeEmplopyeeList(){
        return $this->where('DEL_FLG = 0')->select();
    }
    
    public function orderItemChargeEmplopyeeAdd($data){
        return $this->add($data);
    }
    
    public function orderItemChargeEmplopyeeUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function orderItemChargeEmplopyeeDelete($where){
        return $this->where($where)->delete();
    }
    
    public function orderItemChargeEmplopyeeSelect($where) {
        return $this->where($where)->select();
    }
    
    public function orderItemChargeEmplopyeeFind($where) {
        return $this->where($where)->find();
    }
}

?>