<?php
include_once("conn.php");
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit;
}

$username = htmlentities(stripslashes(trim($_POST['username'])));
$username = inject_check($username);

//检测用户名是否存在
$sql = "SELECT id FROM `r_user` WHERE username=:username";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':username' => $username
));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) {
    echo '<script>alert("用户名已存在，请换个其他的用户名");window.history.go(-1);</script>';
    exit;
}
$password = md5(trim($_POST['password']));
$email = trim($_POST['email']);
$isEmail = filter_var($email, FILTER_VALIDATE_EMAIL); 
if ($isEmail === false) {
    echo '<script>alert("邮箱名非法！");window.history.go(-1);</script>';
    exit;
}

$regtime = time();

$token = md5($username.$password.$regtime); //创建用于激活识别码
$token_exptime = time()+60*60*24;//过期时间为24小时后

$sql_insert = "INSERT INTO `r_user` (`username`,`password`,`email`,`token`,`token_exptime`,`regtime`) VALUES (:username,:password,:email,:token,:token_exptime,:regtime)";
$stmt = $db->prepare($sql_insert);
$stmt->execute(array(
    ':username' => $username,
    ':password' => $password,
    ':email' => $email,
    ':token' => $token,
    ':token_exptime' => $token_exptime,
    ':regtime' => $regtime
));
$insert_id = $db->lastinsertid();
if ($insert_id) {
    include_once("smtp.class.php");
    $smtpserver = "smtp.mxhichina.com"; //SMTP服务器
    $smtpserverport = 25; //SMTP服务器端口
    $smtpusermail = "rootcn@rootcn.cn"; //SMTP服务器的用户邮箱
    $smtpuser = "rootcn@rootcn.cn"; //SMTP服务器的用户帐号
    $smtppass = "Zhengze1"; //SMTP服务器的用户密码
    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $emailtype = "HTML"; //信件类型，文本:text；网页：HTML
    $smtpemailto = $email;
    $smtpemailfrom = $smtpusermail;
    $emailsubject = "用户帐号激活";
    //$emailbody = '123';
    $emailbody = "亲爱的".$username."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/><a href='http://127.0.0.1/phps/utf8/zhuceyz/active.php?verify=".$token."' target='_blank'>http://127.0.0.1/phps/utf8/zhuceyz/active.php?verify=".$token."</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- rootcn.cn 敬上</p>";
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
    if($rs==1){
        $msg = '恭喜您，注册成功！<br/>请登录到您的邮箱及时激活您的帐号！';   
    }else{
        $msg = $rs; 
    }
} else {
    $msg = '服务器忙，请稍后再试';
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>演示：PHP用户注册邮箱验证激活帐号</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<style type="text/css">
.demo{width:400px; margin:40px auto 0 auto; min-height:250px;}
.demo h3{line-height:40px; padding:4px; text-align:center; font-size:20px; color:#360}
</style>
</head>

<body>
<div id="header">
   <div id="logo"><h1><a href="http://www.helloweba.com" title="返回helloweba首页">helloweba</a></h1></div>
</div>

<div id="main">
   <h2 class="top_title"><a href="http://www.helloweba.com/view-blog-228.html">PHP用户注册邮箱验证激活帐号</a></h2>

</div>

<div id="footer">
    <p>Powered by helloweba.com  允许转载、修改和使用本站的DEMO，但请注明出处：<a href="http://www.helloweba.com">www.helloweba.com</a></p>
</div>
</body>
</html>