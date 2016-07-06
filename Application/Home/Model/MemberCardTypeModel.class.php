<?php
namespace Home\Model;

use Home\Model\BaseModel;

class MemberCardTypeModel extends BaseModel
{
    public function memberCardTypeAdd($data){
        return $this->add($data);
    }
    
    public function memberCardTypeList() {
        return $this->where('member_card_type.DEL_FLG = "0"')
                    /*
                    ->join('inner join member_card_commission on member_card_commission.MEMBER_CARD_TYPE_ID = member_card_type.MEMBER_CARD_TYPE_ID and member_card_commission.DEL_FLG= "0"')
                    ->field(array(
                        'member_card_type.MEMBER_CARD_TYPE_ID' => 'MEMBER_CARD_TYPE_ID',
                        'member_card_type.MEMBER_CARD_TYPE_NAME' => 'MEMBER_CARD_TYPE_NAME',
                        'member_card_type.IS_LOCK' => 'IS_LOCK',
                        'member_card_type.SERVICE_DISCOUNT' => 'SERVICE_DISCOUNT',
                        'member_card_type.GOODS_DISCOUNT' => 'GOODS_DISCOUNT',
                        'member_card_type.COURSE_DISCOUNT' => 'COURSE_DISCOUNT',
                        'member_card_type.COMMENT' => 'COMMENT',
                        'member_card_commission.MEMBER_CARD_COMMISSION_ID' => 'MEMBER_CARD_COMMISSION_ID',
                        'member_card_commission.EMPLOYEE_POSITION_BIG_ID' => 'EMPLOYEE_POSITION_BIG_ID',
                        'member_card_commission.EMPLOYEE_POSITION_ID' => 'EMPLOYEE_POSITION_ID',
                        'member_card_commission.OPEN_DISCOUNT' => 'OPEN_DISCOUNT',
                        'member_card_commission.OPEN_AMOUNT' => 'OPEN_AMOUNT',
                        'member_card_commission.CHARGE_DISCOUNT' => 'CHARGE_DISCOUNT',
                        'member_card_commission.CHARGE_AMOUNT' => 'CHARGE_AMOUNT',
                        'member_card_commission.OPEN_TYPE' => 'OPEN_TYPE',
                        'member_card_commission.CHARGE_TYPE' => 'CHARGE_TYPE'
                    ))
                    */
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
}

?>