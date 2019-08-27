<?php
$hostdir=dirname(__FILE__).'/data/upload/admin/20170517/'; //要读取的文件夹

$url = '/data/upload/admin/20170517/'; //图片所存在的目录

$filesnames = scandir($hostdir); //得到所有的文件

//  print_r($filesnames);exit;
//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames

$www = 'http://www.***.com/'; //域名

foreach ($filesnames as $name) {
    $aurl= "<img width='100' height='100' src='".$www.$url.$name."' alt = '".$name."'>"; //图片
    echo $aurl . "<br/>"; //输出他
}
--------------------- 
作者：solly793755670 
来源：CSDN 
原文：https://blog.csdn.net/solly793755670/article/details/76572608 
版权声明：本文为博主原创文章，转载请附上博文链接！
?>