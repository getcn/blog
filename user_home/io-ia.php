<meta charset="utf-8">
<?php 
require_once ('../conn/conn.php'); 
//判断用户权限
if(!isset($_SESSION['username'])){  
    exit("<script>location='admin.php';</script>"); 
}



//echo $_SESSION['username'];

?>

<?php

//注销操作
if(@$_GET["tj"]=="destroy"){
session_destroy();
echo "<script>alert('注销成功');location='home.php';</script>";}
setcookie("cook-cookile-login", "", time()-3600);


?>


<?php
 {
 ?>
 
<?php } ?>
<?php
if($_SESSION['user'])                 
{?>
<?php
$result=mysql_query("select * from user where user_name='".$_SESSION['user']."'"); 
while($rs=mysql_fetch_array($result)){
?>



<?php  }
}
?>
 <?php //if($_SESSION['username']<>"admin")
{
?>
    <!--<script>alert('尊敬的用户！会员后台还在设计中，暂时不支持访问后台，具体可访问时间请留意Rootcn.cn blog或rootcn.cn!暂时将为您注销账号，感谢您的支持！谢谢！');location='home.php?tj=destroy';</script>-->
    <?php }?>


