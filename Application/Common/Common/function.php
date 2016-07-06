<?php

/**
* 过滤危险字符
* @date: 2016/06/29 14:41:41
* @author: chenjianqiang98
* @param: $str 源字符串
* @return: 目标字符串
*/
function replace_sql($str)
{
    $str = trim(strtolower($str));
    $str = str_replace("<", "&lt;", $str);
    $str = str_replace(">", "&gt;", $str);
    $str = str_replace(" ", "", $str);
    $str = str_replace("'", "", $str);
    $str = str_replace(";", "", $str);
    $str = str_replace("select", "", $str);
    $str = str_replace(" and ", "", $str);
    $str = str_replace("exec", "", $str);
    $str = str_replace("insert", "", $str);
    $str = str_replace("delete", "", $str);
    $str = str_replace("update", "", $str);
    $str = str_replace("count", "", $str);
    $str = str_replace("*", "", $str);
    $str = str_replace("%", "", $str);
    $str = str_replace("chr", "", $str);
    $str = str_replace("char", "", $str);
    $str = str_replace("mid", "", $str);
    $str = str_replace("master", "", $str);
    $str = str_replace("truncate", "", $str);
    $str = str_replace("declare", "", $str);
    $str = trim($str);
    return $str;
}

/**
* 获取随机字符串
* @date: 2016/06/29 15:21:28
* @author: chenjianqiang98
* @param: $type 返回类型
*         $length 返回长度
* @return: 随机生成的字符串
*/
function rand_str($type, $length)
{
    $str1 = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z";
    $str2 = "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
    $str3 = "0,1,2,3,4,5,6,7,8,9";
    
    if ($type == 1) {
        $content = $str1;
    } else 
        if ($type == 2) {
            $content = $str2;
        } else 
            if ($type == 3) {
                $content = $str3;
            } else 
                if ($type == 4) {
                    $content = $str1 . "," . $str2;
                } else 
                    if ($type == 5) {
                        $content = $str2 . "," . $str3;
                    } else 
                        if ($type == 6) {
                            $content = $str1 . "," . $str3;
                        } else 
                            if ($type == 7) {
                                $content = $str1 . "," . $str2 . "," . $str3;
                            }
    
    $strs = explode(",", $content);
    
    for ($i = 0; $i < $length; $i ++) {
        do {
            $r = rand(0, strlen($content));
        } while (empty($strs[$r]));
        $output .= $strs[$r];
    }
    
    return $output;
}

/**
* 获取客户机IP
* @date: 2016/06/29 15:22:38
* @author: chenjianqiang98
* @param: 
* @return: 客户机IP
*/
function get_ip()
{
    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    else 
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        else 
            if (isset($_SERVER["REMOTE_ADDR"]))
                $ip = $_SERVER["REMOTE_ADDR"];
            else 
                if (getenv("HTTP_X_FORWARDED_FOR"))
                    $ip = getenv("HTTP_X_FORWARDED_FOR");
                else 
                    if (getenv("HTTP_CLIENT_IP"))
                        $ip = getenv("HTTP_CLIENT_IP");
                    else 
                        if (getenv("REMOTE_ADDR"))
                            $ip = getenv("REMOTE_ADDR");
                        else
                            $ip = "Unknown";
    return $ip;
}

/**
* 截取字符串
* @date: 2016/06/29 15:31:05
* @author: chenjianqiang98
* @param: $str 愿字符串
*         $len 截取长度
*         $dot 截取之后是否追加...
* @return: 截取之后的字符串
*/
function get_string($str, $len = 12, $dot = true)
{
    $i = 0;
    $l = 0;
    $c = 0;
    $a = array();
    while ($l < $len) {
        $t = substr($str, $i, 1);
        
        if (ord($t) >= 224) {
            $c = 3;
            $t = substr($str, $i, $c);
            $l += 2;
        } elseif (ord($t) >= 192) {
            $c = 2;
            $t = substr($str, $i, $c);
            $l += 2;
        } else {
            $c = 1;
            $l ++;
        }
        
        $i += $c;
        
        if ($l > $len)
            break;
        $a[] = $t;
    }
    
    $re = implode('', $a);
    if (substr($str, $i, 1) !== false) {
        array_pop($a);
        
        ($c == 1) and array_pop($a);
        $re = implode('', $a);
        $dot and $re .= '...';
    }
    
    return $re;
}

/**
* 上传文件
* @date: 2016/06/29 15:38:19
* @author: chenjianqiang98
* @param: $inputFile 源文件信息
*         $hzs 文件后缀名
*         $saveFile 目标文件
* @return:
*/
function upload($inputFile, $hzs, $saveFile)
{
    // 获取服务器本地路径
    $saveFile = C('UPLOAD_BASE_DIR') . $saveFile;
    
    // 最大允许上传100M
    $maxsize = 100 * 1024 * 1024;
    
    // 取上传文件的后缀名并转换为小写
    $tmp_hz = strtolower(strrchr($inputFile["name"], "."));
    
    for ($i = 0; $i < count($hzs); $i ++) {
        if ($tmp_hz == $hzs[$i]) {
            $b = true;
            break;
        } else
            $b = false;
    }
    
    if ($b) {
        if ($inputFile["size"] > $maxsize)
            $b = false;
        else {
            $saveFile .= $tmp_hz;
            $isOK = move_uploaded_file($inputFile["tmp_name"], $saveFile);
            if ($isOK)
                $b = true;
            else
                $b = false;
        }
    }
    
    // 如果上传失败就删除临时文件
    if (! $b) {
        if (file_exists($inputFile["tmp_name"]))
            unlink($inputFile["tmp_name"]);
    }
    
    return $b;
}

/**
* 生成指定大小的图片
* @date: 2016/06/29 15:39:22
* @author: chenjianqiang98
* @param: $srcFile 源文件
*         $toFile 目标文件
*         $toW 目标文件宽度
*         $toH 目标文件高度
*         $file_type 源文件后缀名
* @return:
*/
function image_resize($srcFile, $toFile, $toW, $toH, $file_type = "png")
{
    if ($toFile == "")
        $toFile = $srcFile;
    $info = "";
    $data = getimagesize($srcFile, $info);
    
    if ($file_type == "png") {
        $im = imagecreatefrompng($srcFile);
    } elseif ($file_type == "gif") {
        if (! function_exists("imagecreatefromgif")) {
            echo "你的GD库不能使用GIF格式的图片，请使用Jpeg或PNG格式！<a href='javascript:go(-1);'>返回</a>";
            exit();
        }
        $im = imagecreatefromgif($srcFile);
    } else {
        if (! function_exists("imagecreatefromjpeg")) {
            echo "你的GD库不能使用jpeg格式的图片，请使用其它格式的图片！<a href='javascript:go(-1);'>返回</a>";
            exit();
        }
        $im = imagecreatefromjpeg($srcFile);
    }
    $srcW = ImageSX($im);
    $srcH = ImageSY($im);
    $toWH = $toW / $toH;
    $srcWH = $srcW / $srcH;
    if ($toWH <= $srcWH) {
        $ftoW = $toW;
        $ftoH = $ftoW * ($srcH / $srcW);
    } else {
        $ftoH = $toH;
        $ftoW = $ftoH * ($srcW / $srcH);
    }
    if ($srcW > $toW || $srcH > $toH) {
        if (function_exists("imagecreatetruecolor")) {
            @$ni = imagecreatetruecolor($ftoW, $ftoH);
            if ($ni)
                imagecopyresampled($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
            else {
                $ni = imagecreate($ftoW, $ftoH);
                imagecopyresized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
            }
        } else {
            $ni = imagecreate($ftoW, $ftoH);
            imagecopyresized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
        }
        
        if ($file_type == "png")
            imagepng($ni, $toFile);
        elseif ($file_type == "gif")
            imagegif($ni, $toFile);
        else {
            if (function_exists('imagejpeg'))
                imagejpeg($ni, $toFile);
        }
        imagedestroy($ni);
    }
    imagedestroy($im);
}

/**
* HTML编码转换
* @date: 2016/06/29 15:41:14
* @author: chenjianqiang98
* @param: $str 愿字符串
* @return: 目标字符串
*/
function html_encoding($str)
{
    if (! empty($str)) {
        $str = str_replace("<", "&lt;", $str);
        $str = str_replace(">", "&gt;", $str);
        $str = str_replace(" ", "&nbsp;", $str);
        $str = str_replace("\"", "&quot;", $str);
        return $str;
    } else
        return null;
}

/**
* HTML解码转换
* @date: 2016/06/29 17:02:48
* @author: chenjianqiang98
* @param: $str 愿字符串
* @return: 目标字符串
*/
function html_decoding($str)
{
    if (! empty($str)) {
        $str = str_replace("&lt;", "<", $str);
        $str = str_replace("&gt;", ">", $str);
        $str = str_replace("&nbsp;", " ", $str);
        $str = str_replace("&quot;", "\"", $str);
        return $str;
    } else
        return null;
}

/**
* 检测客户端是否使用手机浏览
* @date: 2016/06/29 17:04:32
* @author: chenjianqiang98
* @param: 
* @return: true 手机浏览 false 电脑浏览
*/
function is_wap_client()
{
    if (is_web_client())
        return false;
    else
        return true;
}

/**
* 检测客户端是否使用电脑的浏览器浏览
* @date: 2016/06/29 17:05:20
* @author: chenjianqiang98
* @param: 
* @return: true 电脑浏览 false 手机浏览
*/
function is_web_client()
{
    if (strrpos($_SERVER['HTTP_USER_AGENT'], "Mozilla"))
        return true;
    elseif (strrpos($_SERVER['HTTP_USER_AGENT'], "Opera"))
        return true;
    
    if (strrpos($_SERVER['HTTP_ACCEPT'], "Mozilla"))
        return true;
    elseif (strrpos($_SERVER['HTTP_ACCEPT'], "Opera"))
        return true;
    
    return false;
}

/**
* xml转换成json
* @date: 2016/06/29 17:06:15
* @author: chenjianqiang98
* @param: $source xml数据
* @return: json数据
*/
function xml_to_json($source)
{
    if (is_file($source)) // 传的是文件，还是xml的string的判断
        $xml_array = simplexml_load_file($source);
    else
        $xml_array = simplexml_load_string($source);
    
    $json = json_encode($xml_array); // php5，以及以上，如果是更早版本，請下載JSON.php
    return $json;
}

/**
* 函数用途描述
* @date: 2016/06/29 17:06:54
* @author: chenjianqiang98
* @param: $source json数据
*         $charset 字符编码
* @return: xml数据
*/
function json_to_xml($source, $charset = 'utf-8')
{
    if (empty($source))
        return false;
    
    $array = json_decode($source); // php5，以及以上，如果是更早版本，請下載JSON.php
    $xml = '<?xml version="1.0" encoding="' . $charset . '"?>';
    $xml .= change($array);
    return $xml;
}

function change($source)
{
    $string = "";
    foreach ($source as $k => $v) {
        $string .= "<" . $k . ">";
        if (is_array($v) || is_object($v)) { // 判断是否是数组，或者，对像
            $string .= change($v); // 是数组或者对像就的递归调用
        } else {
            $string .= $v; // 取得标签数据
        }
        $string .= "</" . $k . ">";
    }
    return $string;
}

/**
* 生成连续日期(按日)
* @date: 2016/06/29 17:07:47
* @author: chenjianqiang98
* @param: $d1 起始日期
*         $d2 截止日期
* @return: 开始日期到截止日期的连续日期
*/
function date_range($d1, $d2)
{
    $timestamp1 = strtotime($d1);
    $timestamp2 = strtotime($d2);
    if ($timestamp1 == $timestamp2)
        return;
    if ($timestamp1 > $timestamp2)
        return '日期错误';
    $n = round(($timestamp2 - $timestamp1) / 3600 / 24);
    $y = date('Y', $timestamp1);
    $m = date('m', $timestamp1);
    $d = date('d', $timestamp1);
    $arr = array();
    for ($i = 0; $i < $n + 1; $i ++) {
        $arr[] = date('Y-m-d', mktime(0, 0, 0, $m, $d + $i, $y));
    }
    return $arr;
}

/**
* 返回相对大的日期
* @date: 2016/06/29 17:08:46
* @author: chenjianqiang98
* @param: $d1 日期
*         $d2 日期
* @return: 大的日期
*/
function date_max($d1, $d2)
{
    $dt1 = strtotime($d1);
    $dt2 = strtotime($d2);
    if ($dt1 == $dt2) {
        // 相等
        return $d1;
    } elseif ($dt1 > $dt2) {
        // 1大于2
        return $d1;
    } elseif ($d2 > $d1) {
        // 2大于1
        return $d2;
    }
}
/**
* 返回相对小的日期
* @date: 2016/06/29 17:09:34
* @author: chenjianqiang98
* @param: $d1 日期
*         $d2 日期
* @return: 小的日期
*/
function date_min($d1, $d2)
{
    $dt1 = strtotime($d1);
    $dt2 = strtotime($d2);
    if ($dt1 == $dt2) {
        // 相等
        return $d1;
    } elseif ($dt1 < $dt2) {
        // 1小于2
        return $d1;
    } elseif ($d2 < $d1) {
        // 2小于1
        return $d2;
    }
}

//获得20位编号
function get_no(){
    return mt_rand().mt_rand();
}

/**
* 获得系统时间
* @date: 2016/06/29 17:10:51
* @author: chenjianqiang98
* @param: $format 日期格式 
* @return: 系统时间
*/
function get_system_time($format = ''){
    date_default_timezone_set(C('DATE_DEFAULT_TIMEZONE'));
    
    if ($format == ''){
        return date('Y-m-d H:i:s');
    }elseif ($format == 'YMD'){
        return date('Y-m-d');
    }
    
}

/**
* 置换字符串中的%变量
* @date: 2016/06/29 17:11:31
* @author: chenjianqiang98
* @param: 不定参数，第一个为源字符串
* @return: 置换后的字符串
*/
function message_replace(){
    $args = func_get_args();
    
    $replace_string = $args[0];
    for ($i = 1; $i < count($args); $i++) {
        $parrten = '%'.$i;
        $replace_string = str_replace($parrten,$args[$i],$replace_string);        
    }
    
    return $replace_string;
}

/**
 * 是否为空值
 */
/**
* 判断字符串是否为空
* @date: 2016/06/29 17:12:44
* @author: chenjianqiang98
* @param: $str 源字符串
* @return: true 不为空 false 为空
*/
function isEmpty($str){
    $str = trim($str);
    return !empty($str) ? true : false;
}
/**
 * 数字验证
 * param:$flag : int是否是整数，float是否是浮点型
 */

function isNum($str,$flag = 'float'){
    if(!self::isEmpty($str)) return false;
    if(strtolower($flag) == 'int'){
        return ((string)(int)$str === (string)$str) ? true : false;
    }else{
        return ((string)(float)$str === (string)$str) ? true : false;
    }
}
/**
 * 名称匹配，如用户名，目录名等
 * @param:string $str 要匹配的字符串
 * @param:$chinese 是否支持中文,默认支持，如果是匹配文件名，建议关闭此项（false）
 * @param:$charset 编码（默认utf-8,支持gb2312）
 */
function isName($str,$chinese = true,$charset = 'utf-8'){
    if(!self::isEmpty($str)) return false;
    if($chinese){
        $match = (strtolower($charset) == 'gb2312') ? "/^[".chr(0xa1)."-".chr(0xff)."A-Za-z0-9_-]+$/" : "/^[x{4e00}-x{9fa5}A-Za-z0-9_]+$/u";
    }else{
        $match = '/^[A-za-z0-9_-]+$/';
    }
    return preg_match($match,$str) ? true : false;
}
/**
 * 邮箱验证
 */
 /*
function isEmail($str){
    if(!self::isEmpty($str)) return false;
    
    $exp = "/([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?/i";
    return preg_match($exp ,$str) ? true : false;
}
*/
//手机号码验证
function isMobile($str){
    $exp = "/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$|14[57]{1}[0-9]$/";
    if(preg_match($exp,$str)){
        return true;
    }else{
        return false;
    }
}
/**
 * URL验证，纯网址格式，不支持IP验证
 */
function isUrl($str){
    if(!self::isEmpty($str)) return false;
    return preg_match('#(http|https|ftp|ftps)://([w-]+.)+[w-]+(/[w-./?%&=]*)?#i',$str) ? true : false;
}
/**
 * 验证中文
 * @param:string $str 要匹配的字符串
 * @param:$charset 编码（默认utf-8,支持gb2312）
 */
function isChinese($str,$charset = 'utf-8'){
    if(!self::isEmpty($str)) return false;
    $match = (strtolower($charset) == 'gb2312') ? "/^[".chr(0xa1)."-".chr(0xff)."]+$/"
        : "/^[x{4e00}-x{9fa5}]+$/u";
    return preg_match($match,$str) ? true : false;
}
/**
 * UTF-8验证
 */
function isUtf8($str){
    if(!self::isEmpty($str)) return false;
    return (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$str)
        == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$str)
        == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$str)
        == true) ? true : false;
}
/**
 * 验证长度
 * @param: string $str
 * @param: int $type(方式，默认min <= $str <= max)
 * @param: int $min,最小值;$max,最大值;
 * @param: string $charset 字符
 */
function length($str,$type=3,$min=0,$max=0,$charset = 'utf-8'){
    if(!self::isEmpty($str)) return false;
    $len = mb_strlen($str,$charset);
    switch($type){
        case 1: //只匹配最小值
            return ($len >= $min) ? true : false;
            break;
        case 2: //只匹配最大值
            return ($max >= $len) ? true : false;
            break;
        default: //min <= $str <= max
            return (($min <= $len) && ($len <= $max)) ? true : false;
    }
}
/**
 * 验证密码
 * @param string $value
 * @param int $length
 * @return boolean
 */
function isPWD($value,$minLen=6,$maxLen=16){
    $match='/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{'.$minLen.','.$maxLen.'}$/';
    $v = trim($value);
    if(empty($v))
        return false;
    return preg_match($match,$v);
}
/**
 * 验证用户名
 * @param string $value
 * @param int $length
 * @return boolean
 */
function isNames($value, $minLen=2, $maxLen=16, $charset='ALL'){
    if(empty($value))
        return false;
    switch($charset){
        case 'EN': $match = '/^[_\w\d]{'.$minLen.','.$maxLen.'}$/iu';
        break;
        case 'CN':$match = '/^[_\x{4e00}-\x{9fa5}\d]{'.$minLen.','.$maxLen.'}$/iu';
        break;
        default:$match = '/^[_\w\d\x{4e00}-\x{9fa5}]{'.$minLen.','.$maxLen.'}$/iu';
    }
    return preg_match($match,$value);
}
/**
 * 验证邮箱
 * @param string $value
 */
function checkZip($str){
    if(strlen($str)!=6){
        return false;
    }
    if(substr($str,0,1)==0){
        return false;
    }
    return true;
}
/**
 * 匹配日期
 * @param string $value
 */
function chkDate($str){
    $dateArr = explode("-", $str);
    if (is_numeric($dateArr[0]) && is_numeric($dateArr[1]) && is_numeric($dateArr[2])) {
        if (($dateArr[0] >= 1000 && $dateArr[0] <= 10000) && ($dateArr[1] >= 0 && $dateArr[1] <= 12) && ($dateArr[2] >= 0 && $dateArr[2] <= 31))
            return true;
        else
            return false;
    }
    return false;
}
/**
 * 匹配时间
 * @param string $value
 */
function chkTime($str){
    $timeArr = explode(":", $str);
    if (is_numeric($timeArr[0]) && is_numeric($timeArr[1]) && is_numeric($timeArr[2])) {
        if (($timeArr[0] >= 0 && $timeArr[0] <= 23) && ($timeArr[1] >= 0 && $timeArr[1] <= 59) && ($timeArr[2] >= 0 && $timeArr[2] <= 59))
            return true;
        else
            return false;
    }
    return false;
}

?>