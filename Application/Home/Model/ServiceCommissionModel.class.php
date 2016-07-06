<?php
namespace Home\Model;

use Home\Model\BaseModel;

class ServiceCommissionModel extends BaseModel
{
    public function serviceCommissionAdd($data){
        return $this->add($data);
    }
    
    public function serviceCommissionList() {
        return $this->where('service_commission.DEL_FLG = "0"')
                    ->join('left join employee_position ON employee_position.EMPLOYEE_POSITION_ID = service_commission.EMPLOYEE_POSITION_ID AND employee_position.DEL_FLG= "0"')
                    ->field(array(
                        'service_commission.SERVICE_COMMISSION_ID' => 'SERVICE_COMMISSION_ID',
                        'service_commission.SERVICE_ID' => 'SERVICE_ID',
                        'service_commission.EMPLOYEE_POSITION_BIG_ID' => 'EMPLOYEE_POSITION_BIG_ID',
                        'service_commission.MEMBER_COMMISION_TYPE' => 'MEMBER_COMMISION_TYPE',
                        'service_commission.MEMBER_DISCOUNT' => 'MEMBER_DISCOUNT',
                        'service_commission.MEMBER_AMOUNT' => 'MEMBER_AMOUNT',
                        'service_commission.PERSONAL_COMMISION_TYPE' => 'PERSONAL_COMMISION_TYPE',
                        'service_commission.PERSONAL_DISCOUNT' => 'PERSONAL_DISCOUNT',
                        'service_commission.PERSONAL_AMOUNT' => 'PERSONAL_AMOUNT',
                        'employee_position.EMPLOYEE_POSITION_ID' => 'EMPLOYEE_POSITION_ID',
                        'employee_position.EMPLOYEE_POSITION_NAME' => 'EMPLOYEE_POSITION_NAME'
                    ))
                    ->select();
    }
    
    public function serviceCommissionUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function serviceCommissionDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function serviceCommissionFind($where){
        return $this->where($where)->join('left join employee_position ON employee_position.EMPLOYEE_POSITION_ID = service_commission.EMPLOYEE_POSITION_ID AND employee_position.DEL_FLG= "0"')
                    ->field(array(
                        'service_commission.SERVICE_COMMISSION_ID' => 'SERVICE_COMMISSION_ID',
                        'service_commission.SERVICE_ID' => 'SERVICE_ID',
                        'service_commission.EMPLOYEE_POSITION_BIG_ID' => 'EMPLOYEE_POSITION_BIG_ID',
                        'service_commission.MEMBER_COMMISION_TYPE' => 'MEMBER_COMMISION_TYPE',
                        'service_commission.MEMBER_DISCOUNT' => 'MEMBER_DISCOUNT',
                        'service_commission.MEMBER_AMOUNT' => 'MEMBER_AMOUNT',
                        'service_commission.PERSONAL_COMMISION_TYPE' => 'PERSONAL_COMMISION_TYPE',
                        'service_commission.PERSONAL_DISCOUNT' => 'PERSONAL_DISCOUNT',
                        'service_commission.PERSONAL_AMOUNT' => 'PERSONAL_AMOUNT',
                        'employee_position.EMPLOYEE_POSITION_ID' => 'EMPLOYEE_POSITION_ID',
                        'employee_position.EMPLOYEE_POSITION_NAME' => 'EMPLOYEE_POSITION_NAME'
                    ))
                    ->find();
    }
    
    public function serviceCommissionSelect($where){
        return $this->where($where)
                    ->join('left join employee_position ON employee_position.EMPLOYEE_POSITION_ID = service_commission.EMPLOYEE_POSITION_ID AND employee_position.DEL_FLG= "0"')
                    ->field(array(
                        'service_commission.SERVICE_COMMISSION_ID' => 'SERVICE_COMMISSION_ID',
                        'service_commission.SERVICE_ID' => 'SERVICE_ID',
                        'service_commission.EMPLOYEE_POSITION_BIG_ID' => 'EMPLOYEE_POSITION_BIG_ID',
                        'service_commission.MEMBER_COMMISION_TYPE' => 'MEMBER_COMMISION_TYPE',
                        'service_commission.MEMBER_DISCOUNT' => 'MEMBER_DISCOUNT',
                        'service_commission.MEMBER_AMOUNT' => 'MEMBER_AMOUNT',
                        'service_commission.PERSONAL_COMMISION_TYPE' => 'PERSONAL_COMMISION_TYPE',
                        'service_commission.PERSONAL_DISCOUNT' => 'PERSONAL_DISCOUNT',
                        'service_commission.PERSONAL_AMOUNT' => 'PERSONAL_AMOUNT',
                        'employee_position.EMPLOYEE_POSITION_ID' => 'EMPLOYEE_POSITION_ID',
                        'employee_position.EMPLOYEE_POSITION_NAME' => 'EMPLOYEE_POSITION_NAME'
                    ))
                    ->select();
    }
}

?>