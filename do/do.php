<meta charset="utf-8">
<?php
require_once('../conn/conn.php');
if(!isset($_SESSION['username'])){  
    exit("<script>location='../content_adm/admin.php';</script>"); 
}
$do=$_GET['do'];
switch($do){
case'':
  //   session_unset('username');
//	 echo "<script>location.href='../content_adm/admin.php';</script>";



     break;
	 
	 case'del_liuyan';
	 $id=$_GET['id'];
	 $page=$_GET['page'];
     $sql="delete from book where id='$id'";
	 mysql_query($sql);
	 echo "<script>alert('删除成功');location.href='../content_adm/home.php?do=content&page=$page';</script>";

     break;
	 
	
	 
	 case'tianjia_liuyan';//添加文章
	 $id=$_GET['id'];
	 $name=$_POST['name'];
	 $content=$_POST['content'];
	 $time=$_POST['time'];
	 $name_author=$_POST['author'];
	 $content_Label=$_POST['Label'];
	 $content_Keyword=$_POST['Keyword'];
	 $content_Explain=$_POST['Explain'];
	 $content_time=$_POST['times'];
	 $content_Encryptedpassword=$_POST['Encryptedpassword'];
	 $content_jiamiwenzi=$_POST['jiamiwenzi'];
	 $content_Reviewarticle='Pass';
	 $sql="insert into book(name,content,time,name_author,content_Label,content_Keyword,content_Explain,content_time,content_Encryptedpassword,content_jiamiwenzi,content_Reviewarticle) values('$name','$content','$time','$name_author','$content_Label','$content_Keyword','$content_Explain','$content_time','$content_Encryptedpassword','$content_jiamiwenzi','$content_Reviewarticle')";
	 mysql_query($sql);
	 echo "<script>alert('发布成功');location.href='../content_adm/home.php?do=content';</script>";

     break;
	 
	 case'tianjia_liuyan2';//添加文章
	 $id=$_GET['id'];
	 $name=$_POST['name'];
	 $content=$_POST['content'];
	 $time=$_POST['time'];
	 $name_author=$_SESSION['username'];
	 $content_Label=$_POST['Label'];
	 $content_Keyword=$_POST['Keyword'];
	 $content_Explain=$_POST['Explain'];
	 $content_time=$_POST['times'];
	 $content_Encryptedpassword=$_POST['Encryptedpassword'];
	 $content_jiamiwenzi=$_POST['jiamiwenzi'];
	 $content_url_photo=$_POST['timesp'];
	 $content_ordercoding=$_POST['ordercoding'];
	 $content_Reviewarticle='Audit in progress';
	 $sql="insert into book(name,content,time,name_author,content_Label,content_Keyword,content_Explain,content_time,content_Encryptedpassword,content_jiamiwenzi,content_url_photo,content_ordercoding,content_Reviewarticle) values('$name','$content','$time','$name_author','$content_Label','$content_Keyword','$content_Explain','$content_time','$content_Encryptedpassword','$content_jiamiwenzi','$content_url_photo','$content_ordercoding','$content_Reviewarticle')";
	 mysql_query($sql);
	 //$myfile = fopen("userphoto/time/user/".$_SESSION['username']."/".date("Y-m-d"), "w");
	 $times='0';
     $sql="update user set user_timesp='$times' where username='$name_author'";
	 mysql_query($sql);	
	 echo "<script>alert('发布成功');location.href='../user_home/home.php?do=contents';</script>";
	
		
		
     break;	
		
		
		 case'up_liuyan';//修改文章
	 //session_unset('username');
	 $id=$_GET['id'];
	 $name=$_POST['name'];
	 $content=$_POST['content'];
	 $content_times=$_POST['content_time'];
	 $content_Label=$_POST['Label'];
	 $content_Keyword=$_POST['Keyword'];
	 $content_Explain=$_POST['Explain'];
	 $content_Encryptedpassword=$_POST['Encryptedpassword'];
	 $content_jiamiwenzi=$_POST['jiamiwenzi'];
	 $content_Reviewarticle=$_POST['Reviewarticles'];
     $sql="update book set name='$name',content='$content',content_Label='$content_Label',content_Keyword='$content_Keyword',content_Explain='$content_Explain', content_Encryptedpassword='$content_Encryptedpassword',content_jiamiwenzi='$content_jiamiwenzi',content_Reviewarticle='$content_Reviewarticle',content_time='$content_times' where id='$id'";
	 mysql_query($sql);
	 echo "<script>alert('修改成功');location.href='../content_adm/home.php?do=modify_content&id=$id';</script>";

		 break;
		
		
		 case'up_idname';//用户
	 //session_unset('username');
		$id=$_GET['id'];
	
	 //$time=$_POST['user_time'];
	 $times=str_replace("T"," ",$_POST['user_times']);
	 $qq=$_POST['user_qq'];
     $phone=$_POST['user_phone'];
	 $mail=$_POST['user_mail'];
     $user_cook=$_POST['user_cook'];
     $user_developers=$_POST['user_developers'];
	 $user_groups=$_POST['user_groups'];
	 //$password=md5($_POST['password']);
     $sql="update user set user_times='$times',user_qq='$qq',user_phone='$phone',user_mail='$mail',user_cook='$user_cook',user_developers='$user_developers',user_groups='$user_groups' where id='$id'";
     //$sql="update user set user_times='$times',user_time='$time',user_qq='$qq',user_phone='$phone',user_mail='$mail',user_cook='$user_cook',user_developers='$user_developers',user_groups='$user_groups',password='$password' where id='$id'";
	 mysql_query($sql);
	 echo "<script>alert('修改成功');location.href='../content_adm/home.php?do=id_content';</script>";
	
	 break;	
    
		case'up_idname2';//用户2
	 //session_unset('username');
		$ids=$_SESSION['username'];
	
	 //$time=$_POST['user_time'];
	 //$times=str_replace("T"," ",$_POST['user_times']);
	 $qq=$_POST['user_qq'];
     $phone=$_POST['user_phone'];
	 $mail=$_POST['user_mail'];
     //$user_cook=$_POST['user_cook'];
     $user_developers=$_POST['user_developers'];
	 $user_groups=$_POST['user_groups'];
	 //$password=md5($_POST['password']);
     $sql="update user set user_qq='$qq',user_phone='$phone',user_mail='$mail',user_developers='$user_developers',user_groups='$user_groups' where username='$ids'";
	 mysql_query($sql);
	 echo "<script>alert('修改成功');location.href='../user_home/home.php?do=id_userxg';</script>";
	
	 break;	
	
	case'settings_home';//系统
	 //session_unset('username');
	 $id=$_GET['id'];
	 $title=$_POST['homeTitle'];
	 $Subtitle=$_POST['homeSubtitle'];
	 $copyright=$_POST['homecopyright'];
	 $icp=$_POST['homeicp'];
	 $keywords=$_POST['homekeywords'];
	 $description=$_POST['homedescription'];
	 $Close=$_POST['homeClose'];
	 $ie6789=$_POST['homeie6789'];
	 $beians=$_POST['homebeian'];
	 $translategoole=$_POST['hometranslate'];
     $sql="update homefirst set homeSubtitle='$Subtitle',homecopyright='$copyright',homeicp='$icp',homekeywords='$keywords',homedescription='$description',homeClose='$Close',homeTitle='$title',homeie6789='$ie6789',homebeian='$beians',hometranslate='$translategoole' where id='$id'";
	 mysql_query($sql);
	 echo "<script>alert('修改成功');location.href='../content_adm/home.php?do=home_settings&id=$id';</script>";

	
    break;	
    case'smtp_smtpserversmtp';//系统
	 //session_unset('username');
	 $id=$_GET['id'];
	 $smtpsmtpserver=$_POST['smtpsmtpserver'];
	 $smtpsmtpusermail=$_POST['smtpsmtpusermail'];
	 $smtpsmtpuser=$_POST['smtpsmtpuser'];
	 $smtpsmtppass=$_POST['smtpsmtppass'];
	 $smtpsmtpserverport=$_POST['smtpsmtpserverport'];

     $sql="update smtpserversmtp set smtpsmtpserver='$smtpsmtpserver',smtpsmtpusermail='$smtpsmtpusermail',smtpsmtpuser='$smtpsmtpuser',smtpsmtppass='$smtpsmtppass',smtpsmtpserverport='$smtpsmtpserverport' where id='$id'";
	 mysql_query($sql);
	 echo "<script>alert('修改成功');location.href='../content_adm/home.php?do=smtp_register_home&id=$id';</script>";
	
		default:
		

	 
}

?>