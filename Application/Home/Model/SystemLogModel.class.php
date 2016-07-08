<?php
namespace Home\Model;

class SystemLogModel extends BaseModel
{
    public function systemLogAdd($data){
        return $this->add($data);
    }
    
    public function systemLogList($page=''){
        return $this->join('LEFT JOIN admin AS admin_ins ON system_log.ins_user = admin_ins.admin_id AND admin_ins.DEL_FLG = "0"')
        ->join('LEFT JOIN admin AS admin_upd ON system_log.ins_user = admin_upd.admin_id AND admin_upd.DEL_FLG = "0"')
        ->field(array(
            'system_log.SYSTEM_LOG_ID' => 'SYSTEM_LOG_ID',
            'system_log.SYSTEM_LOG_TIME' => 'SYSTEM_LOG_TIME',
            'system_log.SYSTEM_LOG_TYPE' => 'SYSTEM_LOG_TYPE',
            'system_log.SYSTEM_LOG_CONTENT' => 'SYSTEM_LOG_CONTENT',
            'system_log.INS_DATE' => 'INS_DATE',
            'admin_ins.ADMIN_NAME' => 'ADMIN_NAME_INS',
            'system_log.UPD_DATE' => 'UPD_DATE',
            'admin_upd.ADMIN_NAME' => 'ADMIN_NAME_UPD'
        ))
        ->page($page)
        ->where('system_log.DEL_FLG = "0"')
        ->select();
    }
    
    public function get_system_log_count(){
        
        $system_log_data = $this->join('LEFT JOIN admin AS admin_ins ON system_log.ins_user = admin_ins.admin_id AND admin_ins.DEL_FLG = "0"')
                                ->join('LEFT JOIN admin AS admin_upd ON system_log.ins_user = admin_upd.admin_id AND admin_upd.DEL_FLG = "0"')
                                ->field(array(
                                    'system_log.SYSTEM_LOG_ID' => 'SYSTEM_LOG_ID',
                                    'system_log.SYSTEM_LOG_TIME' => 'SYSTEM_LOG_TIME',
                                    'system_log.SYSTEM_LOG_TYPE' => 'SYSTEM_LOG_TYPE',
                                    'system_log.SYSTEM_LOG_CONTENT' => 'SYSTEM_LOG_CONTENT',
                                    'system_log.INS_DATE' => 'INS_DATE',
                                    'admin_ins.ADMIN_NAME' => 'ADMIN_NAME_INS',
                                    'system_log.UPD_DATE' => 'UPD_DATE',
                                    'admin_upd.ADMIN_NAME' => 'ADMIN_NAME_UPD'
                                ))
                                ->where('system_log.DEL_FLG = "0"')
                                ->select();
        return count($system_log_data);
    }
}

?>