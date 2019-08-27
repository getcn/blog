
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
    //location.href = '../pb/mgc_scsc.php';
}
</script>

<!------------------------------------>


<form action=""  method="post" name="myform" >

<div class="col-md-9">
            <h1 class="page-header">地区管理 <?php
$file = '../conn/ipdiqu/ipdiquku/ipku';//写入文件名
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
              <h2 class="add-article-box-title"><span>地区库管理</span></h2>
              <div class="add-article-box-content">
              	<textarea class="form-control" name="content" id="content" style="margin: 0px; width: 679px; height: 287px;" autocomplete="off" ><?php  require("../conn/ipdiqu/ipdiquku/ipku"); ?></textarea>
                <span class="prompt-text">地区库管理主要编写地方缩写；例如自动获取：<?php echo  $banned['data']['country_id']; ?><br />编写注意：一个地区只能一行<br />编写后程序将自动获取<span>
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

$ipku = "../conn/ipdiqu/ipdiquku/ipku";
  

if(file_exists($ipku))
{
    echo "写入文件存在";
}
else
{
     echo "写入文件不存在";
}				  
				  
				  
?>
             
              </div>
              <div class="add-article-box-footer">
                
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