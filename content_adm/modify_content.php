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
            <h1 class="page-header">修改文章</h1>
            <div class="form-group">
              <label for="article-title" class="sr-only">标题</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="在此处输入标题" value="<?php echo $row['name']; ?>" required autofocus autocomplete="off">
            </div>
            <div >
              <label for="right" class="sr-only">内容</label>

          	<script id="container" name="content" type="text/plain"><?php echo $row['content']; ?></script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="../do/bd/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="../do/bd/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
	var ue = UE.getEditor('container');
	
    </script><br />
           
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>关键字</span></h2>
              <div class="add-article-box-content">
              	<input type="text" class="form-control" placeholder="请输入关键字" name="Keyword" id="Keyword" autocomplete="off" value="<?php echo $row['content_Keyword']; ?>">
                <span class="prompt-text">多个标签请用英文逗号,隔开。</span>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>描述</span></h2>
              <div class="add-article-box-content">
              	<textarea class="form-control" name="Explain" id="Explain" autocomplete="off" ><?php echo $row['content_Explain']; ?></textarea>
                <span class="prompt-text">描述是可选的手工创建的内容总结，并可以在网页描述中使用</span>
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
              <h2 class="add-article-box-title"><span>标签</span></h2>
              <div class="add-article-box-content">
                <input type="text" class="form-control" placeholder="输入新标签" name="Label" id="Label" autocomplete="off" value="<?php echo $row['content_Label']; ?>">
                <span class="prompt-text">多个标签请用英文逗号,隔开</span> </div>
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
              <h2 class="add-article-box-title"><span>审查：<?php echo $row['content_Reviewarticle'];?></span></h2>
              <div class="add-article-box-content">
                <p><label>审查结果：</label><input type="radio" id="Reviewarticles" name="Reviewarticles" value="Pass" checked/>Pass <input type="radio" id="Reviewarticles" name="Reviewarticles" value="Refuse Pass" />Refuse Pass</p>
              </div>
              <div class="add-article-box-footer">
               <span class="prompt-text"> 通过为{Pass}，不通过为{Refuse Pass}。<br/></span> 
                <?php //<button class="btn btn-default" type="button" ID="upImage">选择</button>?>
              </div>
            </div>
             <div class="add-article-box">
              <h2 class="add-article-box-title"><span>重设文章密码</span></h2>
              <div class="add-article-box-content">
                <input type="text" class="form-control" placeholder="<?php echo $row['content_Encryptedpassword'];?>" name="Encryptedpassword" id="Encryptedpassword" autocomplete="off">
                <span class="prompt-text">对原先文章密码进行重新设置</span><br />
                <span class="prompt-text">原密码为：<?php echo $row['content_Encryptedpassword'];?></span>
                 </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              <div class="add-article-box-content">
              	<p><label>状态：</label><span class="article-status-display">修改中</span></p>
                <p><label>公开度：</label><input type="radio" id="jiamiwenzi" name="jiamiwenzi" value="0" checked/>公开 <input type="radio" id="jiamiwenzi" name="jiamiwenzi" value="1" />加密</p>
                <p><label>修改时间：</label><span class="article-time-display"><input style="border: none;" type="datetime" id="content_time" name="content_time" value="<?php echo date("Y-m-d H:i:s ");?>" /></span></p>
				  <p><label>发布时间：<span class="article-time-display"><input style="border: none;" id="times" name="times" value="<?php echo $row['time']; ?>" ></span></label></p>
             <p>编写后时间将不再支持修改</p>
             <p>修改中公开度；默认会为您选择公开，您需要自行选择公开或加密</p>
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit2">发布</button>
              </div>
            </div>
          </div>
          
</form>
