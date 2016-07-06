<?php
namespace Home\Model;

use Home\Model\BaseModel;

class OrderItemServiceEmployeeModel extends BaseModel
{
    public function orderItemServiceEmployeeList(){
        return $this->where('order_item_service_employee.DEL_FLG = 0')
                          ->join('left join employee on employee.EMPLOYEE_ID = order_item_service_employee.EMPLOYEE_ID and employee.DEL_FLG ="0"')
                          ->join('left join employee_position on employee_position.EMPLOYEE_POSITION_ID = order_item_service_employee.EMPLOYEE_POSITION_ID and employee_position.DEL_FLG ="0"')
                          ->field(array(
                              'order_item_service_employee.ORDER_ITEM_SERVICE_EMPLOYEE_ID' => 'ORDER_ITEM_SERVICE_EMPLOYEE_ID',
                              'order_item_service_employee.ORDER_ID' => 'ORDER_ID',
                              'order_item_service_employee.ORDER_ITEM_SERVICE_ID' => 'ORDER_ITEM_SERVICE_ID',
                              'order_item_service_employee.ORDER_ITEM_SERVICE_RESULT' => 'ORDER_ITEM_SERVICE_RESULT',
                              'order_item_service_employee.ORDER_ITEM_SERVICE_COMMISSION' => 'ORDER_ITEM_SERVICE_COMMISSION',
                              'employee.EMPLOYEE_ID' => 'EMPLOYEE_ID',
                              'employee.EMPLOYEE_NAME' => 'EMPLOYEE_NAME',
                              'employee_position.EMPLOYEE_POSITION_ID' => 'EMPLOYEE_POSITION_ID',
                              'employee_position.EMPLOYEE_POSITION_NAME' => 'EMPLOYEE_POSITION_NAME'
                          ))
                          ->select();
    }
    
    public function orderItemServiceEmployeeAdd($data){
        return $this->add($data);
    }
    
    public function orderItemServiceEmployeeUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function orderItemServiceEmployeeDelete($where){
        return $this->where($where)->delete();
    }
    
    public function orderItemServiceEmployeeSelect($where) {
        return $this->where($where)->select();
    }
    
    public function orderItemServiceEmployeeFind($where) {
        return $this->where($where)->find();
    }
}

?>