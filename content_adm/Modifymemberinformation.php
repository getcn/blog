<?php

require_once('io-ia.php');



require_once('../conn/conn.php');
$id=$_GET['id'];
$sql="select * from user where id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);


$timepc=date("Y-m-d H:i ");
$user_times=$row['user_times'];
?>



<!DOCTYPE html>
<html lang="zh-cn">
<head>
   
    <div class="row">
        <form action="../do/do.php?do=up_idname&id=<?php echo $id; ?>" method="post" autocomplete="off" draggable="false">
          <div class="col-md-9">
            <h1 class="page-header">修改会员“<?php echo $row['username'];?>”的信息</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>账号：</span></h2>
              <div class="add-article-box-content">
                <?php echo $row['username'];?>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>时间：</span></h2>
              <div class="add-article-box-content">
               注册时间： <? echo $row['user_time'];?><br/>
			   VIP过期时间： <?php echo $user_times; ?>
              </div>
            </div>
             <div class="add-article-box">
              <h2 class="add-article-box-title"><span>修改密码：<? echo $row['password'];?></span></h2>
              <div class="add-article-box-content">
                <input type="text" name="password" id="password" class="form-control"  value="后期修改为独立"  autocomplete="off">
              </div>
              </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>QQ：</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="user_qq" id="user_qq" class="form-control"  value="<? echo $row['user_qq'];?>" required autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>手机号码：</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="user_phone" id="user_phone" class="form-control"  value="<? echo $row['user_phone'];?>" required autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>电子邮箱：</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="user_mail" id="user_mail" class="form-control"  value="<? echo $row['user_mail'];?>" required autocomplete="off">
              </div>
            </div>

		</div>
          <div class="col-md-3">
            <h1 class="page-header">*</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>组：</span></h2>
              <div class="add-article-box-content">
                <input name="user_groups"  type="radio" id="0" value="管理组" checked="checked" />
          管理组
          <input type="radio" name="user_groups" value="" id="1" />
          非管理组&nbsp;
              </div>
            </div>
             <div class="add-article-box">
              <h2 class="add-article-box-title"><span>COOK：</span></h2>
              <div class="add-article-box-content">
                <input name="user_cook" type="radio" id="0" value="<? echo $row['user_cook'];?>" checked="checked" />
          旧COOK
          <input type="radio" name="user_cook" value="<?php require('phpbjq/cookid.php');?>" id="1" />
          新COOK&nbsp;
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>COOK账号为：</span></h2>
              <div class="add-article-box-content">
                <input name="user_developers" type="radio" id="0" value="开发者" checked="checked" />
          开发者 
          <input type="radio" name="user_developers" value="" id="1" />
          非开发者&nbsp;
              </div>
            </div>
			<div class="add-article-box">
              <h2 class="add-article-box-title"><span>VIP：<?php if ($user_times<$timepc) {  echo "非VIP";} elseif($user_times>$timepc) {  echo 'VIP用户';} else {  echo "即将过期";} ?></span></h2>
              <div class="add-article-box-content">
<input style="border: none;" id="user_times" name="user_times" type="datetime-local"><br/>

              </div>
            </div>
             <div class="add-article-box">
              <h2 class="add-article-box-title"><span>保存</span></h2>
              <div class="add-article-box-content"> <span class="prompt-text">请确定您对所有选项所做的更改</span> </div>
              <div class="add-article-box-footer">
                <!--<button class="btn btn-primary" type="submit" name="submit">更新</button>-->
                <input class="btn btn-primary button bg-main icon-check-square-o" type="submit" name="submit" id="submit" value="提交" />
      <input class="btn btn-primary button bg-main icon-check-square-o" type="reset" name="button" id="button" value="重置" />
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
