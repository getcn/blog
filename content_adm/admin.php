<?php
require_once ('../conn/conn.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; " />
<link rel="stylesheet" href="denglu/css/login.css">
<title>login</title>
<script src="denglu/js/jquery.min.js"></script>

</head>



<body class="login" mycollectionplug="bind">
<div class="login_m">
<div class="login_logo"><!--<img src="/" width="196" height="46">--></div>
<div class="login_boder">

<?php
if(@$_POST["submit2"]){
$username=$_POST['name'];
$password=md5($_POST['password']);
$code=$_POST["code"];//验证码
$sql="select * from user where username='".$username."'"; 
$result=mysql_query($sql) or die("账号不正确");
$num=mysql_num_rows($result);
if(empty($_POST['name']))
	echo "<script>alert('帐号不能为空');</script>";
else if(empty($_POST['password']))
	echo "<script>alert('密码不能为空');</script>";
else if(empty($_POST['code']))
	echo "<script>alert('验证码不能为空');</script>";
else{
	
	if($num==0){
	echo "<script>alert('帐号不存在');location='../content_adm/admin.php';</script>";
	}
while($rs=mysql_fetch_object($result))
{
	if($rs->password!=$password)
	{
		echo "<script>alert('密码不正确');location='../content_adm/admin.php';</script>";
		mysql_close();
		
	}
		if($code<>$_SESSION["auth"])
		{
		echo "<script>alert('验证码不正确！');window.location='admin.php'</script>";
        mysql_close();
		}
			else 
	{
		if ($rs->password===$password) {
							$_SESSION['username']=$_POST['name'];
  header("Location:coadid/sj/sj.php");
  mysql_close();
			
			}else {
echo "<script>alert('内容不正确！请填写正确内容！');window.location='admin.php'</script>";
 }
		//$_SESSION['username']=$_POST['name'];
		
		//$password=$_POST['password'];
		//header("Location:coadid/sj/sj.php");
		//mysql_close();
//if ($_SESSION['username']=$_POST['name']) {
//echo "";
//} elseif ($code<>$_SESSION["auth"]) {
 // header("Location:coadid/sj/sj.php");
 // mysql_close();
//} else {
 // echo "<script>alert('不正确！');window.location='admin.php'</script>";
//}
		}
		
}
    }
}

?>

<form id="theForm" name="theForm" action="" method="post" onSubmit="return Checklogin();" style="margin-bottom:0px;">

<div class="login_padding" id="login_model">
<body>
<div class="login-area">
    <div class="title" >
        <span></span>登录<span></span>
    </div>
    <label for="">
  <label>
        <input id="name" type="text" placeholder="账号" class="common input" name="name" onFocus="xfjianpan(this.id)">
  </label>
<p>
  <label>
   <input id="password" type="password"  name="password" placeholder="密码" class="common input psw-height"  onFocus="xfjianpan(this.id)">
  </label>
 <p><br />
   <label>
   <input id="code" type="text"  name="code" placeholder="验证码" class="common input psw-height" onFocus="xfjianpan(this.id)">
   	<div style="text-align: center"><img src="denglu/verify.php" style="vertical-align:middle" class="common  psw-height" /></div>
  </label>
 </p>
  <div class="rem_sub">
  <div class="rem_sub_l">
   </div>
    <label>
     	    <input name="submit2" type="submit" class="common login-btn" value="登录">
        
    </button>
    </label>
  </div>
</div>

<div id="forget_model" class="login_padding" style="display:none">
<br>

   <h1>&nbsp;</h1>
   <br>
   <div class="forget_model_h2"></div>
   <div class="rem_sub">
  <div class="rem_sub_l">
   </div>
    <label>
     
     　　　
     　　
    
    </label>
</form>
  </div>
</div>






<div style="text-align: center">
<?php require('denglu/shuruqi.php'); ?>
<?php require('../do/banquan.php'); ?>
</div>



</body>
</html>

