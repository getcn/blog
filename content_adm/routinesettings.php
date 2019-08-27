<?php
require_once('io-ia.php');


?>
<?php 
$id=$_GET['id'];
$sql="select * from homefirst where id='$id'";					
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
	//判断
$result=mysql_query($sql);  
  
$row = mysql_fetch_array($result, MYSQL_ASSOC);  
  
    if (!mysql_num_rows($result))  
        {  
            echo "<script>location.href='home.php';</script>";  
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
	
      <div class="row">
        <form action="../do/do.php?do=settings_home&id=<?php echo $id; ?>" method="post" autocomplete="off" draggable="false">
          <div class="col-md-9">
            <h1 class="page-header">常规设置</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点标题</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="homeTitle" id="homeTitle" class="form-control"  value="<?php echo $row['homeTitle'];?>" required autofocus autocomplete="off"><!--placeholder="<?php //echo $row['homekeywords'];?>"-->
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>副标题</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="homeSubtitle" id="homeSubtitle" class="form-control"  value="<?php echo $row['homeSubtitle'];?>" autocomplete="off">
                <span class="prompt-text">用简洁的文字描述本站点。</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点地址（URL）</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="siteurl" class="form-control"  value="<?php echo $_SERVER['HTTP_HOST'];?>" required autocomplete="off">无需修改-自动获取
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点关键字</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" name="homekeywords" id="homekeywords"  autocomplete="off"><?php echo $row['homekeywords'];?></textarea>
                <span class="prompt-text">关键字会出现在网页的keywords属性中。</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点描述</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" name="homedescription" id="homedescription" rows="4"  autocomplete="off"><?php echo $row['homedescription'];?></textarea>
                <span class="prompt-text">描述会出现在网页的description属性中。</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>版权</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" name="homecopyright" id="homecopyright" rows="4"  autocomplete="off"><?php echo $row['homecopyright'];?></textarea>
                <span class="prompt-text">这是网站的版权。</span> </div>
            </div>
		</div>
          <div class="col-md-3">
            <h1 class="page-header">站点</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>ICP备案号</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="homeicp" id="homeicp" class="form-control"  value="<?php echo $row['homeicp'];?>" autocomplete="off" />
              </div>
			  <div class="add-article-box-footer">
                <input name="homebeian"  type="radio" id="0" value="显示备案" checked="checked" />
          显示备案
          <input type="radio" name="homebeian" value="关闭显示备案" id="1" />
          关闭显示备案&nbsp;</label>
               <span class="prompt-text">当前状态：<?php echo $row['homebeian'];?> </span> <br />
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>自动翻译-Google-translate</span></h2>
              <div class="add-article-box-content">
                <input name="hometranslate"  type="radio" id="0" value="opengooletranslate" checked="checked" />
          开放自动翻译-Google-translate
          <input type="radio" name="hometranslate" value="noopengooletranslate" id="1" />
          关闭自动翻译-Google-translate&nbsp;</label>
		  <br/>
               <span class="prompt-text">当前状态：<?php echo $row['hometranslate'];?></php></span> <br />
                <span class="prompt-text">开启后首页，文章浏览页面会有翻译功能。PS：因微软关闭自动翻译，现只保留Google自动翻译功能！</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点维护</span></h2>
              <div class="add-article-box-content">
                <input name="homeClose"  type="radio" id="0" value="1" checked="checked" />
          开放
          <input type="radio" name="homeClose" value="0" id="1" />
          关闭&nbsp;</label>
               <span class="prompt-text">当前状态：<?php echo $row['homeClose'];?></php></span> <br />
                <span class="prompt-text">主要为升级或维护时的主要功能</span> </div>
            </div>
              <div class="add-article-box">
              <h2 class="add-article-box-title"><span>ie兼容模式</span></h2>
              <div class="add-article-box-content">
                <input name="homeie6789"  type="radio" id="0" value="0" checked="checked" />
          不兼容
          <input type="radio" name="homeie6789" value="1" id="1" />
          兼容&nbsp;</label>
               <span class="prompt-text">当前状态：<?php echo $row['homeie6789'];?></php></span> <br />
                <span class="prompt-text">主要是拒绝低版本的IE进行浏览；不兼容则为拒绝，兼容则为允许</span> </div>
            </div>
             <div class="add-article-box">
              <h2 class="add-article-box-title"><span>保存</span></h2>
              <div class="add-article-box-content"> <span class="prompt-text">请确定您对所有选项所做的更改</span> </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit">更新</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php }?>