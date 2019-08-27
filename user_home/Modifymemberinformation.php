<?php

require_once('io-ia.php');



require_once('../conn/conn.php');
$verifys=$_SESSION['username'];
//$id=$_GET['id'];
$sql="select * from user where username='$verifys'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);


$timepc=date("Y-m-d H:i ");
$user_times=$row['user_times'];
$user_id=$row['username'];
//echo $timepc;

/*
if ($user_times<$timepc) {
  echo "非VIP";
} elseif ($user_times>$timepc) {
  echo "VIP";
} else {
  echo "即将过期";
}
*/

?>



<!DOCTYPE html>
<html lang="zh-cn">
<head>
   
    <div class="row">
        <form action="../do/do.php?do=up_idname2&id=<?php echo $user_id; ?>" method="post" autocomplete="off" draggable="false">
          <div class="col-md-9">
            <h1 class="page-header">修改会员“<?php echo $row['username'];?>”的信息</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>账号：</span></h2>
              <div class="add-article-box-content">
                <?php echo $row['username'];?>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>注册时间：</span></h2>
              <div class="add-article-box-content">
                <? echo date("Y-m-d H:i:s ");?>
              </div>
            </div>
             <div class="add-article-box">
              <h2 class="add-article-box-title"><span>修改密码：</span></h2>
              <div class="add-article-box-content">
                请联系管理员进行修改
              </div>
              </div>
              <div class="add-article-box">
              <h2 class="add-article-box-title"><span>cook：</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="user_cook" id="user_cook" class="form-control"  value="<? echo $row['user_cook'];?>" required autocomplete="off">
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
                <input type="text" name="user_phone" id="user_phone" class="form-control"  value="<? echo $row['user_phone'];?>" required  autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>电子邮箱：</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="user_mail" id="user_mail" class="form-control"  value="<? echo $row['user_mail'];?>" required  autocomplete="off">
              </div>
            </div>

		</div>
          <div class="col-md-3">
            <h1 class="page-header">*</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>VIP：<?php if ($user_times<$timepc) {  echo "非VIP";} elseif($user_times>$timepc) {  echo "VIP";} else {  echo "即将过期";} ?></span></h2>
              <div class="add-article-box-content">
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
