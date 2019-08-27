<?php 
include_once("../../conn/conn.php");
session_start();
header("Content-Type: text/html;charset=utf-8");
//error_reporting(E_ALL); 
//ini_set('display_errors', true);
date_default_timezone_set("PRC");   //系统使用北京时间

define('ALL_PS','WEBA');
define('DBHOST', $hostname);
define('DBNAME', $database); //数据库名称
define('DBUSER', $basename); //数据库用户名
define('DBPWD', $basepass); //数据库密码
define('DBPREFIX', 'hw_');
define('DBCHARSET', 'utf8');
define('CONN', '');
define('TIMEZONE', 'Asia/Shanghai');

$db = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPWD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->query('SET NAMES utf8;');


function inject_check($sql_str) { //防止注入
    $check = preg_match('/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i', $sql_str);
    if ($check) {
        return 202; //疑似恶意代码
    } else {
        return $sql_str;
    }
}
