<?php
namespace Home\Model;

use Home\Model\BaseModel;

class ZipcodeModel extends BaseModel
{
    public function zipcodeAdd($data){
        return $this->add($data);
    }
    
    public function zipcodeList() {
        return $this->select();
    }
    
    public function zipcodeUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function zipcodeDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function zipcodeFind($where){
        return $this->where($where)->find();
    }
    
    public function zipcodeSelect($where){
        return $this->where($where)->select();
    }
}

?>