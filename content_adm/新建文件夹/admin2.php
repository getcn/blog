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
        <script type="text/javascript" src="denglu/yzmdj/public/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="denglu/yzmdj/public/js/jquery.ipicture.js"></script>
        <script type="text/javascript" src="denglu/yzmdj/public/js/junphp.js"></script>
 <script type="text/javascript">
// 请求更新图片
function get_img() {
    $.ajax({
        type: 'get',
        data:{},
        url: "denglu/yzmdj/demo/get_img.php",
        success: function(data) {
            var array = eval('('+data+')');

            if (array['code'] == '00') {
                $('#title').html(array['msg']);
                var html = '';
                for(var i=0; i<array['data'].length; i++){
                    html += '<div class="ip_slide" style="float: left;margin-left: 5px"><img class="ip_tooltipImg" src="'+array['data'][i]['vi_url']+'" data-id="'+array['data'][i]['vi_id']+'"></div>';
                }
                $('#iPicture').html(html);
                // 清空id池
                $('#iPicture_id').val('');
            } else {
                alert(array['msg']);
            }
        }
    });
}
// 页面自动加载一次
get_img();
// 启动红点标记插件
$("#iPicture").iPicture();

// 点击确认按钮去验证
$('button').click(function(){
    var id = $('#iPicture_id').val();
    if (id=='' || id==',') {
        alert('请先选择图片');
    }else{
        $.ajax({
            type: 'post',
            data:{'id':id},
            url: "denglu/yzmdj/demo/ajax_vif.php",
            success: function(data) {
                var array = eval('('+data+')');
                alert(array['msg']);
                if (array['code'] == '00') {
                    // 刷新验证码
                    get_img();
                }
            }
        });
    }
})
</script>
 <script type="text/javascript">
function Show_Hidden(obj)
{
 if(obj.style.display=="none")
 {
  obj.style.display='block';
 }
 else
 {
  obj.style.display='none';
 }
}
window.onload=function()
{
 var olink=document.getElementById("link");
 var odiv=document.getElementById("thediv");
 olink.onclick=function()
 {
  Show_Hidden(odiv);
  return false;
 }
}
</script>




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
	
	<!--<div href="javascript:;" onclick="document.getElementById('mcover').style.display='block';" class="tncode" style="text-align: center;margin: 100px auto;" ></div>
	<div  class="common login-btn tncode"  id="link" id="thediv" style="text-align:center" style="display:block"></div><br />
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
<p id="title">加载中....</p>

        <!--图片容器-->
        <div id="iPicture" data-interaction="hover" style="width: 440px;"></div>
        <!--存储验证的容器-->
        <input type="hidden" id="iPicture_id" value="">
        
        <div style="width: 100%;float: left;margin-top: 10px"><button type="button">确认提交</button></div>
</div>
</body>
</html>

