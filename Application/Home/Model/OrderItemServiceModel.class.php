<?php
namespace Home\Model;

use Home\Model\BaseModel;
class OrderItemServiceModel extends BaseModel
{
    public function orderItemServiceList(){
        return $this->where('DEL_FLG = 0')->select();
    }
    
    public function orderItemServiceAdd($data){
        return $this->add($data);
    }
    
    public function orderItemServiceUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function orderItemServiceDelete($where){
        return $this->where($where)->delete();
    }
    
    public function orderItemServiceSelect($where) {
        return $this->where($where)->select();
    }
    
    public function orderItemServiceFind($where) {
        return $this->where($where)->find();
    }
}

?>