
<?php 

$sql="select * from homefirst";					
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
?>



<?php

$loginadmin=$_SESSION['username'];
$logins=$_SESSION['username'];
$httpzc=$_SERVER["HTTP_HOST"];
if(strstr($loginadmin,$logins))
echo "<strong><td>登录者: <span>","<a target=_blank href=",'http://',$httpzc,"/","content_adm/home.php>","$loginadmin","</span>","</a></strong><br />";
else 
echo "<strong><a href=",'http://',$httpzc,"/","zc/zc.php?tj=register>",'注册',"</a>","|","<a href=",'http://',$httpzc,"/","content_adm/admin.php>",'登录',"</a></strong><br />";
	
?>
<!--<strong><a href="<?php //echo "http://".$_SERVER["HTTP_HOST"]."/" ?>">注册</a>|<a href="<?php //echo "http://".$_SERVER["HTTP_HOST"]."/" ?>">登录</a></strong><br />-->
<strong><?php echo $row['homecopyright'];?><br />

<?php

$beianAB=$row['homebeian'];
$beianB="显示备案";
if($beianAB === $beianB)
echo "<a href='http://www.miitbeian.gov.cn/' >",$row['homeicp'],"</a><br/>";
else 
echo "";
	
?>
<?php
//$dizhi='CN';
//if ($banned['data']['country_id'] === $dizhi) {
  
  //require('fanyi/Microsoft-Translator.php');//国内IP时
//} else {
  //require('fanyi/google-translate.php');//国外IP时
/*/本地测试时修改为国内，服务器时使用国外/*/ 
//	require('fanyi/Microsoft-Translator.php');//国内IP时
//}

$translateAB=$row['hometranslate'];
$translateB="opengooletranslate";
if($translateAB === $translateB)
require_once('fanyi/google-translate.php');
else 
echo "";

?>

<marquee scrollamount="2" width="300" style="width: 300px;">

</marquee></strong>
<?php }?>
