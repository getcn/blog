<?php
$hostdir=dirname(__FILE__).'/data/upload/admin/20170517/'; //Ҫ��ȡ���ļ���

$url = '/data/upload/admin/20170517/'; //ͼƬ�����ڵ�Ŀ¼

$filesnames = scandir($hostdir); //�õ����е��ļ�

//  print_r($filesnames);exit;
//��ȡҲ����ɨ���ļ����ڵ��ļ����ļ������������� $filesnames

$www = 'http://www.***.com/'; //����

foreach ($filesnames as $name) {
    $aurl= "<img width='100' height='100' src='".$www.$url.$name."' alt = '".$name."'>"; //ͼƬ
    echo $aurl . "<br/>"; //�����
}
--------------------- 
���ߣ�solly793755670 
��Դ��CSDN 
ԭ�ģ�https://blog.csdn.net/solly793755670/article/details/76572608 
��Ȩ����������Ϊ����ԭ�����£�ת���븽�ϲ������ӣ�
?>