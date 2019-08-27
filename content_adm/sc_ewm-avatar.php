<?php

require_once('../conn/conn.php');
require_once('io-ia.php');

?>




<?php
$namea=$_SESSION['username'];
$lj="../do/in_js_css/images/us_ercenter/upload_avatar/";
$jpe="ewm.jpg";

?>


<?php
	//解码
	$tmp = base64_decode($_POST['imgOne']);

	//写文件
	file_put_contents("$lj$namea/$namea$jpe", $tmp);



	echo '{"msg":"上传成功!"}';
?>