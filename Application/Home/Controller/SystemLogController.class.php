<?php
namespace Home\Controller;

use Home\Controller\BaseAction;
use Home\Model\SystemLogModel;

class SystemLogController extends BaseAction
{
    public function systemLogList(){
        
        $system_log = new SystemLogModel('system_log');
        
        $page_count = 20;
        $page = '';
        
        if (I('get.page')<> ''){
            $this->page_init($system_log->get_system_log_count(),$page_count,I('get.page'));
            $page = I('get.page').','.$page_count;
        }else{
            $this->page_init($system_log->get_system_log_count(),$page_count,1);
            $page = '1,'.$page_count;
        }
        
        $page_content = $this->page_display();
        
        $system_log_list = $system_log->systemLogList($page);
        
        $this->assign('page_content',$page_content);
        $this->assign('systemLogCount',count($system_log_list));
        $this->assign('systemLoglist',$system_log_list);
        $this->display('systemLog:systemLogList');
    }
}

?>