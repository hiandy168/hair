<?php
namespace Home\Model;

use Home\Model\BaseModel;

class OrderModel extends BaseModel
{
    public function orderList(){
        return $this->where('DEL_FLG = 0')
                    ->select();
    }
    
    public function orderAdd($data){
        return $this->add($data);
    }
    
    public function orderUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function orderDelete($where){
        return $this->where($where)->delete();
    }
    
    public function orderSelect($where) {
        return $this->where($where)->select();
    }
    
    public function orderFind($where) {
        return $this->where($where)->find();
    }
}

?>