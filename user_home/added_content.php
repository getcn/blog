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
//取文件信息
$arr = $_FILES["file"];
//var_dump($arr);
//加限制条件
//1.文件类型
//2.文件大小
//3.保存的文件名不重复
if(($arr["type"]=="image/jpeg" || $arr["type"]=="image/png" ) && $arr["size"]<10241000 )
{
//临时文件的路径
$arr["tmp_name"];
//上传的文件存放的位置
//避免文件重复: 
//1.加时间戳.time()加用户名.$uid或者加.date('YmdHis')
//2.类似网盘，使用文件夹来防止重复
$filename = "../user_id/userphoto/time/user/".$verifys."/photo/".date('Ymd').$verifys.$arr["name"];
//$filename = "./tu/".date('YmdHis').$arr["name"];
//保存之前判断该文件是否存在
  if(file_exists($filename))
  {
    echo "该文件已存在,请勿上传同名称的图片！正在返回图片上传<script>;location='home.php?do=added_contents';</script>";
  }
  else
  {
  //中文名的文件出现问题，所以需要转换编码格式
  $filename = iconv("UTF-8","gb2312",$filename);
  //移动临时文件到上传的文件存放的位置（核心代码）
  //括号里：1.临时文件的路径, 2.存放的路径
  move_uploaded_file($arr["tmp_name"],$filename);
  }
}
else
{
  echo "上传的文件大小或类型不符,正在返回重新上传图片<script>;location='home.php?do=added_contents';</script>";
}
?>
<?php
$sql="select * from book order by id";
$result=mysql_query($sql);
$num=mysql_num_rows($result);//数据总条数
$pagesize=50;//每页显示条数
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
<?php }?>
<form action="../do/do.php?do=tianjia_liuyan2&id=<?php echo $id; ?>" method="post">
<div class="col-md-9">
            <h1 class="page-header">撰写新订单</h1>
            <div class="form-group">
              <label for="article-title" class="sr-only">标题</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="在此处输入标题" value="<?php echo $row['name']; ?>" required autofocus autocomplete="off">
            </div>
            <div >
              <label for="right" class="sr-only">内容</label>

          	<script id="container" name="content" type="text/plain"><?php echo $row['content']; ?></script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="../do/bd/ueditor.config-user.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="../do/bd/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
	var ue = UE.getEditor('container');
	
    </script><br />
                      <div class="add-article-box">
              <h2 class="add-article-box-title"><span>上传图片</span></h2>
              <div class="add-article-box-content">
              	 <img width="800" height="400"  src="<?php echo $filename; ?>"><br/>
                <span class="prompt-text">上传用户：<?php echo $_SESSION['username']; ?></span>
                <input type="hidden" class="form-control" value="<?php echo $filename;?>" name="timesp" id="timesp" autocomplete="off">
				<input type="hidden" class="form-control" value="<?php require('../conn/phpbjq/cookid.php');?>" name="ordercoding" id="ordercoding" autocomplete="off">
              </div>
            </div>
            <br/>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>栏目</span></h2>
              <div class="add-article-box-content">
                <ul class="category-list">
                  <li>
                    <label>
                      <input name="category" type="radio" value="1" checked>
                      这是栏目 <em class="hidden-md">( 栏目ID: <span>1</span> )</em></label><br />
                      测试中暂时不支持选择
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>作者</span></h2>
              <div class="add-article-box-content">
                <?php echo $_SESSION['username'];?>
              </div>
              <div class="add-article-box-footer">
              <span class="prompt-text"> 作者为登录账号；文章显示的作者</span> 
                <?php //<button class="btn btn-default" type="button" ID="upImage">选择</button>?>
              </div>
            </div>            
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              <div class="add-article-box-content">
              	<p><label>状态：</label><span class="article-status-display">未发布</span></p>
                <p><label>编写时间：</label><span class="article-time-display"><input style="border: none;" type="datetime" id="time" name="time" value="<?php echo date("Y-m-d H:i:s ");?>" /></span></p>
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit2">发布</button>
              </div>
            </div>
          </div>
</form>