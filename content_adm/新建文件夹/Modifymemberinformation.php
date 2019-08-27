<?php

require_once('io-ia.php');



require_once('../conn/conn.php');
$id=$_GET['id'];
$sql="select * from user where id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>



<!DOCTYPE html>
<html lang="zh-cn">
<head>
   
    <title>修改会员<? echo $user; ?>的信息</title>  
    <link rel="stylesheet" href="../inos/css/pintuer.css">
    <link rel="stylesheet" href="../inos/css/admin.css">
    <script src="../inos/js/jquery.js"></script>
    <script src="../inos/js/pintuer.js"></script>  
</head>
<body>

<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改会员<? echo $user; ?>的信息</strong></div>
  <div class="body-content">
 <form action="../do/do.php?do=up_idname&id=<?php echo $id; ?>" method="post">
      <div class="form-group">
        <div class="label">
          <label>账号：</label>
        </div>
        <div class="field">
          <?php echo $row['username'];?>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>组：</label>
        </div>
        <div class="field"></div>
        <input name="user_groups"  type="radio" id="0" value="管理组" checked="checked" />
          管理组
          <input type="radio" name="user_groups" value="" id="1" />
          非管理组&nbsp;</label>
      </div>
      <div class="form-group">
        <div class="label">
          <label>时间：</label>
        </div>
        <div class="field">
          <input name="user_time" type="text" id="user_time" maxlength="20" value="<? echo date("Y-m-d H:i:s ");?>"/> 
        </div>
      </div>
      <div class="form-group" >
        <div class="label">
          <label>QQ：</label>
        </div>
        <div class="field">
          <input name="user_qq" type="text" id="user_qq" value="<? echo $row['user_qq'];?>" maxlength="20"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>手机号码：</label>
        </div>
        <div class="field">
         <input name="user_phone" type="text" id="user_phone" value="<? echo $row['user_phone'];?>" maxlength="20"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>电子邮箱：</label>
        </div>
        <div class="field">
          <input name="user_mail" type="text" id="user_mail" value="<? echo $row['user_mail'];?>" maxlength="30"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>COOK：</label>
        </div>
        <div class="field">
        <input name="user_cook" type="radio" id="0" value="<? echo $row['user_cook'];?>" checked="checked" />
          旧COOK
          <input type="radio" name="user_cook" value="<?php require('phpbjq/cookid.php');?>" id="1" />
          新COOK&nbsp;</label>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>COOK账号为：</label>
        </div>
        <div class="field">
          <input name="user_developers" type="radio" id="0" value="开发者" checked="checked" />
          开发者
          <input type="radio" name="user_developers" value="" id="1" />
          非开发者&nbsp;</label>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group" >
      <input class="button bg-main icon-check-square-o" type="submit" name="submit" id="submit" value="提交" />
      <input class="button bg-main icon-check-square-o" type="reset" name="button" id="button" value="重置" />
        <div class="label">
          
      
          <div class="tips"></div>
        </div>
      </div>
    </form>


  </div>
</div>
</body></html>
