<?php
namespace Home\Model;

use Home\Model\BaseModel;

class MemberModel extends BaseModel
{
    public function memberAdd($data){
        return $this->add($data);
    }
    
    public function memberList() {
        return $this->where('member.DEL_FLG = "0"')
                        ->join('left join member_card on member.MEMBER_ID = member_card.MEMBER_ID and member_card.DEL_FLG = "0" ')
                        ->join('left join member_card_type on member_card_type.MEMBER_CARD_TYPE_ID = member_card.MEMBER_CARD_TYPE_ID and member_card_type.DEL_FLG = "0" ')
                        ->field(array(
                            'member.MEMBER_ID' =>'MEMBER_ID',
                            'member.MEMBER_NAME' =>'MEMBER_NAME',
                            'member.MEMBER_TEL' =>'MEMBER_TEL',
                            'member.MEMBER_BIRTHDAY' =>'MEMBER_BIRTHDAY',
                            'member.MEMBER_SEX' =>'MEMBER_SEX',
                            'member.MEMBER_MESSAGE' =>'MEMBER_MESSAGE',
                            'member.MEMBER_POINT' =>'MEMBER_POINT',
                            'member.MEMBER_BLOOD_TYPE' =>'MEMBER_BLOOD_TYPE',
                            'member.MEMBER_HEIGHT' =>'MEMBER_HEIGHT',
                            'member.MEMBER_WEIGHT' =>'MEMBER_WEIGHT',
                            'member.MEMBER_HOBBY' =>'MEMBER_HOBBY',
                            'member.MEMBER_HOME_TEL' =>'MEMBER_HOME_TEL',
                            'member.MEMBER_ID_CARD' =>'MEMBER_ID_CARD',
                            'member.MEMBER_ADDRESS' =>'MEMBER_ADDRESS',
                            'member.MEMBER_WORK' =>'MEMBER_WORK',
                            'member.MEMBER_COMMENT' =>'MEMBER_COMMENT',
                            'member.MEMBER_MARRAY' =>'MEMBER_MARRAY',
                            'member.MEMBER_IMG' =>'MEMBER_IMG',
                            'member.MEMBER_SKIN_COMMENT' =>'MEMBER_SKIN_COMMENT',
                            'member.MEMBER_EFFECT_COMMENT' =>'MEMBER_EFFECT_COMMENT',
                            'member.MEMBER_OTHER_COMMENT' =>'MEMBER_OTHER_COMMENT',
                            'member_card.MEMBER_CARD_ID' =>'MEMBER_CARD_ID',
                            'member_card.MEMBER_CARD_NO' =>'MEMBER_CARD_NO',
                            'member_card.BALANCE_MONEY' =>'BALANCE_MONEY',
                            'member_card.ARREARS_MONEY' =>'ARREARS_MONEY',
                            'member_card.GIFT_MONEY' =>'GIFT_MONEY',
                            'member_card.MEMBER_CARD_DISCOUNT' =>'MEMBER_CARD_DISCOUNT',
                            'member_card.PAY_AMOUNG' =>'PAY_AMOUNG',
                            'member_card.LAST_PAY_DATE' =>'LAST_PAY_DATE',
                            'member_card.LAST_PAY_DATE' =>'LAST_PAY_DATE',
                            'member_card_type.MEMBER_CARD_TYPE_ID' =>'MEMBER_CARD_TYPE_ID',
                            'member_card_type.MEMBER_CARD_TYPE_NAME' => 'MEMBER_CARD_TYPE_NAME'
                        ))
                        ->select();
    }
    
    public function memberUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function memberDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function memberFind($where){
        return $this->where($where)
                        ->join('left join member_card on member.MEMBER_ID = member_card.MEMBER_ID and member_card.DEL_FLG = "0" ')
                        ->join('left join member_card_type on member_card_type.MEMBER_CARD_TYPE_ID = member_card.MEMBER_CARD_TYPE_ID and member_card_type.DEL_FLG = "0" ')
                        ->field(array(
                            'member.MEMBER_ID' =>'MEMBER_ID',
                            'member.MEMBER_NAME' =>'MEMBER_NAME',
                            'member.MEMBER_TEL' =>'MEMBER_TEL',
                            'member.MEMBER_BIRTHDAY' =>'MEMBER_BIRTHDAY',
                            'member.MEMBER_SEX' =>'MEMBER_SEX',
                            'member.MEMBER_MESSAGE' =>'MEMBER_MESSAGE',
                            'member.MEMBER_POINT' =>'MEMBER_POINT',
                            'member.MEMBER_BLOOD_TYPE' =>'MEMBER_BLOOD_TYPE',
                            'member.MEMBER_HEIGHT' =>'MEMBER_HEIGHT',
                            'member.MEMBER_WEIGHT' =>'MEMBER_WEIGHT',
                            'member.MEMBER_HOBBY' =>'MEMBER_HOBBY',
                            'member.MEMBER_HOME_TEL' =>'MEMBER_HOME_TEL',
                            'member.MEMBER_ID_CARD' =>'MEMBER_ID_CARD',
                            'member.MEMBER_ADDRESS' =>'MEMBER_ADDRESS',
                            'member.MEMBER_WORK' =>'MEMBER_WORK',
                            'member.MEMBER_COMMENT' =>'MEMBER_COMMENT',
                            'member.MEMBER_MARRAY' =>'MEMBER_MARRAY',
                            'member.MEMBER_IMG' =>'MEMBER_IMG',
                            'member.MEMBER_SKIN_COMMENT' =>'MEMBER_SKIN_COMMENT',
                            'member.MEMBER_EFFECT_COMMENT' =>'MEMBER_EFFECT_COMMENT',
                            'member.MEMBER_OTHER_COMMENT' =>'MEMBER_OTHER_COMMENT',
                            'member_card.MEMBER_CARD_ID' =>'MEMBER_CARD_ID',
                            'member_card.MEMBER_CARD_NO' =>'MEMBER_CARD_NO',
                            'member_card.BALANCE_MONEY' =>'BALANCE_MONEY',
                            'member_card.ARREARS_MONEY' =>'ARREARS_MONEY',
                            'member_card.GIFT_MONEY' =>'GIFT_MONEY',
                            'member_card.MEMBER_CARD_DISCOUNT' =>'MEMBER_CARD_DISCOUNT',
                            'member_card.PAY_AMOUNG' =>'PAY_AMOUNG',
                            'member_card.LAST_PAY_DATE' =>'LAST_PAY_DATE',
                            'member_card.LAST_PAY_DATE' =>'LAST_PAY_DATE',
                            'member_card_type.MEMBER_CARD_TYPE_ID' =>'MEMBER_CARD_TYPE_ID',
                            'MEMBER_CARD_TYPE_NAME' => 'MEMBER_CARD_TYPE_NAME'
                        ))->find();
    }
    
    public function memberSelect($where){
        return $this->where($where)
                        ->join('left join member_card on member.MEMBER_ID = member_card.MEMBER_ID and member_card.DEL_FLG = "0" ')
                        ->join('left join member_card_type on member_card_type.MEMBER_CARD_TYPE_ID = member_card.MEMBER_CARD_TYPE_ID and member_card_type.DEL_FLG = "0" ')
                        ->field(array(
                            'member.MEMBER_ID' =>'MEMBER_ID',
                            'member.MEMBER_NAME' =>'MEMBER_NAME',
                            'member.MEMBER_TEL' =>'MEMBER_TEL',
                            'member.MEMBER_BIRTHDAY' =>'MEMBER_BIRTHDAY',
                            'member.MEMBER_SEX' =>'MEMBER_SEX',
                            'member.MEMBER_MESSAGE' =>'MEMBER_MESSAGE',
                            'member.MEMBER_POINT' =>'MEMBER_POINT',
                            'member.MEMBER_BLOOD_TYPE' =>'MEMBER_BLOOD_TYPE',
                            'member.MEMBER_HEIGHT' =>'MEMBER_HEIGHT',
                            'member.MEMBER_WEIGHT' =>'MEMBER_WEIGHT',
                            'member.MEMBER_HOBBY' =>'MEMBER_HOBBY',
                            'member.MEMBER_HOME_TEL' =>'MEMBER_HOME_TEL',
                            'member.MEMBER_ID_CARD' =>'MEMBER_ID_CARD',
                            'member.MEMBER_ADDRESS' =>'MEMBER_ADDRESS',
                            'member.MEMBER_WORK' =>'MEMBER_WORK',
                            'member.MEMBER_COMMENT' =>'MEMBER_COMMENT',
                            'member.MEMBER_MARRAY' =>'MEMBER_MARRAY',
                            'member.MEMBER_IMG' =>'MEMBER_IMG',
                            'member.MEMBER_SKIN_COMMENT' =>'MEMBER_SKIN_COMMENT',
                            'member.MEMBER_EFFECT_COMMENT' =>'MEMBER_EFFECT_COMMENT',
                            'member.MEMBER_OTHER_COMMENT' =>'MEMBER_OTHER_COMMENT',
                            'member_card.MEMBER_CARD_ID' =>'MEMBER_CARD_ID',
                            'member_card.MEMBER_CARD_NO' =>'MEMBER_CARD_NO',
                            'member_card.BALANCE_MONEY' =>'BALANCE_MONEY',
                            'member_card.ARREARS_MONEY' =>'ARREARS_MONEY',
                            'member_card.GIFT_MONEY' =>'GIFT_MONEY',
                            'member_card.MEMBER_CARD_DISCOUNT' =>'MEMBER_CARD_DISCOUNT',
                            'member_card.PAY_AMOUNG' =>'PAY_AMOUNG',
                            'member_card.LAST_PAY_DATE' =>'LAST_PAY_DATE',
                            'member_card.LAST_PAY_DATE' =>'LAST_PAY_DATE',
                            'member_card_type.MEMBER_CARD_TYPE_ID' =>'MEMBER_CARD_TYPE_ID',
                            'MEMBER_CARD_TYPE_NAME' => 'MEMBER_CARD_TYPE_NAME'
                        ))->select();
    }
}

?>