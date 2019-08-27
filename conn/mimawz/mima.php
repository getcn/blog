



	<?php

	$mima=$row["content_Encryptedpassword"];
	//echo $mima.'<br />';
	//echo $row["id"].'<br />';

?>
<?php //输入密码后访问本页内容
$password = $mima ;//这里是密码 
$p = "";if(isset($_COOKIE["isview"]) and $_COOKIE["isview"] == $password){ 
$isview = true;}else{ 
if(isset($_POST["pwd"])){ 
if($_POST["pwd"] == $password){ 
setcookie("isview",$_POST["pwd"],time()+60);$isview = true;}else{$p = (empty($_POST["pwd"])) ? "需要密码才能查看，请输入密码。" : "<div style=\"color:#F00;\">密码不正确，请重新输入。</div>";} 
}else{$isview = false;$p = "请输入密码查看，获取密码可联系我。".'<br>'."输入后请刷新页面即可显示内容";}}?>
<?php if($isview){?>
<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>尊敬的用户！文章被加密！您需输入密码方可查看！</title>
<style type="text/css">body{background:none;}.passport{width:400px;position:absolute;left:50%;top:50%;margin-left:-200px;margin-top:-55px;font-size:18px;text-align:center;line-height:30px;color:red;border-radius:5px 5px 5px 5px;}</style>
</head><body>
<div class="passport"></div>
</body></html> 
<?php }else{?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>尊敬的用户！文章被加密！您需输入密码方可查看！</title> 
<style type="text/css">
body{background:none;}.passport{
	border: 1px solid #393D49;
	width: 380px;
	height: 100px;
	position: absolute;
	left: 49.9%;
	top: 49.9%;
	margin-left: -200px;
	margin-top: -30px;
	font-size: 14px;
	text-align: center;
	line-height: 30px;
	color: #999BA0;
	background-color: #393D49;
	border-radius: 5px 5px 5px 5px;
}
</style>
</head><body>
<div class="passport"><div style="padding-top:10px;"> 
<form action="" method="post" style="margin:0px;">输入查看密码 
<input   type="password" name="pwd"  /> <input type="submit" value="查看" />




</form> 


<?php echo $p;?> 
</div></div> 
</body></html> 
<?php }?> 



