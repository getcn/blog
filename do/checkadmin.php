<?php 
/* require_once('../conn/conn.php');
$username=$_POST['username'];
$password=md5($_POST['password']);
if($username==""||$password==""){
echo "<script>location.href='../content_adm/admin.php';</script>";
exit();
}
$sql="select * from user where username='$username'";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
if($num==0){
echo "<script>alert('�û��������ڣ�');location.href='../content_adm/admin.php';</script>";
exit();
}else{
$sql="select * from user where username='$username' and password='$password'";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
if($num==0){
echo "<script>alert('���벻��ȷ��');location.href='../content_adm/admin.php';</script>";
exit();
}else{
@session_start();
$_SESSION['username']=$username;
echo "<script>location.href='../cook-login.php';</script>";
}

mysql_close($con);

} */
?>
