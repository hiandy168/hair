<?php
namespace Home\Model;

use Home\Model\BaseModel;

class CityModel extends BaseModel
{
    public function cityAdd($data){
        return $this->add($data);
    }
    
    public function cityList() {
        return $this->select();
    }
    
    public function cityUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function cityDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function cityFind($where){
        return $this->where($where)->find();
    }
    
    public function citySelect($where){
        return $this->where($where)->select();
    }
}

?>