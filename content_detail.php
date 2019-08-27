<!DOCTYPE HTML>
<?php
require_once('conn/conn.php');
$sql="select * from homefirst";					
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
?>		
<!------------------------->
<?php
$url404="./404.php";//不开放时跳转404
/*$hy='<script>alert("欢迎开发者登录")</script>';*/
$kaifangchaxun=$row['homeClose'];//查询是否开放/1：开放/0：不开放
$kaifang="1";//开放状态
if(strstr($kaifangchaxun,$kaifang))
echo "";
else 
header("Location: $url404"); 
?>
<?php
$jianrongchaxun=$row['homeie6789'];//查询是否兼容浏览器/1：兼容/0：不兼容
$bujianrong="0";//不兼容
if(strstr($jianrongchaxun,$bujianrong))
require_once('conn\iewz\ie-6789.php');//不兼容时跳转ie-6789.php
else 
echo "";
?>
<!------------------------->
<html>
	<head>
	<link rel="shortcut icon" href="favicon.ico">
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<!--统一说明描述-->
		<meta name="keywords" content="<?php echo $row['homekeywords'];?>"/>
        <meta name="description" content="<?php echo $row['homedescription'];?>"/>
        <?php 
//require_once('pb/pb.php');
$id=$_GET['id'];
$sql="select * from book where id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
//判断
$result=mysql_query($sql);  
  
$row = mysql_fetch_array($result, MYSQL_ASSOC);  
  
    if (!mysql_num_rows($result))  
        {  
            echo "<script>location.href='index.php';</script>";  
        }  
    else  
        {  
           // echo mysql_num_rows($result)."\n";  
            //echo $row['game_id'];  
            //echo $row['task'];  
        }  
		//if($id=='0'){
	//echo "";
	//}else 
?>

<?php
$namea=$row['name_author'];
$lj="do/in_js_css/images/us_ercenter/upload_avatar/";
$jpe=".jpg";
$quanju="$lj$namea/$namea$jpe";
	$ewmjpe="ewm.jpg";
$ewm="$lj$namea/$namea$ewmjpe";
?> 
     		<?php   
 $zero1=date("Y-m-d H:i:s");   
 $zero2=$row['content_time'];   
 //echo "zero1的时间为：'$zero1'<br>";   
 //echo "zero2的时间为：'$zero2'<br>";   
 if(strtotime($zero1)<strtotime($zero2)){   
  echo  "<script>alert('文章采用定时发布，暂时无法查看'); location.href='index.php';</script>";   //文章不显示：zero1早于zero2
 }else{   
  echo  '';  // 文章显示：zero2早于zero1
 }   
 ?> 
       <title><?php echo $row["name"];?></title>
      <!--作者说明描述；PS主要显示作者文章描述说明，并不会跟统一说明一致-->
	<meta name="author" content="<?php echo $row["name"];?>" />
		<meta name="keywords" content="<?php echo $row["content_Keyword"];?>"/>
        <meta name="description" content="<?php echo $row["content_Explain"];?>"/>
	

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="do/in_js_css/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="do/in_js_css/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="do/in_js_css/css/bootstrap.css">
	
	<!-- Theme style  -->
	<link rel="stylesheet" href="do/in_js_css/css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	
	<body class="single">
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<div id="fh5co-aside" style="background-image: url(do/in_js_css/images/206.jpg)" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<nav role="navigation">
				<ul>
					<li><a href="index.php"><i class="icon-home"></i></a></li>
				</ul>
			</nav>
			<div class="page-title">
				<img src="<?php echo $quanju;?>" alt="">
				<span>作者：<?php echo $row['name_author'];?>发布时间：<?php echo $row['time'];?><br/>修改时间：<?php echo $row['content_time'];?></span>
				<h2><?php echo $row["name"];?></h2>
			</div>
		</div>
		<div id="fh5co-main-content">
			<div class="fh5co-post"> 
				<div class="fh5co-entry padding">
					<div>
					
					
					<?php
$pdmm=$row["content_Encryptedpassword"]; //密码
$pdmmy=$_COOKIE["isview"];//cookie
$jiamiwenzhang=$row["content_jiamiwenzi"];//加密；1加密；0解密
$jiamiwenziwenzhang="1";//加密
if(strstr($jiamiwenzhang,$jiamiwenziwenzhang))
require('conn/mimawz/1.php');
else 
require('conn/mimawz/mi.php');		
?>	 			
	<?php
	if(strstr($pdmm,$pdmmy))
require('conn/mimawz/mi.php');
else 
echo"";
	?>
			<br /><?php require_once('conn/mimawz/mimawz.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--
	<div class="fh5co-navigation">
		<div class="fh5co-cover prev fh5co-cover-sm" style="background-image: url(do/in_js_css/images/project-4.jpg)">
			<div class="overlay"></div>

			<a class="copy" href="#">
				<div class="display-t">
					<div class="display-tc">
						<div>
							<span>Previous Post</span>
							<h2>How to be an affective web developer</h2>
						</div>
					</div>
				</div>
			</a>

		</div>
		<div class="fh5co-cover next fh5co-cover-sm" style="background-image: url(do/in_js_css/images/project-5.jpg)">
			<div class="overlay"></div>
			<a class="copy" href="#">
				<div class="display-t">
					<div class="display-tc">
						<div>
							<span>Next Post</span>
							<h2>How to be an affective web developer</h2>
						</div>
					</div>
				</div>
			</a>

		</div>
	</div>
-->
	<footer>
		<div>
					<?php require('do/banquan.php'); ?>
					</div>
				</footer>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="do/in_js_css/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="do/in_js_css/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="do/in_js_css/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="do/in_js_css/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="do/in_js_css/js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="do/in_js_css/js/main.js"></script>
<?php } ?>
	</body>
</html>

