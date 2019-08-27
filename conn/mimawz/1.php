    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!--<link href="css/style.css" rel="stylesheet" />-->
        <!-- CSS -->
        <!-- Javascript Files -->
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.pagination.js"></script>
	<script type="text/javascript" src="js/jquery.knob.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
         <!-- Javascript Files -->
        
        <!--html开始-->
        <?php

	$mima=$row["content_Encryptedpassword"];
	//echo $mima.'<br />';
	//echo $row["id"].'<br />';

?>
<?php //输入密码后访问本页内容
$password = $mima ;//这里是密码 
$p = "";if(isset($_COOKIE["isview"]) and $_COOKIE["isview"] == $password){ 
$isview = true;}else{ 
if(isset($_POST["pwd"])){ 
if($_POST["pwd"] == $password){ 
setcookie("isview",$_POST["pwd"],time()+60);$isview = true;}else{$p = (empty($_POST["pwd"])) ? "需要密码才能查看，请输入密码。" : "<div style=\"color:#F00;\">密码不正确，请重新输入。</div>";} 
}else{$isview = false;$p = "请输入密码查看，获取密码可联系我。".'<br>'."输入后请刷新页面即可显示内容";}}?>
<?php if($isview){?>
 <?php }else{?>
    
        

 <div class="col-md-6" >
   <p class="lead text-muted"></p>
  <div class="lt-navs">
    <div class="panel-group" id="accordion">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> 尊敬的用户！文章被加密！您需输入密码方可查看！ </a> </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
         <form action="" method="post" style="margin:0px;">
          <div class="panel-body" >
           <input class="form-control" type="password" name="pwd" placeholder="输入密码" /> 
           <input  class="btn btn-success" type="submit" value="查看" /> <br />
           
           
           <?php echo $p;?> 
           </div>
          </form> 

        </div>
      </div>
      <!--
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">  #2 </a> </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
          <div class="panel-body"> . </div>
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">  #3 </a> </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
          <div class="panel-body"> . </div>
        </div>
      </div>-->
    </div>
  </div>
</div>

<?php }?>