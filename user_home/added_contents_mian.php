<meta charset="utf-8">
            <link rel="stylesheet" href="../inos/css/pintuer.css">
    <link rel="stylesheet" href="../inos/css/admin.css">
        <script src="../inos/js/jquery.js"></script>
    <script src="../inos/js/pintuer.js"></script> 
<meta charset="utf-8">
<?php
require_once('io-ia.php');
require_once('../conn/conn.php');

?>
<?php 
$verifys=$_SESSION['username'];
$sql="select * from user where username='$verifys'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$urls="home.php?do=added_content";
?>
        <div class="field">
          <p><?php //echo $row['username'];?></p>
          <?php
    header("Content-type:text/html;charset=utf-8");
    //要创建的多级目录
    $path="../do/userphoto/time/user/".$row['username']."/photo";
    //判断目录存在否，存在给出提示，不存在则创建目录
    if (is_dir($path)){  
        //echo "对不起！目录 " . $verifys . " 已经存在！";
        echo "";
    }else{
        //第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
        $res=mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
        if ($res){
            echo "目录 $verifys 创建成功";
        }else{
            echo "目录 $verifys 创建失败";
        }
    }
?>
	  <?php

$vip=$row['user_timesp'];
$vips="1";
if(strstr($vip,$vips))
echo "";
else 
echo "<script>alert('免费次数已用完，请先激活账号！');location='home.php';</script>";
	
?>
		  <!------------------->
<body>
<p><strong>当前有一次免费上传次数，上传后将不能在修改</strong></p>
<p><strong>点击提交后没有反应，请再点击一次</strong></p>
<p><strong>如需覆盖二维码，请在重新上传一个即可覆盖</strong></p>
<p><strong>图片上传，订单提交后，图片将不能再修改！</strong></p>
<p><strong>文件夹创建失败请及时联系管理员</strong></p>

  <form action="<?php echo $urls; ?>" method="post" enctype="multipart/form-data">
  <table class="table table-hover text-center"  width="576" border="0">
    <tbody>
   <strong>
    <tr>
      <td width="235">文件二维码：</td>
      <td width="124">重置选择：</td>
      <td width="203">传给后台</td>
      </tr>
    <tr>
      <td><input type="file" name="file" /></td> 
      <td><h3><a href="home.php?do=added_contents">重制</a></h3></td>
      <td> <input type="submit" value="上传" /></td>
    </tr>

    </strong>
  </tbody>
  
</table>
</form>
  	  
		  <!------------------->