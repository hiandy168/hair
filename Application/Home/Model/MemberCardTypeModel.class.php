<?php
namespace Home\Model;

use Home\Model\BaseModel;

class MemberCardTypeModel extends BaseModel
{
    public function memberCardTypeAdd($data){
        return $this->add($data);
    }
    
    public function memberCardTypeList($page='') {
        return $this->where('member_card_type.DEL_FLG = "0"')
                    ->page($page)
                    ->select();
    }
    
    public function memberCardTypeUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function memberCardTypeDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function memberCardTypeFind($where){
        return $this->where($where)->find();
    }
    
    public function memberCardTypeSelect($where){
        return $this->where($where)->select();
    }
    
    public function get_member_card_type_count() {
        $member_card_type_data =$this->where('member_card_type.DEL_FLG = "0"')
                                ->select();
        
        return count($member_card_type_data);
    }
}

?>