<?php
namespace Home\Model;

use Home\Model\BaseModel;

/**
 * 员工模板类
 * @date: 2016/07/06 16:11:43
 * @author: chenjianqiang98
 */
class EmployeeModel extends BaseModel
{
    /**
    * 添加员工信息
    * @date: 2016/07/06 16:12:14
    * @author: chenjianqiang98
    * @param: $data array 员工信息
    *         $add_type 0:添加一条数据 1：批量添加数据
    * @return: ID值
    */
    public function employeeAdd($data,$add_type = '0'){
        
        if ($add_type == '0'){
            return $this->add($data);
        }else {
            return $this->addAll($data);
        }
    }
    
    public function employeeList() {
        
        return $this->where('employee.DEL_FLG = "0"')
                    ->join('LEFT JOIN employee_position ON employee.EMPLOYEE_POSITION_ID = employee_position.EMPLOYEE_POSITION_ID AND employee_position.DEL_FLG = "0"')
                    ->join('LEFT JOIN employee_position_big ON employee_position_big.EMPLOYEE_POSITION_BIG_ID = employee_position.EMPLOYEE_POSITION_BIG_ID AND employee_position.DEL_FLG = "0"')
                    ->field(array(
                        'employee.EMPLOYEE_ID' => 'EMPLOYEE_ID',
                        'employee.EMPLOYEE_NO' => 'EMPLOYEE_NO',
                        'employee.EMPLOYEE_NAME' => 'EMPLOYEE_NAME',
                        'employee.EMPLOYEE_SEX' => 'EMPLOYEE_SEX',
                        'employee.EMPLOYEE_POSITION_ID' => 'EMPLOYEE_POSITION_ID',
                        'employee_position.EMPLOYEE_POSITION_NAME' => 'EMPLOYEE_POSITION_NAME',
                        'employee_position_big.EMPLOYEE_POSITION_BIG_ID' => 'EMPLOYEE_POSITION_BIG_ID',
                        'employee.EMPLOYEE_STATUS' => 'EMPLOYEE_STATUS',
                        'employee.EMPLOYEE_TEL' => 'EMPLOYEE_TEL',
                        'employee.EMPLOYEE_ID_CARD' => 'EMPLOYEE_ID_CARD',
                        'employee.EMPLOYEE_BANK_NO' => 'EMPLOYEE_BANK_NO',
                        'employee.EMPLOYEE_BIRTHDAY' => 'EMPLOYEE_BIRTHDAY',
                        'employee.EMPLOYEE_WORK_DATE' => 'EMPLOYEE_WORK_DATE'
                    ))->select();
        
        
    }
    
    public function employeeUpdate($where,$data) {
        
        return $this->where($where)->save($data);
    }
    
    public function employeeDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function employeeFind($where){
        return $this->where($where)->find();
    }
    
    public function employeeSelect($where){
        return $this->where($where)->select();
    }
    
    public function get_employee_no(){
        
        //取得员工所有编号
        $employee_no_data = $this->field('EMPLOYEE_NO') ->select();
        
        return substr('0000000' . (count($employee_no_data) + 1), -7, 7);
    }
    
}

?>