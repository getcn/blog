
<?php

$mll="phpbjq";
$txtx=".php";
$txcn="run3";


?>

<?php

$myfile = fopen("$mll/$txcn$txtx", "w") or die("Unable to open file!");
$txt = file_get_contents('run3');
fwrite($myfile, $txt);
fclose($myfile);
?>



<meta charset="utf-8">

       <link rel="stylesheet" href="../inos/css/pintuer.css">
    <link rel="stylesheet" href="../inos/css/admin.css">
        <script src="../inos/js/jquery.js"></script>
    <script src="../inos/js/pintuer.js"></script> 
    
<?php

require_once('io-ia.php');
require_once('../conn/conn.php');
$id=$_GET['id'];
$sql="select * from book where id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>

<form action="phpbjq/run2.php" target="run_iframe" method="post">
<table width="200" border="0">
<table class="table table-hover text-center">
    <tr>
      <td valign="middle" style="text-align: left"><button class="btn-default btn-white" type="submit" style=" width:60px;">执行</button></td>
      <td valign="middle" style="text-align: left"><strong>在线编辑器：<br />主要是测试代码是否正常，但每次打开编辑器将会重新创建为新的编辑器！</strong></td>
    </tr>
    <tr>
      <td style="text-align: center" ><strong>编辑器</strong></td>
      <td style="text-align: center"><strong>调试显示</strong></td>
    </tr>
    <tr>
      <td valign="top" align="center"><textarea name="php_code" style="margin: 0px; width: 451px; height: 401px;"><?php echo $row['content']; ?><?php echo file_get_contents('./run3.php');?></textarea></td>
      <td valign="top"><iframe id="run_iframe" name="run_iframe" src="phpbjq/run3.php"  style="margin: 0px; width: 451px; height: 401px;"></iframe></td>
    </tr>
</table>

