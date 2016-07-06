<?php
namespace Home\Model;

use Home\Model\BaseModel;

class ShopModel extends BaseModel
{
    public function shopAdd($data){
        return $this->add($data);
    }
    
    public function shopList() {
        return $this->where('DEL_FLG = "0"')
        ->select();
    }
    
    public function shopUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function shopDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function shopFind($where){
        return $this->where($where)->find();
    }
    
    public function shopSelect($where){
        return $this->where($where)->select();
    }
}

?>