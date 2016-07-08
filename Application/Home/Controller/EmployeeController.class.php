<?php
namespace Home\Controller;

use Home\Controller\BaseAction;
use Home\Model\EmployeeModel;
use Home\Model\EmployeePositionModel;
use Home\Model\EmployeePositionBigModel;

class EmployeeController extends BaseAction
{
    
    public function employeeList(){
        
        $employee = new EmployeeModel('employee');
        
        $page_count = 20;
        $page = '';
        
        $employeeCount = $employee ->get_employee_count();
        if (I('get.page')<> ''){
            $this->page_init($employeeCount,$page_count,I('get.page'));
            $page = I('get.page').','.$page_count;
        }else{
            $this->page_init($employeeCount,$page_count,1);
            $page = '1,'.$page_count;
        }
        
        $page_content = $this->page_display();
        $employeeList =$employee -> employeeList($page);
        
        $this->assign('page_content',$page_content);
        $this->assign('employeCount', $employeeCount);
        $this->assign('employeeList', $employeeList);
        
        $this->display('employee:employeeList');
    }
    
    public function toEmployeeAdd() {
        
        //员工职位信息
        $employee_position_big = new EmployeePositionBigModel('employee_position_big');
        
        $employee_position_big_list = $employee_position_big ->employeePositionBigList();
        
        $this->assign('employeePositionBigList',$employee_position_big_list);
        
        //员工二级职位
        $employee_position = new EmployeePositionModel('employee_position');
        
        $employee_position_list = $employee_position ->employeePositionList();
        
        $this->assign('employeePositionList',$employee_position_list);
        
        $this->assign('system_date',get_system_time('YMD'));
        
        $this->display('employee:employeeAdd');
    }
    
    public function employeeAdd(){
        
        //员工编号
        $employee_no = '';
        
        //员工姓名
        $employee_name = '';
        
        //员工性别
        $employee_sex = '';
        
        //员工职位
        $employee_position_id = '';
        
        //员工在职状态
        $employee_status = '';
        
        //员工电话
        $employee_tel = '';
        
        //员工身份证号码
        $employee_id_card = '';
        
        //员工银行账号
        $employee_bank_no = '';
        
        //员工出生日期
        $employee_birthday = '';
        
        //员工入职时间
        $employee_work_date = '';
        
        //备注
        $employee_comment = '';
        
        //值设定
        if (I('post.employee_name') <> ''){
            $employee_name = I('post.employee_name');
        }
        
        if (I('post.employee_sex') <> ''){
            $employee_sex = I('post.employee_sex');
        }
        
        if (I('post.employee_position_id') <> ''){
            $employee_position_id = I('post.employee_position_id');
        }
        
        if (I('post.employee_status') <> ''){
            $employee_status = I('post.employee_status');
        }
        
        if (I('post.employee_tel') <> ''){
            $employee_tel = I('post.employee_tel');
        }
        
        if (I('post.employee_id_card') <> ''){
            $employee_id_card = I('post.employee_id_card');
        }
        
        if (I('post.employee_bank_no') <> ''){
            $employee_bank_no = I('post.employee_bank_no');
        }
        
        if (I('post.employee_birthday') <> ''){
            $employee_birthday = I('post.employee_birthday');
        }
        
        if (I('post.employee_work_date') <> ''){
            $employee_work_date = I('post.employee_work_date');
        }
        
        if (I('post.employee_comment') <> ''){
            $employee_comment = I('post.employee_comment');
        }
        
        $employee = new EmployeeModel('employee');
        //员工编号的取得
        $employee_no = $employee ->get_employee_no();
        
        //员工添加
        $data = array(
            'EMPLOYEE_NO' => $employee_no,
            'EMPLOYEE_NAME' => $employee_name,
            'EMPLOYEE_SEX' => $employee_sex,
            'EMPLOYEE_POSITION_ID' => $employee_position_id,
            'EMPLOYEE_STATUS' => $employee_status,
            'EMPLOYEE_TEL' => $employee_tel,
            'EMPLOYEE_ID_CARD' => $employee_id_card,
            'EMPLOYEE_BANK_NO' => $employee_bank_no,
            'EMPLOYEE_BIRTHDAY' => $employee_birthday,
            'EMPLOYEE_WORK_DATE' => $employee_work_date,
            'EMPLOYEE_COMMENT' => $employee_comment,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $result = $employee ->employeeAdd($data);
        
        if ($result !== false){
            return $this->ajaxReturn(array('result' =>true,'message'=>'添加成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' =>false,'message'=>'添加失败!'),'JSON');
        }
    }
    
    public function toEmployeeListAdd(){
        //员工职位信息
        $employee_position_big = new EmployeePositionBigModel('employee_position_big');
        
        $employee_position_big_list = $employee_position_big ->employeePositionBigList();
        
        $this->assign('employeePositionBigList',$employee_position_big_list);
        
        //员工二级职位
        $employee_position = new EmployeePositionModel('employee_position');
        
        $employee_position_list = $employee_position ->employeePositionList();
        
        $this->assign('employeePositionList',$employee_position_list);
        
        $this->display('employee:employeeListAdd');
    }
    
    public function employeeListAdd(){
        
        //员工编号
        $employee_no = '';
        
        //员工姓名
        $employee_name = '';
        
        //员工性别
        $employee_sex = '';
        
        //员工职位
        $employee_position_id = '';
        
        //员工电话
        $employee_tel = '';
        
        //员工身份证号码
        $employee_id_card = '';
        
        //值设定
        if (I('post.employee_name') <> ''){
            $employee_name = I('post.employee_name');
        }
        
        if (I('post.employee_sex') <> ''){
            $employee_sex = I('post.employee_sex');
        }
        
        if (I('post.employee_position_id') <> ''){
            $employee_position_id = I('post.employee_position_id');
        }
        
        if (I('post.employee_tel') <> ''){
            $employee_tel = I('post.employee_tel');
        }
        
        if (I('post.employee_id_card') <> ''){
            $employee_id_card = I('post.employee_id_card');
        }
        
        $employee = new EmployeeModel('employee');
        
        for ($i = 0; $i < count($employee_name); $i++){
            if ($employee_name[$i] <> ''){
                //员工编号的取得
                $employee_no = $employee ->get_employee_no();
            
                //员工添加
                $data = array(
                    'EMPLOYEE_NO' => $employee_no,
                    'EMPLOYEE_NAME' => $employee_name[$i],
                    'EMPLOYEE_SEX' => $employee_sex[$i],
                    'EMPLOYEE_POSITION_ID' => $employee_position_id[$i],
                    'EMPLOYEE_TEL' => $employee_tel[$i],
                    'EMPLOYEE_ID_CARD' => $employee_id_card[$i],
                    'EMPLOYEE_STATUS' => '0',
                    'INS_DATE' => get_system_time(),
                    'INS_USER' => I('session.admin')['admin_id'],
                    'UPD_DATE' => get_system_time(),
                    'UPD_USER' => I('session.admin')['admin_id'],
                    'DEL_FLG' => '0'
                );
            
                $result = $employee ->employeeAdd($data);
            
                if ($result === false){
                    break;
                }
            }
        }
        
        if ($result !== false){
            return $this->ajaxReturn(array('result' =>true,'message'=>'添加成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' =>false,'message'=>'添加失败!'),'JSON');
        }
        
        
    }
    
    
    public function employeeFileAdd(){
        
        if ($_FILES["employee_list_add_file"]["type"] == 'application/vnd.ms-excel')
        {
            if ($_FILES["employee_list_add_file"]["error"] > 0)
            {
                return $this->ajaxReturn(array('result' =>false,'message'=>'文件上传错误!'),'JSON');
            }
            else
            {
                $file = fopen($_FILES["employee_list_add_file"]["tmp_name"], 'r');
                
                $file_row = 0;
                
                $data[] = '';
                
                $employee = new EmployeeModel('employee');
                
                while ( ($data = fgetcsv($file))!==false ){
                    
                    if ($file_row <> 0){
                        //员工编号的取得
                        $employee_no = $employee ->get_employee_no();
                        
                        //员工添加
                        $data_employee = array(
                            'EMPLOYEE_NO' => $employee_no,
                            'EMPLOYEE_NAME' => $data[0],
                            'EMPLOYEE_SEX' => $data[2],
                            'EMPLOYEE_POSITION_ID' => $data[1],
                            'EMPLOYEE_STATUS' => '0',
                            'EMPLOYEE_TEL' => $data[3],
                            'EMPLOYEE_ID_CARD' => $data[6],
                            'EMPLOYEE_BANK_NO' => $data[7],
                            'EMPLOYEE_BIRTHDAY' => $data[4],
                            'EMPLOYEE_WORK_DATE' => $data[5],
                            'INS_DATE' => get_system_time(),
                            'INS_USER' => I('session.admin')['admin_id'],
                            'UPD_DATE' => get_system_time(),
                            'UPD_USER' => I('session.admin')['admin_id'],
                            'DEL_FLG' => '0'
                        );
                        
                        $result = $employee ->employeeAdd($data_employee);
                        
                        if ($result === false){
                            break;
                        }
                    }
                    
                    $file_row = $file_row + 1;
                    
                }
                
                fclose($file);
                
                if ($result !== false){
                    return $this->ajaxReturn(array('result' =>true,'message'=>'批量添加员工成功!'),'JSON');
                }else{
                    return $this->ajaxReturn(array('result' =>false,'message'=>'批量添加员工失败!'),'JSON');
                }
            }
                
                
        }
        else
        {
            return $this->ajaxReturn(array('result' =>false,'message'=>'文件上传错误!'),'JSON');
        }
    }
    
    public function toEmployeeUpdate(){
        //员工ID
        $employee_id = '';
        
        //值设定
        if (I('get.employee_id') <> ''){
            $employee_id = I('get.employee_id');
        }
        
        if ($employee_id <> ''){
            $employee = new EmployeeModel('employee');
            $where = 'EMPLOYEE_ID = '.$employee_id.' AND DEL_FLG = "0" ';
            
            //员工职位信息
            $employee_position_big = new EmployeePositionBigModel('employee_position_big');
            
            $employee_position_big_list = $employee_position_big ->employeePositionBigList();
            
            $this->assign('employeePositionBigList',$employee_position_big_list);
            
            //员工二级职位
            $employee_position = new EmployeePositionModel('employee_position');
            
            $employee_position_list = $employee_position ->employeePositionList();
            
            $this->assign('employeePositionList',$employee_position_list);
            $this->assign('data',$employee ->employeeFind($where));
            
            $this->display('employee:employeeUpdate');
        }else{
            $this->error('员工ID不能为空!','employee/employeeList');
        }
    }
    
    public function employeeUpdate(){
        
        //员工ID
        $employee_id = '';
        
        //员工姓名
        $employee_name = '';
        
        //员工性别
        $employee_sex = '';
        
        //员工职位
        $employee_position_id = '';
        
        //员工在职状态
        $employee_status = '';
        
        //员工电话
        $employee_tel = '';
        
        //员工身份证号码
        $employee_id_card = '';
        
        //员工银行账号
        $employee_bank_no = '';
        
        //员工出生日期
        $employee_birthday = '';
        
        //员工入职时间
        $employee_work_date = '';
        
        //备注
        $employee_comment = '';
        
        //值设定
        if (I('post.employee_id') <> ''){
            $employee_id = I('post.employee_id');
        }
        
        if (I('post.employee_name') <> ''){
            $employee_name = I('post.employee_name');
        }
        
        if (I('post.employee_sex') <> ''){
            $employee_sex = I('post.employee_sex');
        }
        
        if (I('post.employee_position_id') <> ''){
            $employee_position_id = I('post.employee_position_id');
        }
        
        if (I('post.employee_status') <> ''){
            $employee_status = I('post.employee_status');
        }
        
        if (I('post.employee_tel') <> ''){
            $employee_tel = I('post.employee_tel');
        }
        
        if (I('post.employee_id_card') <> ''){
            $employee_id_card = I('post.employee_id_card');
        }
        
        if (I('post.employee_bank_no') <> ''){
            $employee_bank_no = I('post.employee_bank_no');
        }
        
        if (I('post.employee_birthday') <> ''){
            $employee_birthday = I('post.employee_birthday');
        }
        
        if (I('post.employee_work_date') <> ''){
            $employee_work_date = I('post.employee_work_date');
        }
        
        if (I('post.employee_comment') <> ''){
            $employee_comment = I('post.employee_comment');
        }
        
        $data = array(
            'EMPLOYEE_NAME' => $employee_name,
            'EMPLOYEE_SEX' => $employee_sex,
            'EMPLOYEE_POSITION_ID' => $employee_position_id,
            'EMPLOYEE_STATUS' => $employee_status,
            'EMPLOYEE_TEL' => $employee_tel,
            'EMPLOYEE_ID_CARD' => $employee_id_card,
            'EMPLOYEE_BANK_NO' => $employee_bank_no,
            'EMPLOYEE_BIRTHDAY' => $employee_birthday,
            'EMPLOYEE_WORK_DATE' => $employee_work_date,
            'EMPLOYEE_COMMENT' => $employee_comment,
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id']
        );
        
        $where = 'EMPLOYEE_ID = '.$employee_id;
        
        $employee = new EmployeeModel('employee');
        
        $result = $employee ->employeeUpdate($where, $data);
        
        if ($result !== false){
            return $this->ajaxReturn(array('result' =>true,'message'=>'更新成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' =>false,'message'=>'更新失败!'),'JSON');
        }
    }
    
    public function employeeDelete(){
    
        //员工ID
        $employee_id = '';
    
        //值设定
        if (I('get.employee_id') <> ''){
            $employee_id = I('get.employee_id');
        }
    
        $data = array(
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '1'
        );
    
        $where = 'EMPLOYEE_ID = '.$employee_id;
    
        $employee = new EmployeeModel('employee');
        
        $result = $employee ->employeeUpdate($where, $data);
        
        if ($result !== false){
            return $this->ajaxReturn(array('result' =>true,'message'=>'删除成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' =>false,'message'=>'删除失败!'),'JSON');
        }
    }
    
    public function toEmployeePositionList(){
        
        //员工职位信息
        $employee_position_big = new EmployeePositionBigModel('employee_position_big');
        
        $employee_position_big_list = $employee_position_big ->employeePositionBigList();
        
        $this->assign('employeePositionBigList',$employee_position_big_list);
        
        //员工二级职位
        $employee_position = new EmployeePositionModel('employee_position');
        
        $employee_position_list = $employee_position ->employeePositionList();
        
        $this->assign('employeePositionList',$employee_position_list);
        
        $this->display('employee:employeePositionList');
    }
    
    public function employeePositionProcess(){
        
        //职位大分类ID
        $employee_position_big_id ='';
        
        //职位大分类名
        $employee_position_big_name = '';
        
        if (I('post.employee_position_big_id') <> ''){
            $employee_position_big_id = I('post.employee_position_big_id');
        }
        
        if (I('post.employee_position_big_name') <> ''){
            $employee_position_big_name = I('post.employee_position_big_name');
        }
        
        $result = false;
        
        $employee_position_big = new EmployeePositionBigModel('employee_position_big');
        
        //员工职位信息处理
        for ($i=0;$i<count($employee_position_big_id);$i++){
            
            //职位大分类名的更新
            $employee_position_big_data = array(
                'EMPLOYEE_POSITION_BIG_NAME' => $employee_position_big_name[$i],
                'UPD_DATE' => get_system_time(),
                'UPD_USER' => I('session.admin')['admin_id']
            );
            
            $employee_position_big_where = 'EMPLOYEE_POSITION_BIG_ID = '.$employee_position_big_id[$i];
            
            $result = $employee_position_big->employeePositionBigUpdate($employee_position_big_where, $employee_position_big_data);
            
            if ($result == false){
                break;
            }else{
                //职位小分类更新
                
                //职位小分类ID
                $employee_position_id = '';
                
                //职位小分类名
                $employee_position_name = '';
                
                if (I('post.employee_position_id'.$i) <> ''){
                    $employee_position_id = I('post.employee_position_id'.$i);
                }
                
                if (I('post.employee_position_name'.$i) <> ''){
                    $employee_position_name = I('post.employee_position_name'.$i);
                }
                
                //职位小分类数据处理
                $employee_position = new EmployeePositionModel('employee_position');
                
                for ($j = 0; $j < count($employee_position_id); $j++){
                    if ($employee_position_id[$j] <> ''){
                        //更新处理
                        $employee_position_data = array(
                            'EMPLOYEE_POSITION_NAME' =>$employee_position_name[$j],
                            'UPD_DATE' => get_system_time(),
                            'UPD_USER' => I('session.admin')['admin_id']
                        );
                        
                        $employee_position_where = 'EMPLOYEE_POSITION_ID = '.$employee_position_id[$j];
                        
                        $result = $employee_position ->employeePositionUpdate($employee_position_where, $employee_position_data);
                        
                        if ($result == false){
                            break;
                        }
                    }else {
                        //添加处理
                        if ($employee_position_name[$j] <> ''){
                            $employee_position_data = array(
                                'EMPLOYEE_POSITION_BIG_ID' =>$employee_position_big_id[$i],
                                'EMPLOYEE_POSITION_NAME' =>$employee_position_name[$j],
                                'INS_DATE' => get_system_time(),
                                'INS_USER' => I('session.admin')['admin_id'],
                                'UPD_DATE' => get_system_time(),
                                'UPD_USER' => I('session.admin')['admin_id'],
                                'DEL_FLG' => '0'
                            );
                            
                            $result = $employee_position ->employeePositionAdd($employee_position_data);
                            
                            if ($result == false){
                                break;
                            }
                        }
                    }
                }
                
                if ($result == false){
                    break;
                }
            }
        }
        
        if ($result <> false) {
            return $this->ajaxReturn(array('result' => true,'message'=>'操作成功'),'JSON');
        }else {
            return $this->ajaxReturn(array('result' => false,'message'=>'操作失败'),'JSON');
        }
    }
}

?>