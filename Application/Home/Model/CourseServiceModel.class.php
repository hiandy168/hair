<?php
namespace Home\Model;

use Home\Model\BaseModel;

class CourseServiceModel extends BaseModel
{
    public function courseServiceAdd($data){
        return $this->add($data);
    }
    
    public function courseServiceList() {
        return $this->where('course_service.DEL_FLG = "0"')
                    ->select();
    }
    
    public function courseServiceUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function courseServiceDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function courseServiceFind($where){
        return $this->where($where)->find();
    }
    
    public function courseServiceSelect($where){
        return $this->where($where)->select();
    }
}

?>