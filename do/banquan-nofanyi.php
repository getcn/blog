<?php 
$sql="select * from homefirst";					
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
?>
<meta charset="utf-8">
<strong><?php echo $row['homecopyright'];?><br />
<a  href="http://www.miitbeian.gov.cn/" ><?php echo $row['homeicp'];?></a><br/>

<marquee scrollamount="2" width="300" style="width: 300px;">

</marquee></strong>
<?php }?>
