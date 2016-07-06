<?php
namespace Home\Controller;

use Home\Controller\BaseAction;
use Home\Model\SystemLogModel;

class SystemLogController extends BaseAction
{
    public function systemLogList(){
        
        $system_log = new SystemLogModel('system_log');
        
        $system_log_list = $system_log->systemLogList();
        
        if ($system_log_list <> false){
            $this->assign('systemLoglist',$system_log_list);
            $this->display('systemLog:systemLogList');
        }else{
            $this->error('系统错误');
        }
    }
}

?>