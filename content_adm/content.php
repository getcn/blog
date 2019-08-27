<meta charset="utf-8">
       <link rel="stylesheet" href="../inos/css/pintuer.css">
    <link rel="stylesheet" href="../inos/css/admin.css">
        <script src="../inos/js/jquery.js"></script>
    <script src="../inos/js/pintuer.js"></script> 
<?php

require_once('../conn/conn.php');
require_once('io-ia.php');
?>

        <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a href="home.php?do=added_content">增加文章</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge"></span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">标题</span></th>
                <th><span class="glyphicon glyphicon-list"></span> <span class="visible-lg">栏目</span></th>
                <th class="hidden-sm"><span class="glyphicon glyphicon-tag"></span> <span class="visible-lg">标签</span></th>
                <th class="hidden-sm"><span class="glyphicon glyphicon-comment"></span> <span class="visible-lg">作者</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
             <?php 
$sql="select * from book order by id DESC";
$result=mysql_query($sql);
$num=mysql_num_rows($result);//数据总条数
$pagesize=100;//每页显示条数
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
              <tr>
                <td><input type="checkbox" class="input-control" name="checkbox[]" value="" /><?php echo $row['id'];?></td>
                <td class="article-title"><?php echo $row['name'];?></td>
                <td>这是栏目</td>
                <td class="hidden-sm"><?php echo $row['content_Label'];?></td>
                <td class="hidden-sm"><?php echo $row['name_author']; //echo $row['content'];?></td>
                <td><?php echo $row['time']; //echo $row['content'];?></td>
                <td><a href="home.php?do=modify_content&id=<?php echo $row['id'];?>">修改</a> | <a rel="6" href="../do/do.php?do=del_liuyan&id=<?php echo $row['id'];?>&page=<?php echo $page;?>">删除</a> | <a href="home.php?do=bjqphp&id=<?php echo $row['id'];?>">编辑器</a></td>
              </tr>
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
             总共有<?php echo $num;?>条数据，分<?php echo $totalpage;?>页

<?php 
if ($page==1) {
?>

首页 | 上页
<?php 
}else {
?>
<a href="home.php?do=content&pag=1">首页</a> | <a href="home.php?do=content&page=<?php echo $page-1;?>">上页</a>
<?php }?>

<?php 
if ($page==$totalpage) {
?>
下页 | 尾页
<?php 
}else {
?>
<a href="home.php?do=content&page=<?php echo $page+1?>">下页</a> | <a href="home.php?do=content&page=<?php echo $totalpage;?>">尾页</a>
<?php }?>
            </ul>
          </nav>
        </footer>

    </div>
  </div>


<br /><br />




<?php mysql_close($con);?>
