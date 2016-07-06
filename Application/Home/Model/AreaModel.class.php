<?php
namespace Home\Model;

use Home\Model\BaseModel;

class AreaModel extends BaseModel
{
    public function areaAdd($data){
        return $this->add($data);
    }
    
    public function areaList() {
        return $this->select();
    }
    
    public function areaUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function areaDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function areaFind($where){
        return $this->where($where)->find();
    }
    
    public function areaSelect($where){
        return $this->where($where)->select();
    }
}

?>