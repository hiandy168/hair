<?php
namespace Home\Model;

use Home\Model\BaseModel;

class CourseCategoryModel extends BaseModel
{
    public function courseCategoryAdd($data){
        return $this->add($data);
    }
    
    public function courseCategoryList() {
        return $this->where('DEL_FLG = "0"')
        ->select();
    }
    
    public function courseCategoryUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function courseCategoryDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function courseCategoryFind($where){
        return $this->where($where)->find();
    }
    
    public function courseCategorySelect($where){
        return $this->where($where)->select();
    }
}

?>