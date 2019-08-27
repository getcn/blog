<?php
require_once('../conn/conn.php');
?>

<?php 

$sql="select * from smtpserversmtp";	

$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){


?>


<!doctype html>
<html >
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="../favicon.ico">
	<!--<link rel="apple-touch-favicon.icon" sizes="76x76" href="zc_php/assets/img/apple-icon.png">
	<link rel="icon" type="zc_php/assets/image/favicon.ico" href="zc_php/assets/img/favicon.png">-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>用户注册</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="zc_php/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="zc_php/assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="zc_php/assets/css/demo.css" rel="stylesheet" />

<script language="javascript">
function chk(theForm){
	if (theForm.username.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("帐号不能为空！");
		theForm.username.focus();   
		return (false);   
	}		
	
	if (theForm.password.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("密码不能为空！");
		theForm.password.focus();   
		return (false);   
	}	
	
	if (theForm.password.value != theForm.pass.value){
		alert("两次输入密码不一样！");
		theForm.pass.focus();   
		return (false);   
	}	
		 
	if (theForm.user_thename.value.replace(/(^\s*)|(\s*$)/g, "") == "" || theForm.user_thename.value.replace(/[\u4e00-\u9fa5]/g, "")){
		alert("真实姓名不能为空且必须为中文！");   
		theForm.user_thename.focus();   
		return (false);   
	}
	if (theForm.user_mail.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("邮箱不能为空！");
		theForm.user_mail.focus();   
		return (false);   
	}	
	
}
</script>
<?php
//mysql_error()//返回数据库错误代码
$tz="<script>alert('注册失败！该账号已存在或者禁止注册');location='zc.php?tj=register';</script>";
if(@$_POST["submit"]){
if(empty($_POST['username']))
	echo "<script>alert('帐号不能为空');location='?tj=register';</script>";
else if(empty($_POST['password']))
	echo "<script>alert('密码不能为空');location='?tj=register';</script>";
else if($_POST['password']!=$_POST['pass'])
	echo "<script>alert('两次密码不一样');location='?tj=register';</script>";
else if(!empty($_POST['user_qq'])&&!is_numeric($_POST['user_qq']))
	echo "<script>alert('qq号必须全为数字');location='?tj=register';</script>";
else if(!empty($_POST['user_phone'])&&!is_numeric($_POST['user_phone']))
	echo "<script>alert('手机号码必须全为数字');location='?tj=register';</script>";
else if(!empty($_POST['user_mail'])&&!ereg("([0-9a-zA-Z]+)([@])([0-9a-zA-Z]+)(.)([0-9a-zA-Z]+)",$_POST['user_mail']))
	echo "<script>alert('邮箱输入不合法');location='?tj=register';</script>";
else{
//$_SESSION['username']=$_POST['username'];
//$sql="insert into member values('','".$_POST['member_user']."','".md5($_POST['member_password'])."','".$_POST['member_name']."','".$_POST['member_sex']."','".$_POST['member_qq']."','".$_POST['member_phone']."','".$_POST['member_email']."','".$_POST['member_cook']."','".$_POST['member_developers']."')";
//$sql="insert into user(username,password,user_thename,user_sex,user_qq,user_phone,user_mail,user_cook,user_developers) values('$username','$password','$user_thename','$user_sex','$user_qq','$user_phone','$user_mail','$user_cook','$user_developers')";	
	
	//$username=$_POST['username'];
    //$password=md5($_POST['password']);
	//$user_thename=$_POST['user_thename'];
	 //$user_sex=$_POST['user_sex'];
	 //$user_qq=$_POST['user_qq'];
	 //$user_phone=$_POST['user_phone'];
	 //$user_mail=$_POST['user_mail'];
	 //$user_cook=$_POST['user_cook'];
	//$user_developers=$_POST['user_developers'];
//包含数据库连接文件

 //检测用户名是否已经存在
	
	$username = $_POST['username'];
 $check_query = mysql_query("select * from user where username='$username' limit 1");
 if(mysql_fetch_array($check_query)){
     echo '警告：用户名 ',$username,' 已存在。<a href="javascript:history.back(-1);">返回</a>';
     exit;
 }
    $password=md5($_POST['password']);
	$user_thename=$_POST['user_thename'];
	$user_sex=$_POST['user_sex'];
	$user_qq=$_POST['user_qq'];
	$user_phone=$_POST['user_phone'];
	$user_mail=$_POST['user_mail'];
	$user_cook=$_POST['user_cook'];
	$user_developers=$_POST['user_developers'];
	$user_time=date("Y-m-d H:i:s ");
	$regtime = time();
	$token = md5($username.$password.$regtime); //创建用于激活识别码
    //$token_exptime = time()+60*60*24;//过期时间为24小时后
    $token_exptime = time()+3600;//过期时间为1小时后
	$sql="insert into user(username,password,user_thename,user_sex,user_qq,user_phone,user_mail,user_cook,user_developers,user_time,token,token_exptime,regtime) values('$username','$password','$user_thename','$user_sex','$user_qq','$user_phone','$user_mail','$user_cook','$user_developers','$user_time','$token','$token_exptime','$regtime')";	

    include_once("smtp.class.php");
    $smtpserver = $row['smtpsmtpserver']; //SMTP服务器
    $smtpserverport = $row['smtpsmtpserverport'];; //SMTP服务器端口
    $smtpusermail = $row['smtpsmtpusermail']; //SMTP服务器的用户邮箱
    $smtpuser = $row['smtpsmtpuser']; //SMTP服务器的用户帐号
    $smtppass = $row['smtpsmtppass']; //SMTP服务器的用户密码
    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $emailtype = "HTML"; //信件类型，文本:text；网页：HTML
    $smtpemailto = $_POST['user_mail'];
    $smtpemailfrom = $smtpusermail;
    $emailsubject = $row['smtpemailsubject'];
   // $emailsubject = "用户帐号激活";
    //$emailbody = '123';
    //$emailbody = $row['smtpemailbodytxt'];
	$htmlym=$_SERVER['HTTP_HOST'];
    $emailbody = "亲爱的".$username."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/><a href='http://$htmlym/phps/utf8/zc/zhuceyz/active.php?verify=".$token."' target='_blank'>http://$htmlym/phps/utf8/zc/zhuceyz/active.php?verify=".$token."</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接1小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- rootcn.cn 敬上</p>";
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
    if($rs==1){
        $msg = '恭喜您，注册成功！<br/>请登录到您的邮箱及时激活您的帐号！';   
    }else{
        $msg = $rs; 
    }

	$result=mysql_query($sql)or die($tz);



	

	
if($result)
echo "<script>alert('恭喜你注册成功！请登录到您的邮箱及时激活您的帐号！');location='../content_adm/home.php';</script>";
else
{
	echo "<script>alert('注册失败');location='zc.php?tj=register';</script>";
	mysql_close();
}
	}
}
	
	
	

	
	
	
	
?>
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('zc_php/assets/img/wizard-boat.jpg')">
    <!--   Creative Tim Branding   -->
    <a href="#">
         <div class="logo-container">
            <div class="logo">
                <img src="zc_php/assets/img/admin.png">
            </div>
            <div class="brand">
                <a href="../index.php"><?php echo $row['homeTitle'];?>点击返回首页</a>
            </div>
        </div>
    </a>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="azzure" id="wizard">
                           <?php if(@$_GET['tj'] == 'register'){ ?>
                            <form id="theForm" name="theForm" method="post" action="" onSubmit="return chk(this)" runat="server" style="margin-bottom:0px;">
                <!--        You can switch ' data-color="azzure" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	<h3>
                       	   
                        	   用户注册 <br>
                        	   <small>欢迎注册<?php echo $row['homeTitle'];?></small>
                        	</h3>
                    	</div>
						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#details" data-toggle="tab">用户规则</a></li>
	                            <li><a href="#captain" data-toggle="tab">选择会员</a></li>
	                            <li><a href="#description" data-toggle="tab">会员注册</a></li>
	                        </ul>
						</div>
                        <div class="tab-content">
                            <div class="tab-pane" id="details">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <h4 class="info-text">注册前—请先阅读用户规则</h4>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>帮助</label>
                                            <p class="description"><a href='../content_adm/admin.php' target='_blank'>"已有账号：点击登录"</a></p>
                                            <p class="description">"请先阅读规则后在注册"</p>
                                            <p class="description">"用户规则重点：如您不同意本服务条款及/或Rootcn.cn随时对其的修改，您应不使用或主动取消Rootcn.cn提供的Rootcn.cn。否则，您的任何对Rootcn.cn中的相关服务的登陆、下载、查看等使用行为将被视为您对本服务条款全部的完全接受，包括接受Rootcn.cn对服务条款随时所做的任何修改。"</p>
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label>用户规则</label><br/>
                                            <iframe id="run_iframe" name="run_iframe" src="zhongyaotongzhi.php"  style="form-control" rows="9"></iframe>
                                          </div>
                                    </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="captain">
                                <h4 class="info-text">目前仅支持注册普通会员 </h4>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="暂时不支持注册会员，需要后台审核后直接升级会员">
                                                <input type="radio" name="job" value="Design">
                                                <div class="icon">
                                                    <i class="fa fa-life-ring"></i>
                                                </div>
                                                <h6>会员</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="普通会员">
                                                <input type="radio" name="job" value="Code">
                                                <div class="icon">
                                                    <i class="fa fa-male"></i>
                                                </div>
                                                <h6>普通会员</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="description">
                                <div class="row">
                                    <h4 class="info-text">会员注册&nbsp;&nbsp;以下打“*”为必填项</h4>
                                    <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>账&nbsp;&nbsp;&nbsp;号:<font color="#FF0000"> *</font>(由数字或字母组成)</label>
                                        <input type="text" class="form-control" name="username" id="username" >  
                                        
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                      <div class="form-group">
                                        <label>真实姓名:<font color="#FF0000"> *</font></label>
                                        <input type="text" class="form-control" name="user_thename" id="user_thename" >
                                      </div>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>密&nbsp;&nbsp;&nbsp;码:<font color="#FF0000"> *</font>(由数字或字母组成)</label>
                                        <input type="password" class="form-control" name="password" id="password" >
                                      </div>
                                  </div>
                                    <div class="col-sm-5">
                                      <div class="form-group">
                                        <label>确认密码:<font color="#FF0000"> *</font>(再次输入密码)</label>
                                        <input type="password" class="form-control" name="pass" id="pass" >
                                      </div>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>cook:<font color="#FF0000">*</font>自动生成无法修改</label>
                                        <input readonly type="text" class="form-control" name="user_cook" id="user_cook" value="<?php require('../content_adm/phpbjq/cookid.php'); ?>">
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                      <div class="form-group">
                                        <label>Q&nbsp;&nbsp;&nbsp;Q:</label>
                                        <input type="text" class="form-control" name="user_qq" id="user_qq" >
                                      </div>
                                  </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>联系方式:</label>
                                        <input type="text" class="form-control" name="user_phone" id="user_phone" >
                                      </div>
                                  </div>                                                                       
                                    <div class="col-sm-5">
                                      <div class="form-group">
                                        <label>电子邮箱:<font color="#FF0000"> *</font>(可以核对账号找回密码)</label>
                                        <input type="text" class="form-control" name="user_mail" id="user_mail" >
                                      </div>
                                  </div>
                                    <!--<div class="col-sm-5  col-sm-offset-1">
                                      <div class="form-group">
                                        <label>******</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="***">
                                      </div>
                                  </div>-->                          
                                    
                                    
                                    
                                </div>
                                     <div class="info-text">
                                        <label>性&nbsp;&nbsp;&nbsp;别:</label>
                                        <input name="user_sex" type="radio" id="0" value="男" checked="checked" />
                                        男
                                        <input type="radio" name="user_sex" value="女" id="1" />
                                        女
                                      </div>
                                      <h5 class="info-text">cook账号:<font color="#FF0000">*</font>自动生成无法修改</h5>
                            </div>
                        </div>

                        <div class="wizard-footer">
                            	<div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' name="submit" id="submit" value='Finish' />
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                        </div>
                    </form>
                    <?php
} 
	if(@$_GET['tj']== ''){
?>
<?php
if(@$_POST["submit2"]){
$name=$_POST['name'];
$pw=md5($_POST['password']);
$sql="select * from user where username='".$name."'"; 
$result=mysql_query($sql) or die("账号不正确");
$num=mysql_num_rows($result);
if($num==0){
	echo "<script>alert('帐号不存在');location='index.php';</script>";
	}
while($rs=mysql_fetch_object($result))
{
	if($rs->password!=$pw)
	{
		echo "<script>alert('密码不正确');location='index.php';</script>";
		mysql_close();
	}
	else 
	{
		$_SESSION['member']=$_POST['name'];
		header("Location:member.php");
		mysql_close();
		}
	}
}
?>
               <script>alert('会员登录页面已更新即将跳转！');location='index.php';</script>
               <?php }?>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
          <?php require('../do/banquan-nofanyi.php'); ?>
        </div>
    </div>


</div>

</body>

	<!--   Core JS Files   -->
	<script src="zc_php/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="zc_php/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="zc_php/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="zc_php/assets/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="zc_php/assets/js/jquery.validate.min.js"></script>

</html>

<?php }?>