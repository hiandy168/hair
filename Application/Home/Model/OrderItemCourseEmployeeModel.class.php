<?php
namespace Home\Model;

use Home\Model\BaseModel;

class OrderItemCourseEmployeeModel extends BaseModel
{
    public function orderItemCourseEmployeeList(){
        return $this->where('order_item_course_employee.DEL_FLG = 0')
                          ->join('left join employee on employee.EMPLOYEE_ID = order_item_course_employee.EMPLOYEE_ID and employee.DEL_FLG ="0"')
                          ->join('left join employee_position on employee_position.EMPLOYEE_POSITION_ID = order_item_course_employee.EMPLOYEE_POSITION_ID and employee_position.DEL_FLG ="0"')
                          ->field(array(
                              'order_item_course_employee.ORDER_ITEM_COURSE_EMPLOYEE_ID' => 'ORDER_ITEM_COURSE_EMPLOYEE_ID',
                              'order_item_course_employee.ORDER_ID' => 'ORDER_ID',
                              'order_item_course_employee.ORDER_ITEM_COURSE_ID' => 'ORDER_ITEM_COURSE_ID',
                              'order_item_course_employee.ORDER_ITEM_COURSE_RESULT' => 'ORDER_ITEM_COURSE_RESULT',
                              'order_item_course_employee.ORDER_ITEM_COURSE_COMMISION' => 'ORDER_ITEM_COURSE_COMMISION',
                              'employee.EMPLOYEE_ID' => 'EMPLOYEE_ID',
                              'employee.EMPLOYEE_NAME' => 'EMPLOYEE_NAME',
                              'employee_position.EMPLOYEE_POSITION_ID' => 'EMPLOYEE_POSITION_ID',
                              'employee_position.EMPLOYEE_POSITION_NAME' => 'EMPLOYEE_POSITION_NAME'
                          ))
                          ->select();
    }
    
    public function orderItemCourseEmployeeAdd($data){
        return $this->add($data);
    }
    
    public function orderItemCourseEmployeeUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function orderItemCourseEmployeeDelete($where){
        return $this->where($where)->delete();
    }
    
    public function orderItemCourseEmployeeSelect($where) {
        return $this->where($where)->select();
    }
    
    public function orderItemCourseEmployeeFind($where) {
        return $this->where($where)->find();
    }
}

?>