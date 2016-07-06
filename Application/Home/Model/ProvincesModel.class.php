<?php
namespace Home\Model;

use Home\Model\BaseModel;

class ProvincesModel extends BaseModel
{
    public function provincesAdd($data){
        return $this->add($data);
    }
    
    public function provincesList() {
        return $this->select();
    }
    
    public function provincesUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function provincesDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function provincesFind($where){
        return $this->where($where)->find();
    }
    
    public function provincesSelect($where){
        return $this->where($where)->select();
    }
}

?>