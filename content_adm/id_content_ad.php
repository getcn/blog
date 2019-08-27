


<!DOCTYPE html>
<html lang="zh-cn">
<head>
   <meta charset="utf-8">
    <title></title>  
    <link rel="stylesheet" href="../inos/css/pintuer.css">
    <link rel="stylesheet" href="../inos/css/admin.css">
    <script src="../inos/js/jquery.js"></script>
    <script src="../inos/js/pintuer.js"></script>  
</head>
<body>
<form method="post" action="">
  
<?php

require_once('../conn/conn.php');
require_once('io-ia.php');
?>

<?php
	//判断用户权限
	//if($_SESSION['member'] != "admin"){
	//echo "<script>alert('请进行登陆');location='index.php';</script>";
	//}
	//分页显示
	$sql="select * from user order by id asc";
	$result=mysql_query($sql);
	$total=mysql_num_rows($result);
	$page=isset($_GET['page'])?intval($_GET['page']):1;  
	$info_num=500; 
	$pagenum=ceil($total/$info_num); 
	If($page>$pagenum || $page == 0){
       Echo "Error : Can Not Found The page .";
       Exit;
	}
	$offset=($page-1)*$info_num; 
	$info=mysql_query("select * from user order by id desc limit $offset,$info_num"); 
	
?>
<?php
	//删除用户
	if($_GET["tj"]=="del"){
	mysql_query($sql="delete from user where username='".$_GET['user']."'");
	echo "<script>alert('删除成功');location='home.php?do=id_content';</script>";
	}
?>

       <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a href="#">添加账号</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge"></span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">账号</span></th>
                <th><span class="glyphicon glyphicon-list"></span> <span class="visible-lg">cook</span></th>
                <th class="hidden-sm"><span class="glyphicon glyphicon-tag"></span> <span class="visible-lg">developers</span></th>
                <th class="hidden-sm"><span class="glyphicon glyphicon-comment"></span> <span class="visible-lg">number</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
             <?php while($rs=mysql_fetch_array($info)){ ?>
              <tr>
                <td><input type="checkbox" class="input-control" name="checkbox[]" value="" /><?php echo $rs['id'];?></td>
                <td class="article-title"><?php echo $rs['username'];?></td>
                <td class="hidden-sm"><?php echo $rs['user_cook'];?></td>
                <td class="hidden-sm"><?php echo $rs['user_developers'];?></td>
                <td class="hidden-sm"><?php echo $rs['user_number']; //echo $row['content'];?></td>
                <td class="hidden-sm"><?php echo $rs['user_time']; //echo $row['content'];?></td>
                <td style="text-align: left"><?php echo "<a class='button border-green' href='home.php?do=id_userxg&id=".$rs['id']."'>修改</a>&nbsp&nbsp";?>
		        <?php
              $sqluseradmin=$rs['username'];//查询是否兼容浏览器/1：兼容/0：不兼容
              $useradmin="admin";//不兼容
              if(strstr($sqluseradmin,$useradmin))
              echo '';
              else 
              echo "<a class='button border-red' href='home.php?do=id_content&tj=del&user=".$rs['username']."'><span class='icon-trash-o'>删除</span></a>"
            ?>
			<?php //echo "<a class='button border-red' href='home.php?do=id_content&tj=del&user=".$rs['username']."'><span class='icon-trash-o'>删除</span></a>" ?>	 <!--<?php //cheo <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> 删除</a> ?>--> <td style="text-align: left"></div><td style="text-align: left"></td><td style="text-align: left"></td>
              <?php }?>
            </tbody>
          </table>
        </div>
        <footer class="message_footer">
          <nav>
            <div class="btn-toolbar operation" role="toolbar">
              <div class="btn-group" role="group"> <a class="btn btn-default" onClick="select()">全选</a> <a class="btn btn-default" onClick="reverse()">反选</a> <a class="btn btn-default" onClick="noselect()">不选</a> </div>
              <div class="btn-group" role="group">
                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="删除全部选中" name="checkbox_delete">删除</button>
              </div>
            </div>
            
            <ul class="pagination pagenav">
             <td colspan="8" style="text-align: left"><div class="pagelist"> <?php
	if( $page > 1 )
    {
    	echo "<a href='home.php?do=id_content&page=".($page-1)."'>前一页</a>&nbsp";
	}else{
   	echo "前一页&nbsp&nbsp";
	}
	for($i=1;$i<=$pagenum;$i++){
       $show=($i!=$page)?"<a href='?page=".$i."'>".$i."</a>":"$i";
       Echo $show." ";
	}
	if( $page<$pagenum)
    {
    	echo "<a href='home.php?do=id_content&?page=".($page+1)."'>后一页</a>";
	}else
	{
		echo "后一页";
     }
?> </div></td>
            </ul>
          </nav>
        </footer>

    </div>
  </div>


<br /><br />

</form>

<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>