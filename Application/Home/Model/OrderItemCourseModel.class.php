<?php
namespace Home\Model;

use Home\Model\BaseModel;

class OrderItemCourseModel extends BaseModel
{
    public function orderItemCourseList(){
        return $this->where('DEL_FLG = 0')->select();
    }
    
    public function orderItemCourseAdd($data){
        return $this->add($data);
    }
    
    public function orderItemCourseUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function orderItemCourseDelete($where){
        return $this->where($where)->delete();
    }
    
    public function orderItemCourseSelect($where) {
        return $this->where($where)->select();
    }
    
    public function orderItemCourseFind($where) {
        return $this->where($where)->find();
    }
}

?>