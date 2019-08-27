<?php
require_once ('../conn/conn.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; " />
<link rel="stylesheet" href="denglu/css/login.css">
<title>login</title>
<script src="denglu/js/jquery.min.js"></script>



<script type="text/javascript" src="denglu/huadong/tn_code.min.js?v=35"></script>
 <link rel="stylesheet" type="text/css" href="denglu/huadong/style.css?v=27" />
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
	//if($code<>$_SESSION["auth"])
		//{
		//echo "<script>alert('验证码不正确！');window.location='admin.php'</script>";

		//}
	else 
	{
		$_SESSION['username']=$_POST['name'];
		header("Location:coadid/sj/sj.php");
		mysql_close();
		}
		
	}
}	
	
	
?>
<form action="" method="post" name="regform" onSubmit="return Checklogin();" style="margin-bottom:0px;">

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
   <!--
   <input id="code" type="text"  name="code" placeholder="验证码" class="common input psw-height" onFocus="xfjianpan(this.id)">
   	<img src="denglu/verify.php" style="vertical-align:middle" class="common  psw-height" />
!-->
  </label>
 </p>
  <div class="rem_sub">
  <div class="rem_sub_l">
   </div>
    <label>
	
	<!--<div  class="common login-btn tncode"  id="link" id="thediv" style="text-align:center" style="display:block"></div><br />
	
	<button href="javascript:;" onclick="document.getElementById('mcover').style.display='block';" class="tncode" style="text-align: center;margin: 100px auto;" ></button>
	
	<div <?php //if($flag) echo "style=\"display:none\"" ; ?>>test</div>
<input type="submit" onclick="a();" value="test" />
	<input id="thediv" style="display:none" name="submit2" type="submit" class="common login-btn" value="登录">-->

	<!--<div href="javascript:;" onclick="document.getElementById('mcover').style.display='block';" class="tncode" style="text-align: center;margin: 100px auto;" ></div>
	<div name="submit2" type="submit" class="tncode" style="text-align: center;margin: 100px auto;"></div>
     	    <input name="submit2" type="submit" class="common login-btn" value="登录">
		<p id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display: none;">
     <button name="submit2" type="submit" class="common login-btn" value="登录"></button>
</p>-->


		 
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
<strong >如果还没有账号请先注册</strong><br />

<?php// require('../do/banquan.php'); ?>
  <div class="tncode" style="text-align: center;margin: 100px auto;" onclick="c()"></div>
  
  
  <a onclick="c()">123</a>
 <script type="text/javascript">
 function c(){
     alert("你点击了a标签！！");
     window.location.href="你要跳转的地址";
 }
 </script>
</div>
</body>
</html>

