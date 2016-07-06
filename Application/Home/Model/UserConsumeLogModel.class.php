<?php
namespace Home\Model;

use Home\Model\BaseModel;

class UserConsumeLogModel extends BaseModel
{
    public function userConsumeLogAdd($data){
        return $this->add($data);
    }
    
    public function userConsumeLogList() {
        return $this->where('DEL_FLG = "0"')
        ->select();
    }
    
    public function userConsumeLogUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function userConsumeLogDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function userConsumeLogFind($where){
        return $this->where($where)->find();
    }
    
    public function userConsumeLogSelect($where){
        return $this->where($where)->select();
    }
}

?>