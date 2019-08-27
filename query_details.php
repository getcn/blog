<?php
require_once('conn/conn.php');

?>		
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

        <?php 
//require_once('pb/pb.php');
$ordercoding=$_GET['ordercoding'];
$sql="select * from book where content_ordercoding='$ordercoding'";
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
$strphoto=$row['content_url_photo'];
//echo substr($strphoto,3,100);
			?>
			<?php 
$timepc=$_SESSION['username'];	
$user_times=$row['name_author']; 
if ($user_times<>$timepc) {  
	echo "<script>alert('您无法查看该用户的临时文章页面');location='/index.php';</script>";
} elseif($user_times===$timepc) {
	echo "";} 
else {  
	echo "";} 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $row["name"];?></title>

  <style>
  html{background-color:#E3E3E3; font-size:14px; color:#000; font-family:'微软雅黑'}
  a,a:hover{ text-decoration:none;}
  pre{font-family:'微软雅黑'}
  .box{padding:20px; background-color:#fff; margin:50px 100px; border-radius:5px;}
  .box a{padding-right:15px;}
  #about_hide{display:none}
  .layer_text{background-color:#fff; padding:20px;}
  .layer_text p{margin-bottom: 10px; text-indent: 2em; line-height: 23px;}
  .button{display:inline-block; *display:inline; *zoom:1; line-height:30px; padding:0 20px; background-color:#56B4DC; color:#fff; font-size:14px; border-radius:3px; cursor:pointer; font-weight:normal;}
  .photos-demo img{width:200px;}
  </style>
  
  <script src="http://cdn.bootcss.com/jquery/1.12.3/jquery.min.js"></script>
  <script src="Modulars/layer/layer.js"></script>
</head>
<body>
<div class="box">
<pre>
 @用户：<?php echo $row['name_author'];?><br/>
 @上传时间<?php echo $row['time'];?><br/>
<strong>留言内容</strong>
<?php
echo $row["content"];
?>
<img width="800" height="400"  src="<?php echo substr($strphoto,3,100); ?>"><br/>
</pre>
</div>

<div class="box" style="text-align:center">
  <a href="javascript:;" id="about">联系</a>
</div>

<script>
;!function(){


//页面一打开就执行，放入ready是为了layer所需配件（css、扩展模块）加载完毕


//关于
$('#about').on('click', function(){
	
  layer.alert(' 联系-扫一扫 <br/><img  src="do/in_js_css/images/us_ercenter/upload_avatar/admin/adminewm.jpg">');
});

}();
</script>

</body>
</html>