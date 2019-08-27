<?php
include_once("../../conn/conn.php");

$verify = stripslashes(trim($_GET['verify']));
$nowtime = time();

$sql = "SELECT id,token_exptime FROM `user` WHERE status='0' AND token=:token";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':token' => $verify
));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) {
	if ($nowtime > $row['token_exptime']) { //30min
		$msg = '您的激活有效期已过，请登录您的帐号重新发送激活邮件.';
	} else {
        $sql_update = "UPDATE `user` SET status=1 WHERE id=:id";
        $stmt_update = $db->prepare($sql_update);
        $stmt_update->execute(array(
            ':id' => $row['id']
        ));
        if ($stmt->rowCount()) {
            $msg = "<script>alert('恭喜激活的帐号！现在返回登陆');location='../../content_adm/home.php';</script>";
        } else {
            $msg = "<script>alert('error');location='../../content_adm/home.php';</script>";
        }
	}
} else {
	$msg = "<script>location='../../content_adm/home.php';</script>";	
}
?>

   <div class="demo">
   		<h3><?php echo $msg;?></h3>
	</div>
