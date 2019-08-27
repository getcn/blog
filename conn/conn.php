
<?php
if (!isset ($_SESSION)) {
	ob_start();
	session_start();
}
 $hostname="localhost"; //mysql地址
 $basename="root"; //mysql用户名
 $basepass="root"; //mysql密码
 $database="wz"; //mysql数据库名称
 

?>
<?php
@$con=mysql_connect($hostname,$basename,$basepass);
if(!$con) {
	die('数据库连接失败：'.mysql_error());
}
mysql_select_db($database,$con);
?>

<?php

 @$conn=mysql_connect($hostname,$basename,$basepass)or die("error!"); //连接mysql              
 mysql_select_db($database,$conn); //选择mysql数据库
mysql_query("set names 'utf8'");//mysql编码
 error_reporting(0);
?>
<?php
$connn=new mysqli($hostname,$basename,$basepass,$database);

if($connn->connect_error)
{
die("链接失败".$connect_error);
}
$connn->query("SET NAMES utf8")
?>
<?php
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
?>
<?php require('ipdiqu/ipdiqu.php'); //IP地区 ?>
<?php require('ipsuo/ipsuo.php'); //IP锁 ?>