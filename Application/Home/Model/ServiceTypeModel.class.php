<?php
namespace Home\Model;

use Home\Model\BaseModel;

class ServiceTypeModel extends BaseModel
{
    public function serviceTypeAdd($data){
        return $this->add($data);
    }
    
    public function serviceTypeList() {
        return $this->where('DEL_FLG ="0"')
                            ->select();
    }
    
    public function serviceTypeUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function serviceTypeDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function serviceTypeFind($where){
        return $this->where($where)->find();
    }
    
    public function serviceTypeSelect($where){
        return $this->where($where)->select();
    }
}

?>