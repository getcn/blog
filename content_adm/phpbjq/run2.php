
<meta charset="gb2312">
<?php
	$code = stripslashes($_POST['php_code']);
	 	 
	if(!strstr($code,'<!--支持大部分格式显示代码-->'))
		$code = '<!--支持大部分格式显示代码-->'.PHP_EOL.$code ;
		
	file_put_contents('run3.php',$code);	
	
	header("Location:./run3.php");
?>


