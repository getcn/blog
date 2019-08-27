
<?php 

require_once('io-ia.php');
?>
<?php 
$sql="select * from homefirst";	

$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

?>
<?php

$jr=$row['homeie6789'];
$xx="不兼容";
if(strstr($jr,$xx))
require_once('../conn/iewz/ie-6789.php');
else 
echo "";
	
?>


<?php }?>
 <script language="javascript">
    function delcfm() {
        if (!confirm("确认要删除？")) {
           return false;
        }
    }
</script>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>会员中心</title>
<link rel="stylesheet" type="text/css" href="js/ccjs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="js/ccjs/css/style.css">
<link rel="stylesheet" type="text/css" href="js/ccjs/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="js/ccjs/images/icon/icon.png">
<link rel="shortcut icon" href="js/ccjs/images/icon/favicon.ico">
<script src="js/ccjs/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://pv.sohu.com/cityjson?ie=utf-8" charset="utf-8"></script>
<!--[if gte IE 9]>
  <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="js/html5shiv.min.js" type="text/javascript"></script>
  <script src="js/respond.min.js" type="text/javascript"></script>
  <script src="js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>

<body class="user-select">
<section class="container-fluid">
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="/">会员中心</a> </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a data-toggle="modal" data-target="#areDeveloping" >消息 <span class="badge">1</span></a></li>
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu-left">
                <li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>
                <li><a title="查看您的登录记录" data-toggle="modal" data-target="#seeUserLoginlog">登录记录</a></li>
                <li><a href="?tj=destroy" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
              </ul>
            </li>
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">功能 <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu-left">
             <li><a href="home.php?do=contents" target="_blank">文章</a></li>
              </ul>
            </li>
            <li><a data-toggle="modal" data-target="#WeChat">联系</a></li>
          </ul>
          <form action="" method="post" class="navbar-form navbar-right" role="search">
            <div class="input-group">
              <input type="text" class="form-control" autocomplete="off" placeholder="该功能未上线" maxlength="15">
              <span class="input-group-btn">
              <button class="btn btn-default" type="submit"  title="该功能未上线" >搜索</button>
              </span> </div>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <div class="row">
    <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
      <ul class="nav nav-sidebar">
        <li class="active"><a href="home.php?do=contents" target="_blank">文章</a></li>
		<li><a href="home.php?do=id_userxg">修改账号</a></li>
      </ul>

      <ul class="nav nav-sidebar">
      </ul>
    </aside>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
     <?php echo '<!---
      <h1 class="page-header">信息总览</h1>
      <div class="row placeholders">
        <div class="col-xs-6 col-sm-3 placeholder">
          <h4>文章</h4>
          <span class="text-muted">0 条</span> </div>
        <div class="col-xs-6 col-sm-3 placeholder">
          <h4>评论</h4>
          <span class="text-muted">0 条</span> </div>
        <div class="col-xs-6 col-sm-3 placeholder">
          <h4>友链</h4>
          <span class="text-muted">0 条</span> </div>
        <div class="col-xs-6 col-sm-3 placeholder">
          <h4>访问量</h4>
          <span class="text-muted">0</span> </div>
      </div>
	  -->'
		  ?>
     <!--个人信息模态框-->
<div class="modal fade" id="seeUserInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" >个人信息</h4>
        </div>
        <div class="modal-body">
          <table class="table" style="margin-bottom:0px;">
            <thead>
              <tr> </tr>
            </thead>
            <tbody>
              <tr>
                <td wdith="20%">姓名:</td>
                <td width="80%"><input type="text" value="<?php echo $_SESSION['username']; ?>" class="form-control" name="truename" maxlength="10" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">用户名:</td>
                <td width="80%"><input type="text" value="<?php echo $_SESSION['username']; ?>" class="form-control" name="username" maxlength="10" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">电话:</td>
                <td width="80%"><input type="text" value="<?php echo $_SESSION['username']; ?>" class="form-control" name="usertel" maxlength="13" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">旧密码:</td>
                <td width="80%"><input type="password" class="form-control" name="old_password" maxlength="18" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">新密码:</td>
                <td width="80%"><input type="password" class="form-control" name="password" maxlength="18" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">确认密码:</td>
                <td width="80%"><input type="password" class="form-control" name="new_password" maxlength="18" autocomplete="off" /></td>
              </tr>
            </tbody>
            <tfoot>
              <tr></tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
         暂时不支持修改
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary">提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!--个人登录记录模态框-->
<div class="modal fade" id="seeUserLoginlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >登录记录</h4>
      </div>
      <div class="modal-body">
          <table class="table" style="margin-bottom:0px;">
            <thead>
              <tr>
                <th>登录IP</th>
                <th>登录时间</th>
                <th>状态</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php 

echo $_SERVER["REMOTE_ADDR"];
?></td>
                <td><?php echo date("Y-m-d H:i:s"); ?></td>
                <td>成功</td>
                功能还在开发中
              </tr>
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>
<!--微信二维码模态框-->
<div class="modal fade user-select" id="WeChat" tabindex="-1" role="dialog" aria-labelledby="WeChatModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:120px;max-width:280px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="WeChatModalLabel" style="cursor:default;">联系/扫一扫</h4>
      </div>
      <div class="modal-body" style="text-align:center"> <img src="../do/in_js_css/images/us_ercenter/upload_avatar/admin/adminewm.jpg" alt="" style="cursor:pointer"/><br/>正在架设中</div>
    </div>
  </div>
</div>
<!--提示模态框-->
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog" aria-labelledby="areDevelopingModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
      </div>
      <div class="modal-body"> <img src="js/ccjs/images/baoman/baoman_01.gif" alt="深思熟虑" />
        <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>
<!--右键菜单列表-->
<div id="rightClickMenu">
  <ul class="list-group rightClickMenuList">
    <li class="list-group-item disabled"></li>
    <li class="list-group-item"><span>IP：</span></li>
    <li class="list-group-item"><span>地址：</span></li>
    <li class="list-group-item"><span>系统：</span> </li>
    <li class="list-group-item"><span>浏览器：</span></li>
  </ul>
</div>
<script src="js/ccjs/js/bootstrap.min.js"></script> 
<script src="js/ccjs/js/admin-scripts.js"></script>
      <h1 class="page-header">状态</h1>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <tbody>
            <tr>
              <td>登录者: <span><?php echo $_SESSION['username']; ?></span>
              
				<?php 
$timepc=$_SESSION['username'];	
$user_times="admin"; 
if ($user_times<>$timepc) {  
	echo "";
} elseif($user_times===$timepc) {
	echo "<script>alert('跳转会员后台');location='../content_adm/home.php';</script>";} 
else {  
	echo "";} 
?>

            </tr>
            <tr>
              
            </tr>
          </tbody>
        </table>
      </div>
      <h1 class="page-header"></h1>
      <div class="table-responsive">
        <td width="1024" valign="top">

    <?php 
	@$do=$_GET['do'];
    if($do=='content'){
	include_once('content.php');//VIP新增订单
	}else	
	if($do=='id_userxg'){
	include_once('Modifymemberinformation.php');//会员账号修改
	}else  
	if($do=='contents'){
	include_once('contents.php');//管理文章
	}else	
	if($do=="modify_content"){
	include_once('modify_content.php');//修改文章
	}else
	if($do=="added_contents_mian"){
	include_once('added_contents_mian.php');//新增文章
	}else	
	if($do=="added_content"){
	include_once('added_content.php');//VIP新增文章
	}else	
	if($do=="added_contents"){
	include_once('added_contents.php');//VIP图片上传
	}else{
	}

	?></td>
      </div>
      <footer>
        <h1 class="page-header"></h1>
        <div class="table-responsive">
        <table class="table table-striped table-hover">
          <tbody>
            <tr>
              
            </tr>
            <tr>
              <td></td>
            </tr>
          </tbody>
        </table>
        </div>
      </footer>
    </div>
  </div>
</section>

</body>
</html>




