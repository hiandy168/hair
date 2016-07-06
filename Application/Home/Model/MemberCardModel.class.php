<?php
namespace Home\Model;

use Home\Model\BaseModel;

class MemberCardModel extends BaseModel
{
    public function memberCardAdd($data){
        return $this->add($data);
    }
    
    public function memberCardList() {
        return $this->where('DEL_FLG = "0"')
        ->select();
    }
    
    public function memberCardUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function memberCardDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function memberCardFind($where){
        return $this->where($where)->find();
    }
    
    public function memberCardSelect($where){
        return $this->where($where)->select();
    }
}

?>