<?php
namespace Home\Controller;

use Home\Controller\BaseAction;

class FileProcessController extends BaseAction
{
    public function filedown(){
        $file_name = '';
        
        if (I('get.filename')<> ''){
            $file_name = I('get.filename');
        }
        
        if ($file_name <> ''){
            
            Header( "Content-type:  application/octet-stream ");
            Header( "Accept-Ranges:  bytes ");
            Header( "Accept-Length: " .filesize(C("UPLOAD_BASE_DIR").$file_name));
            header( "Content-Disposition:  attachment;  filename= {$file_name}");
            echo file_get_contents(C("UPLOAD_BASE_DIR").$file_name);
            readfile(C("UPLOAD_BASE_DIR").$file_name);
        }
    }
}

?>