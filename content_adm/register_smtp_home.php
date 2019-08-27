<?php
require_once('io-ia.php');


?>
<?php 
$id=$_GET['id'];
$sql="select * from smtpserversmtp where id='$id'";					
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
	//判断
$result=mysql_query($sql);  
  
$row = mysql_fetch_array($result, MYSQL_ASSOC);  
  
    if (!mysql_num_rows($result))  
        {  
            echo "<script>location.href='home.php';</script>";  
        }  
    else  
        {  
           // echo mysql_num_rows($result)."\n";  
            //echo $row['game_id'];  
            //echo $row['task'];  
        }  
		//if($id=='0'){
	//echo "";
	//}else 
?>
	
      <div class="row">
        <form action="../do/do.php?do=smtp_smtpserversmtp&id=<?php echo $id; ?>" method="post" autocomplete="off" draggable="false">
          <div class="col-md-9">
            <h1 class="page-header">STMP</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>SMTP服务器</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="smtpsmtpserver" id="smtpsmtpserver" class="form-control"  value="<?php echo $row['smtpsmtpserver'];?>" required autofocus autocomplete="off"><!--placeholder="<?php //echo $row['homekeywords'];?>"-->
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>SMTP服务器的用户邮箱</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="smtpsmtpusermail" id="smtpsmtpusermail" class="form-control"  value="<?php echo $row['smtpsmtpusermail'];?>" required autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>SMTP服务器的用户帐号</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="smtpsmtpuser" id="smtpsmtpuser" class="form-control"  value="<?php echo $row['smtpsmtpuser'];?>" required autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>SMTP服务器的用户密码</span></h2>
              <div class="add-article-box-content">
                <input type="password" name="smtpsmtppass" id="smtpsmtppass" class="form-control"  value="<?php echo $row['smtpsmtppass'];?>" required autocomplete="off">
              </div>
            </div>
			  <div class="add-article-box">
              <h2 class="add-article-box-title"><span>SMTP端口列表</span></h2>
			  <div class="add-article-box-content"> <span class="prompt-text">阿里云企业邮箱POP、SMTP、IMAP地址列表如下：</span> </div>
			  <div class="add-article-box-content"> <span class="prompt-text" style="color:rgb(255, 0, 0);">推荐您使用加密端口连接，更加安全，使用时请注意加密端口是否已在您的本地电脑和网络中开放。</span> </div>
              <div class="add-article-box-content">
                <table border="1" style="width:500px;">
				<tbody>
				<tr>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;协议</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;服务器地址</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;服务器端口号（常规）</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;服务器端口号（加密）</span>
				</span>
				<br>
				</td>
				</tr>
				<tr>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;POP3</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;pop3.mxhichina.com</span>
				</span><br></td><td><span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;110</span>
				</span>
				<br>
				</td>
				<td>
				<span style="color:rgb(255, 0, 0);">
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;995</span>
				</span>
				</span>
				<br>
				</td>
				</tr>
				<tr>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;SMTP</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;smtp.mxhichina.com</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;25</span>
				</span>
				<br>
				</td>
				<td>
				<span style="color:rgb(255, 0, 0);">
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;465</span>
				</span>
				</span>
				<br>
				</td>
				</tr>
				<tr>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;IMAP</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;imap.mxhichina.com</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;143</span>
				</span>
				<br>
				</td>
				<td>
				<span style="color:rgb(255, 0, 0);">
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;993</span>
				</span>
				</span>
				<br>
				</td>
				</tr>
				</tbody>
				</table>
              </div>
			  
			  <hr>
			  <div class="add-article-box-content"> <span class="prompt-text">QQ邮箱 POP3 和 SMTP 服务器地址设置如下：</span> </div>
			  <!--<div class="add-article-box-content"> <span class="prompt-text" style="color:rgb(255, 0, 0);">推荐您使用加密端口连接，更加安全，使用时请注意加密端口是否已在您的本地电脑和网络中开放。</span> </div>-->
              <div class="add-article-box-content">
                <table border="1" style="width:500px;">
				<tbody>
				<tr>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;协议</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;服务器地址</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;服务器端口号（常规）</span>
				</span>
				<br>
				</td>
				</tr>
				<tr>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;POP3</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;pop.qq.com</span>
				</span><br></td><td><span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;995</span>
				</span>
				<br>
				</td>
				</tr>
				<tr>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;SMTP</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;smtp.qq.com</span>
				</span>
				<br>
				</td>
				<td>
				<span style="font-family:microsoft yahei;">
				<span style="font-size:14px;">&nbsp;465或587</span>
				</span>
				<br>
				</td>
				</tr>
				</tbody>
				</table>
              </div>

			  <hr>
			  
			  
			  
			  <hr>

			  
            </div>

		</div>
          <div class="col-md-3">
            <h1 class="page-header">站点</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>SMTP服务器端口</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="homeicp" id="homeicp" class="form-control"  value="<?php echo $row['smtpsmtpserverport'];?>" autocomplete="off" />
              </div>
            </div>
             <div class="add-article-box">
              <h2 class="add-article-box-title"><span>保存</span></h2>
              <div class="add-article-box-content"> <span class="prompt-text">请确定您对所有选项所做的更改</span> </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit">更新</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php }?>