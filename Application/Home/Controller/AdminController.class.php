<?php
namespace Home\Controller;

use Home\Controller\BaseAction;
use Home\Model\AdminModel;
use Home\Model\AdminRoleModel;

class AdminController extends BaseAction
{
    public function adminLogin(){
        
        //用户名
        $admin_name = '';
        
        //密码
        $admin_password = '';
        
        $result = '';
        
        if ( I('post.admin_name') <> ''){
            $admin_name = I('post.admin_name');
        }
        
        if ( I('post.admin_password') <> ''){
            $admin_password = I('post.admin_password');
        }
        
        if ($admin_name <> '' and $admin_password <> ''){
            
            $admin = new AdminModel('admin');
            $result = $admin ->adminLogin($admin_name, $admin_password);
            
        }else{
            $result =array(
               'result' => false,
               'message' => '用户名或者密码不能为空!'
            );
        }
        
        if ($result['result'] == true){
            //系统日志操作
            $this->system_log_write(C('SYSTEM_LOG_TYPE_LIST.LOGIN') , message_replace(C('SYSTEM_LOG_CONTENT_LIST.LOGIN'),I('session.admin')['admin_name']));
        }
        
        return $this->ajaxReturn($result , 'JSON');
    }
    
    public function adminLogout(){
        
        $this->system_log_write(C('SYSTEM_LOG_TYPE_LIST.LOGOUT') , message_replace(C('SYSTEM_LOG_CONTENT_LIST.LOGOUT'),I('session.admin')['admin_name']));
        
        session('admin',null);
        session('[destroy]');
        //系统日志操作
        
        $this->success('退出成功！', U('/index/index'));
    }
    
    public function adminList(){
        $admin = new AdminModel('admin');
        
        $adminList = $admin->adminList();
        if ($adminList <> false){
            $this->assign('adminlist',$adminList);
            $this->display('admin:adminList');
        }else{
            $this->error('系统错误');
        }
    }
    
    public function toAdminAdd(){
        
        $adminRoleList = $this->adminRoleInfor();
        
        $this->assign('adminRoleList',$adminRoleList);
        
        $this->display('admin:adminAdd');
    }
    
    public function adminAdd(){
        
        //管理员登录名
        $admin_name = '';
        
        //管理员邮箱
        $admin_mail = '';
        
        //管理员姓名
        $admin_real_name = '';
        
        //管理员电话
        $admin_tel = '';
        
        //管理员密码
        $admin_new_password = '';
        
        //管理员权限
        $action_code = '';
        
        $result = '';
        
        if (I('post.admin_name') <> ''){
            $admin_name = I('post.admin_name');
        }
        
        if (I('post.admin_mail') <> ''){
            $admin_mail = I('post.admin_mail');
        }
        
        if (I('post.admin_real_name') <> ''){
            $admin_real_name = I('post.admin_real_name');
        }
        
        if (I('post.admin_tel') <> ''){
            $admin_tel = I('post.admin_tel');
        }
        
        if (I('post.admin_new_password') <> ''){
            $admin_new_password = md5(I('post.admin_new_password'));
        }
        
        if (I('post.action_code') <> ''){
            $action_code = I('post.action_code');
        }
        
        $action_list = '';
        for ($i = 0;$i<count($action_code);$i++){
            $action_list = $action_list.$action_code[$i];
        }
        
        $data = array(
            'ADMIN_NAME' => $admin_name,
            'ADMIN_MAIL' => $admin_mail,
            'ADMIN_REAL_NAME' => $admin_real_name,
            'ADMIN_TEL' => $admin_tel,
            'ADMIN_PASSWORD' => $admin_new_password,
            'ACTION_LIST' => $action_list,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $admin = new AdminModel('admin');
        
        $result = $admin ->adminAdd($data);
        
        if ($result <> false){
            
            $this->system_log_write(C('SYSTEM_LOG_TYPE_LIST.ADMIN_ADD') , message_replace(C('SYSTEM_LOG_CONTENT_LIST.ADMIN_ADD'),$admin_name));
            return $this->ajaxReturn(array('result' => true,'message' => '管理员添加成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '管理员添加失败!'),'JSON');
        }
    }
    
    public function toAdminUpdate(){
        
        //管理员ID
        $admin_id = '';
        
        //分配权限or信息修改
        $upd_kbn = '';
        
        if (I('get.admin_id') <> ''){
            $admin_id = I('get.admin_id');
        }
        
        if (I('get.upd_kbn') <> ''){
            $upd_kbn = I('get.upd_kbn');
        }
        
        $admin = new AdminModel('admin');
        
        $where = 'ADMIN_ID ='.$admin_id;
        
        $obj_admin = $admin ->adminFind($where);
        
        $adminRoleList = $this->adminRoleInfor();
        
        if ($obj_admin <> false){
            $this->assign('adminRoleList',$adminRoleList);
            $this->assign('obj_admin',$obj_admin);
            $this->assign('upd_kbn',$upd_kbn);
            $this->display('admin:adminUpdate');
        }else {
            $this->error('系统错误');
        }
    }
    
    public function adminUpdate(){
        
        //管理员ID
        $admin_id = '';
        
        //更新区分：0，更新基本信息；1，更新密码；2，分配权限
        $upd_kbn = '';
        
        //管理员登录名
        $admin_name = '';
        
        //管理员旧密码
        $admin_old_password = '';
        
        //管理员新密码
        $admin_new_password = '';
        
        //管理员邮箱
        $admin_mail = '';
        
        //管理员姓名
        $admin_real_name = '';
        
        //管理员电话
        $admin_tel = '';
        
        //管理员权限
        $action_code = '';
        
        $result = '';
        
        if (I('post.admin_id') <> ''){
            $admin_id = I('post.admin_id');
        }
        
        if (I('post.upd_kbn') <> ''){
            $upd_kbn = I('post.upd_kbn');
        }
        
        if (I('post.admin_name') <> ''){
            $admin_name = I('post.admin_name');
        }
        
        if (I('post.admin_old_password') <> ''){
            $admin_old_password = md5(I('post.admin_old_password'));
        }
        
        if (I('post.admin_new_password') <> ''){
            $admin_new_password = md5(I('post.admin_new_password'));
        }
        
        if (I('post.admin_mail') <> ''){
            $admin_mail = I('post.admin_mail');
        }
        
        if (I('post.admin_real_name') <> ''){
            $admin_real_name = I('post.admin_real_name');
        }
        
        if (I('post.admin_tel') <> ''){
            $admin_tel = I('post.admin_tel');
        }
        
        if (I('post.action_code') <> ''){
            $action_code = I('post.action_code');
        }
        
        $action_list = '';
        for ($i = 0;$i<count($action_code);$i++){
            $action_list = $action_list.$action_code[$i];
        }
        
        $admin = new AdminModel('admin');
        
        if ($upd_kbn == '0'){
            //更新管理员基本信息
            $data = array(
                'ADMIN_NAME' => $admin_name,
                'ADMIN_MAIL' => $admin_mail,
                'ADMIN_REAL_NAME' => $admin_real_name,
                'ADMIN_TEL' => $admin_tel,
                'UPD_DATE' => get_system_time(),
                'UPD_USER' => I('session.admin')['admin_id'],
            );
            
            $where = 'ADMIN_ID ='. $admin_id;
            
            $result = $admin ->adminUpdate($where, $data);
            
            if ($result <> false){
                $this->system_log_write(C('SYSTEM_LOG_TYPE_LIST.ADMIN_BASE_UPD') , message_replace(C('SYSTEM_LOG_CONTENT_LIST.ADMIN_BASE_UPD'),$admin_name));
                return $this->ajaxReturn(array('result' => true,'message' => '管理员基本信息更新成功!'),'JSON');
            }else{
                return $this->ajaxReturn(array('result' => false,'message' => '管理员基本信息更新失败!'),'JSON');
            }
        }
        
        if ($upd_kbn == '1'){
            //更新管理员密码
            
            //判断管理员旧密码是否输入正确
        
            $where = 'ADMIN_ID ='. $admin_id.' and ADMIN_PASSWORD="'.$admin_old_password.'"';
        
            $result = $admin ->adminFind($where);
            
            if ($result <> false and count($result) > 0){
                $data = array(
                    'ADMIN_PASSWORD' => $admin_new_password,
                    'UPD_DATE' => get_system_time(),
                    'UPD_USER' => I('session.admin')['admin_id'],
                );
                
                $where = 'ADMIN_ID ='. $admin_id;
                
                $result = $admin ->adminUpdate($where, $data);
                
                if ($result <> false){
                    $this->system_log_write(C('SYSTEM_LOG_TYPE_LIST.ADMIN_PASSWORD_UPD') , message_replace(C('SYSTEM_LOG_CONTENT_LIST.ADMIN_PASSWORD_UPD'),$admin_name));
                    return $this->ajaxReturn(array('result' => true,'message' => '管理员密码更新成功!'),'JSON');
                }else{
                    return $this->ajaxReturn(array('result' => false,'message' => '管理员密码更新失败!'),'JSON');
                }
            }else{
                return $this->ajaxReturn(array('result' => false,'message' => '管理员旧密码输入错误!'),'JSON');
            }
        }
        
        if ($upd_kbn == '2'){
            //更新管理员权限
            $data = array(
                'ACTION_LIST' => $action_list,
                'UPD_DATE' => get_system_time(),
                'UPD_USER' => I('session.admin')['admin_id'],
            );
        
            $where = 'ADMIN_ID ='. $admin_id;
        
            $result = $admin ->adminUpdate($where, $data);
        
            if ($result <> false){
                $this->system_log_write(C('SYSTEM_LOG_TYPE_LIST.ADMIN_POWER_UPD') , message_replace(C('SYSTEM_LOG_CONTENT_LIST.ADMIN_POWER_UPD'),$admin_name));
                return $this->ajaxReturn(array('result' => true,'message' => '管理员权限更新成功!'),'JSON');
            }else{
                return $this->ajaxReturn(array('result' => false,'message' => '管理员权限更新失败!'),'JSON');
            }
        }
    }
    
    public function adminDelete(){
    
        //管理员ID
        $admin_id = '';
        
        //管理员用户名
        $admin_name = '';
    
        if (I('get.admin_id') <> ''){
            $admin_id = I('get.admin_id');
        }
        
        if (I('get.admin_name') <> ''){
            $admin_name = I('get.admin_name');
        }
        
        $data = array(
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '1'
        );
    
        $admin = new AdminModel('admin');
    
        $where = 'ADMIN_ID ='.$admin_id;
    
        $result = $admin ->adminUpdate($where,$data);
    
        if ($result <> false){
            $this->system_log_write(C('SYSTEM_LOG_TYPE_LIST.ADMIN_DEL') , message_replace(C('SYSTEM_LOG_CONTENT_LIST.ADMIN_DEL'),$admin_name));
            return $this->ajaxReturn(array('result' => true,'message' => '管理员删除成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '管理员删除失败!'),'JSON');
        }
    }
    
    private function adminRoleInfor(){
        $adminRole = new AdminRoleModel('admin_role');
        return $adminRole ->adminRoleList();
    }
    
}

?>