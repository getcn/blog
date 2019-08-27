<?php
require_once('conn/conn.php');
$sql="select * from homefirst";	
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
?>
<!DOCTYPE HTML>
<html>
	<head>
	<link rel="shortcut icon" href="favicon.ico">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $row['homeTitle'];?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="<?php echo $row['homekeywords'];?>"/>
    <meta name="description" content="<?php echo $row['homedescription'];?>"/>
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
	<script src="do/in_js_css/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
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
	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<div id="fh5co-aside" style="background-image: url(do/in_js_css/images/206.jpg)">
			<div class="overlay"></div>
			<nav role="navigation">
				<ul>
					<li><a href="index.php"><i class="icon-home"></i></a></li>
				</ul>
			</nav>
			<div class="featured">
				<span><?php echo $row['homeTitle'];?></span>
				<h2><a><?php echo $row['homeSubtitle'];?> </a></h2>
				<?php require('do/banquan.php'); ?>
			</div>

			<?php 
			//$Reviewarticle="Pass";
//$sql="select * from book order content_Reviewarticle='$Reviewarticle'";
$sql="select * from book  where content_Reviewarticle='Pass' and name_author='admin' and time  order by content_time DESC";
//$sql="select * from book order by id DESC";
//$sql="select * from book where name_author='$timepc'";
//order by 时间字段名 DESC    //时间从大到小
//order by 时间字段名 ASC     //时间从小到大								
$result=mysql_query($sql);
$num=mysql_num_rows($result);//数据总条数
$pagesize=100;//每页显示条数
@$page=$_GET['page'];//当前页数
if (empty($page)) {
	$page=1;
}
$totalpage=ceil($num/$pagesize);//总页数
$begin=($page-1)*$pagesize;
$sql=$sql." limit $begin,$pagesize";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
?>
	<?php
$namea=$row['name_author'];
$lj="do/in_js_css/images/us_ercenter/upload_avatar/";
$jpe=".jpg";
$quanju="$lj$namea/$namea$jpe";


?>
		</div>

			<div id="fh5co-main-content">
		<div class="fh5co-post"> 
			<div class="fh5co-entry padding">

			
			<script type="text/javascript">
		// borwserRedirect
		(function browserRedirect(){
			var sUserAgent = navigator.userAgent.toLowerCase();
			var bIsIpad = sUserAgent.match(/ipad/i) == 'ipad';
			var bIsIphone = sUserAgent.match(/iphone os/i) == 'iphone os';
			var bIsMidp = sUserAgent.match(/midp/i) == 'midp';
			var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == 'rv:1.2.3.4';
			var bIsUc = sUserAgent.match(/ucweb/i) == 'web';
			var bIsCE = sUserAgent.match(/windows ce/i) == 'windows ce';
			var bIsWM = sUserAgent.match(/windows mobile/i) == 'windows mobile';
            var bIsAndroid = sUserAgent.match(/android/i) == 'android';
			if(bIsIpad || bIsIphone || bIsMidp || bIsUc7 || bIsUc || bIsCE || bIsWM || bIsAndroid){
				''; 
			}else{
				document.write('<img src="<?php echo $quanju;?>">'); 
			}
		})();
				
				
			
	</script>
			
				
					<div>
						<span class="fh5co-post-date">发布时间：<?php echo $row['time'];?></span>
						<span class="fh5co-post-date">修改时间：<?php echo $row['content_time'];?></span>
						<h2><a href="content_detail.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?><span class="icon msg"></a></h2>
						<span class="fh5co-post-date">作者：<?php echo $row['name_author'];?></span>					
						<!--<p>#</p>-->
					</div>	
				</div>
				<footer>
					 <a ></a> <a ></a>
				</footer>
			</div>
			<?php }?>
			<footer>
				<div>
					 <a ></a> <a ></a>
					</div>
					<div class="xia">总共有<?php echo $num;?>条，分<?php echo $totalpage;?>页

<?php 
if ($page==1) {
?>

首页 | 上页
<?php 
}else {
?>

<a href="index.php?pag=1">首页</a> | <a href="index.php?page=<?php echo $page-1;?>">上页</a>
<?php }?>

<?php 
if ($page==$totalpage) {
?>
下页 | 尾页
<?php 
}else {
?>
<a href="index.php?page=<?php echo $page+1?>">下页</a> | <a href="index.php?page=<?php echo $totalpage;?>">尾页</a>
<?php }?>

<br />


<?php mysql_close($con);?>

	
				</footer>
		</div>
	</div>

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
<?php }?>
	</body>
</html>

