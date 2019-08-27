
<meta charset="gb2312">

<?php

//require_once('../cook_pd.php');



require_once('../../conn/conn.php');
$id=$_GET['id'];
$sql="select * from book where id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>
<style>
 iframe{ min-width:600px;}
 textarea{ max-height:600px}
 table{ margin:0 auto;}
</style>
<body>
<table border="0" width="100px">
<tr>
<th>PHP 代码调试</th>
<th></th>
<th></th>
</tr>

<tr>

<form action="./run2.php" target="run_iframe" method="post">
<td valign="top" align="center">
<form action="../do/do.php?do=up_liuyan&id=<?php echo $id; ?>" method="post">
<textarea name="php_code" style="margin: 0px; height: 417px; width: 313px;"><?php echo $row['content']; ?><?php echo file_get_contents('./run3.php');?></textarea>
</td>
<td valign="middle"><button type="submit" style=" width:60px;">执行</button></td>
</form>

<td valign="top"><iframe id="run_iframe" name="run_iframe" src="./run3.php"  style="margin: 0px; height: 417px; width: 313px;"></iframe></td>

</tr>
</table>
</body>
</html>
