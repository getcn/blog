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


   class Emp {
       public $name = '<?php echo $row["time"];?>';
       public $hobbies  = '<?php echo $row["time"];?>';
       //public $birthdates = "";
	   public $birthdate = '<?php echo $row["time"];?>';
   }
   $e = new Emp();
   $e->name = "sachin";
   $e->hobbies  = "sports";
   //$e->birthdates = date('m/d/Y h:i:s a', '8/5/1974 12:20:03 p');
   $e->birthdate = date('m/d/Y h:i:s a', strtotime("8/5/1974 12:20:03"));

   echo json_encode($e);
?>
			<?php }?>