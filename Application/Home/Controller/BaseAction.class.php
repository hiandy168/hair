<?php
namespace Home\Controller;

use Think\Controller;

use Home\Model\SystemLogModel;

class BaseAction extends Controller
{
    private $total_count; 					//合计件数
    
    private $limit;									//MySQL LIMIT	
    
    private $page_count_start;			//起始页
    
    private $page_count_end;				//终了页
    
    private $page_current;					//当前页
    
    private $page_size;							//一页数据件数
    
    private $page_total_count;			//合计的数据件数
    
    private $uri;										//uri
    
    private $page_param;						//页参数
    
    //判断用户是否登录
    public function _initialize(){
        
        if (strrpos($_SERVER['REQUEST_URI'],'adminLogin') === false){
            if (I('session.admin') == ''){
                $this->display('login:login');
                exit();
            }else{
                $this->assign('action_list', I('session.admin')['action_list']);
                $this->assign('base_url', $_SERVER['REQUEST_URI']);
            }
        }
    }
    
    //系统日志写入
    public function system_log_write($system_log_type,$system_log_content){
        
        //系统日志内容
        $data = array(
            'SYSTEM_LOG_TIME' => get_system_time(),
            'SYSTEM_LOG_TYPE' => $system_log_type,
            'SYSTEM_LOG_CONTENT' => $system_log_content,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $system_log = new SystemLogModel('system_log');
        
        $result = $system_log->systemLogAdd($data);
        
    }
    
    public function page_init($total_count,$page_size=5,$page_current=1,$page_param = 'page'){
        $this->total_count = $total_count < 0 ? 0 : $total_count;
    
        $this->page_size = $page_size < 0 ? 0 : $page_size;
    
        $this->page_total_count = ceil($this->total_count/$this->page_size);
    
        $this->page_current = $page_current <= 0 ? 1 : $page_current;
    
        $this->page_count_start = ($this->page_current -1)*$this->page_size;
    
        $this->page_count_end = $this->page_count_start + $this->page_size;
    
        $this->page_count_end = $this->page_count_end>$this->total_count?$this->total_count:$this->page_count_end;
    
        $this->limit = $this->page_count_start.','.$this->page_count_end;
    
        $this->uri();
    
        $this->page_param = $page_param;
    }
    
    
    private function uri(){
        $url = $_SERVER["REQUEST_URI"];
        $par = parse_url($url);
        $this->uri = $par['path'].'?';
    }
    
    public function page_display(){
    
        $str_result = '';
    
        if($this->page_current <> 1){
            $str_result .= '<li>';
            $str_result .= '	<a href=\''.$this->uri.$this->page_param.'='.($this->page_current - 1).'\'>«</a>';
            $str_result .= '</li>';
        }
    
        for ($i = 0; $i < 5; $i++){
            if ( ($i + 1) <= $this->page_total_count ){
                $str_result .= '<li class = '.(($i + 1) == $this->page_current ? 'active' : '').'>';
                $str_result .= '	<a href=\''.$this->uri.$this->page_param.'='.($i + 1).'\'>'.($i + 1).'</a>';
                $str_result .= '</li>';
            }
        }
    
        if ($this->page_current <> $this->page_total_count and $this->page_total_count <> 0){
            $str_result .= '<li>';
            $str_result .= '<a href=\''.$this->uri.$this->page_param.'='.($this->page_current + 1).'\'>»</a>';
            $str_result .= '</li>';
        }
    
        return $str_result;
    }
    
    public function __set($name,$value){
        $this->$name = $value;
    }
    
    public function __get($name){
        return $this->$name;
    }
}

?>