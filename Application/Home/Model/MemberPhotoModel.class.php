<?php
namespace Home\Model;

use Home\Model\BaseModel;

class MemberPhotoModel extends BaseModel
{
    public function memberPhotoAdd($data){
        return $this->add($data);
    }
    
    public function memberPhotoList() {
        return $this->where('DEL_FLG = "0"')
        ->select();
    }
    
    public function memberPhotoUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function memberPhotoDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function memberPhotoFind($where){
        return $this->where($where)->find();
    }
    
    public function memberPhotoSelect($where){
        return $this->where($where)->select();
    }
}

?>