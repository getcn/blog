       <link rel="stylesheet" href="../inos/css/pintuer.css">
    <link rel="stylesheet" href="../inos/css/admin.css">
        <script src="../inos/js/jquery.js"></script>
    <script src="../inos/js/pintuer.js"></script> 
<meta charset="utf-8">
<script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/tools.js"></script>
   <script type="text/javascript" src="js/pictureHandle.js"></script>
   <?php

require_once('../conn/conn.php');
require_once('io-ia.php');
?>

<?php
$us_er_tx=$_SESSION['username'];
$lj="../do/in_js_css/images/us_ercenter/upload_avatar/";
$jpe=".jpg";

//echo $path;//输出路径
	header("Content-type:text/html;charset=utf-8");
	//要创建的多级目录
	$path="$lj$us_er_tx";
	//判断目录存在否，存在给出提示，不存在则创建目录
	if (is_dir($path)){  
		echo "尊敬的" .$_SESSION['username']. "已经存在！";
	}else{
		//第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
		$res=mkdir(iconv("gb2312", "GBK", $path),0777,true); 
		if ($res){
			echo "目录创建" .$_SESSION['username']."成功";
		}else{
			echo "目录创".$_SESSION['username']."建失败";
		}
	}

?>


</head>
<body>
<p><strong>点击提交后没有反应，请再点击一次</strong></p>
<p><strong>如需覆盖头像，请在重新上传一个即可覆盖</strong></p>
  <form>
  <table class="table table-hover text-center"  width="576" border="0">
    <tbody>
   <strong>
    <tr>
      <td width="235">文件头像：</td>
      <td width="124">重置选择：</td>
      <td width="203">传给后台</td>
      </tr>
    <tr>
      <td><input class="btn-default btn-white" type="file" id="upFile"/></td> 
      <td><h3><a href="home.php?do=tx_avatar_content">重制</a></h3></td>
      <?php //<input class="btn-default btn-white" type="reset" id="reBtn" value="清空" /> ?>
      <?php //<!--文件选择input中已选择文件重置(采用form表单的reset重置按钮重置)--> ?>
      <td> <input class="btn btn-primary" type="button" id="upTo" value="提交"/></td>
      <?php //<!--提交压缩后的base64文件数据给后台-->?>
    </tr>
    <tr>
      <td>压缩前预览：</td>
      <td></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
     <?php //<!--所选文件压缩前预览-->?>
      <td><img src="" id="preview"/></td>
      
      <td></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>压缩后预览：</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
     <?php //<!--所选文件压缩后预览-->?>
      <td><img src="" id="nextview"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    </strong>
  </tbody>
  
</table>
</form>
  
 




<tr>
	  <td style="text-align: left">
<?php //<!--后台所要获取的文件base64-->?>
    
    <input id="imgOne" name="imgOne" hidden/>
</tr>
</td>