<?php
namespace Home\Model;

use Home\Model\BaseModel;

class OrderItemChargeModel extends BaseModel
{
    public function orderItemChargeList(){
        return $this->where('DEL_FLG = 0')->select();
    }
    
    public function orderItemChargeAdd($data){
        return $this->add($data);
    }
    
    public function orderItemChargeUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function orderItemChargeDelete($where){
        return $this->where($where)->delete();
    }
    
    public function orderItemChargeSelect($where) {
        return $this->where($where)->select();
    }
    
    public function orderItemChargeFind($where) {
        return $this->where($where)->find();
    }
}

?>