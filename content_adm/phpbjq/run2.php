
<meta charset="gb2312">
<?php
	$code = stripslashes($_POST['php_code']);
	 	 
	if(!strstr($code,'<!--֧�ִ󲿷ָ�ʽ��ʾ����-->'))
		$code = '<!--֧�ִ󲿷ָ�ʽ��ʾ����-->'.PHP_EOL.$code ;
		
	file_put_contents('run3.php',$code);	
	
	header("Location:./run3.php");
?>


