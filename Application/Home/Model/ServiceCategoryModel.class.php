<?php
namespace Home\Model;

use Home\Model\BaseModel;

class ServiceCategoryModel extends BaseModel
{
    public function serviceCategoryAdd($data){
        return $this->add($data);
    }
    
    public function serviceCategoryList() {
        return $this->where('DEL_FLG ="0"')
        ->select();
    }
    
    public function serviceCategoryUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function serviceCategoryDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function serviceCategoryFind($where){
        return $this->where($where)->find();
    }
    
    public function serviceCategorySelect($where){
        return $this->where($where)->select();
    }
}

?>