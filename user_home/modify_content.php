<meta charset="utf-8">
            <link rel="stylesheet" href="../inos/css/pintuer.css">
    <link rel="stylesheet" href="../inos/css/admin.css">
        <script src="../inos/js/jquery.js"></script>
    <script src="../inos/js/pintuer.js"></script> 
<meta charset="utf-8">
<?php
require_once('io-ia.php');
require_once('../conn/conn.php');

$id=$_GET['id'];
$sql="select * from book where id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>

<form action="../do/do.php?do=up_liuyan&id=<?php echo $id; ?>" method="post">
<div class="col-md-9">
            <h1 class="page-header">修改订单</h1>
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
           
            </div>
              <div class="add-article-box">
              <h2 class="add-article-box-title"><span>上传图片</span></h2>
              <div class="add-article-box-content">
              	 <img width="800" height="400"  src="<?php echo $row['content_url_photo']; ?>"><br/>
                <span class="prompt-text">上传地址：<?php echo $_SESSION['username']; ?></span>
              </div>
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
                <p><label><strong><?php echo $_SESSION['username'];?></strong></label></p>
                
              </div>
              <div class="add-article-box-footer">
               <span class="prompt-text"> 作者为登录账号；文章显示的作者</span> 
                <?php //<button class="btn btn-default" type="button" ID="upImage">选择</button>?>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              <div class="add-article-box-content">
              	<p><label>状态：</label><span class="article-status-display">修改中</span></p>
                <p><label>编写时间：</label><span class="article-time-display"><input style="border: none;" id="time" name="time" value="<?php echo $row['time'];?>" /></span></p>
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit2">发布</button>
              </div>
            </div>
          </div>
          
</form>
