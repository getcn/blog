
<meta charset="utf-8">
<?php
    //$path='../pb/vocabulary_judge'; //TXT文件的路径
?>
<!--<textarea name="textarea" id="textarea" cols="45" rows="5"><?php //readfile ($path); ?></textarea>-->
<?php
//$str= $path; //定义字符串 
//echo base64_encode($str);  // 输出编码后的内容为： d3d3LmpiNTEubmV0IOiEmuacrOS5i+Wutg==
//$str='xOO6ww==';     //定义字符串 
//echo base64_decode($path); //输出解码后的内容
?>
<!-- <textarea name="textarea" id="textarea" cols="45" rows="5"><?php //echo base64_encode($str); ?></textarea> 

<!------------------------------------>

<script>

function sub() {
    location.href = '../conn/sensitivewordss/mgc_scsc.php';
}
</script>

<!------------------------------------>


<form action=""  method="post" name="myform" >

<div class="col-md-9">
            <h1 class="page-header">词汇管理 <?php
$file = '../conn/sensitivewordss/vocabulary_judge';//写入文件名
if(isset($_POST['submit'])){
$content=$_POST['content'];
(!$handle = fopen($file,'w')) && die("无法打开文件<b></b>");//追加方式写入文件
//fopen()函数的文件模式总结
//r 只读——读模式，打开文件，从文件头开始读
//r+ 可读可写方式打开文件，从文件头开始读写
//w 只写——写方式打开文件，同时把该文件内容清空，把文件指针指向文件开始处。如果该文件已经存在，将删除文件已有内容；如果该文件不存在，则建立该文件
//w+ 可读可写方式打开文件，同时把该文件内容清空，把文件指针指向文件开始处。如果该文件不存在，则建立该文件
//a 追加 以只写方式打开文件，把文件指针指向文件末尾处。如果该文件不存在，则建立该文件
//a+ 追加 以可读可写方式打开文件，把文件指针指向文件末尾处。如果该文件不存在，则建立该文件
//b 二进制 用于于其他模式进行连接。建议使用该选项，以获得更大程度的可移植性
(!fwrite($handle, $content)) && die("写入文件<b></b>失败");
echo "文件写入成功！";
fclose($handle);//关闭文件
}
?></h1>
            <div class="form-group">
            </div>
            
<div class="add-article-box">
              <h2 class="add-article-box-title"><span>敏感词管理</span></h2>
              <div class="add-article-box-content">
              	<textarea class="form-control" name="content" id="content" style="margin: 0px; width: 679px; height: 287px;" autocomplete="off" ><?php  require("../conn/sensitivewordss/vocabulary_judge"); ?></textarea>
                <span class="prompt-text">敏感词管理是规范网页所显示的内容，具体词汇由管理者开发<span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>管理员</span></h2>
              <div class="add-article-box-content">
                <p><label><strong><?php echo $_SESSION['username'];?></strong></label></p>
                
              </div>
              <div class="add-article-box-footer">
               
                <?php //<button class="btn btn-default" type="button" ID="upImage">选择</button>?>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>检测</span></h2>
              <div class="add-article-box-content">
              <?php

$file = "../conn/sensitivewordss/vocabulary_judge";
$files = "../conn/sensitivewordss/cache/bad_words_cache";	  

if(file_exists($file))
{
    echo "写入文件存在";
}
else
{
     echo "写入文件不存在";
}

	echo "<p></p>";			  
				  
if(file_exists($files))
{
    echo "执行文件存在";
}
else
{
     echo "执行文件不存在";
}
				  
				  
?>
             
              </div>
              <div class="add-article-box-footer">
                <a href="#" onclick="sub();" target="_blank">点击生成执行文件</a>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              <div class="add-article-box-content">
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit">发布</button>
              </div>
            </div>
          </div>

</form>