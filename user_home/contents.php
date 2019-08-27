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
          <li><a href="home.php?do=added_contents">增加图片-测试功能</a></li>
          <li><a href="home.php?do=added_content">增加文章</a></li>
          <!--<li><a href="home.php?do=added_contents_mian">增加免费订单</a></li>-->
        </ol>
        <h1 class="page-header">管理 <span class="badge"></span></h1>
        <div class="table-responsive">
		注意：如果审查下出现{Audit in progress}及文章正在审查！<br/>
		如审查通过后显示为{Pass}，如不通过为{Refuse Pass}。<br/>
		如果文章不通过可修改后在提交审核。<br/>
		文章如通过后将在您的首页显示共大家参考！<br/>
		如该文章被举报，投诉和用户举证有效的话，该文章会有可能被删除处理，严重时，该账号将被暂停和可能的删除！<br/>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">标题</span></th>
                <th><span class="glyphicon glyphicon-list"></span> <span class="visible-lg">审查</span></th>
                <th class="hidden-sm"><span class="glyphicon glyphicon-tag"></span> <span class="visible-lg">查询码</span></th>
                <th class="hidden-sm"><span class="glyphicon glyphicon-comment"></span> <span class="visible-lg">作者</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
         <?php    
		 
				$timepc=$_SESSION['username'];	
				//echo $timepc;
$sql="select * from book where name_author='$timepc'";
$result=$connn->query($sql);
if($result->num_rows>0)
{
while ($row=$result->fetch_assoc()) {
echo "<tr><tr><td><input type='checkbox' class='input-control' name='checkbox[]' value='' />".$row['id']."</td><td class='article-title'>".$row['name']."</td><td>".$row['content_Reviewarticle']."</td><td class='hidden-sm'>".$row['content_ordercoding']."</td><td class='hidden-sm'>".$row['name_author']."</td> <td>".$row['time']."</td><td><a target='_blank' href='../query_details.php?ordercoding=".$row['content_ordercoding']."'>查看</a>|<a rel='6' href='../do/do.php?do=del_liuyan&id=".$row['id']."&page=".$page."'>删除</a></td>";
}
}
?>
              </tr>
            </ul>
          </nav>
        </footer>

    </div>
  </div>







<?php mysql_close($con);?>
