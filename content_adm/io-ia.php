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
  <?php if($_SESSION['username']<>"admin"){?>
    <script>alert('尊敬的用户！请使用会员中心');location='../user_home/home.php?do=contents';</script><?php }?>
