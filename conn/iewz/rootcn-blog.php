<?php
require_once('../conn.php');


?>


<?php 
$sql="select * from book order by id DESC";
//order by 时间字段名 DESC    //时间从大到小
//order by 时间字段名 ASC     //时间从小到大								
$result=mysql_query($sql);
$num=mysql_num_rows($result);//数据总条数
$pagesize=5;//每页显示条数
@$page=$_GET['page'];//当前页数
if (empty($page)) {
	$page=1;
}
$totalpage=ceil($num/$pagesize);//总页数
$begin=($page-1)*$pagesize;
$sql=$sql." limit $begin,$pagesize";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
?>
	<?php
//$namea=$row['name_author'];
//$lj="do/in_js_css/images/us_ercenter/upload_avatar/";
//$jpe=".jpg";
//$quanju="$lj$namea/$namea$jpe";


?>

<?php if(@$_GET['obtains5'] == 'Articles5'){ ?>
<div>
						<span class="fh5co-post-date">时间：<?php echo $row['time'];?></span><br />
						<a target="_blank" href="http://www.gotcn.cn/content_detail.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?><span class="icon msg"></a>
						<span class="fh5co-post-date">作者：<?php echo $row['name_author'];?></span>					
						<!--<p>#</p>-->
					</div>	
<?php
} 
	if(@$_GET['obtains5']== ''){
?>
	<script>location='index.php';</script>
			<?php }?>
			<?php }?>