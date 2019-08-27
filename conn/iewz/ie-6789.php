
<meta charset="utf-8">


<?php
$uarowser=$_SERVER['HTTP_USER_AGENT'];
 
if(strstr($uarowser, 'MSIE 6') || strstr($uarowser, 'MSIE 7') || strstr($uarowser, 'MSIE 8') || strstr($uarowser, 'MSIE 9')){
echo '
<title>对不起，本站不支持低版本ie浏览器！</title>
<body style="text-align: center"><div id="ie6-alertBox">
<div id="ie6-infoBar">
<h1>对不起，本站不支持低版本ie浏览器！</h1>
<p>站长表示实在是兼容不了低版本的IE浏览器，请升级你的IE浏览器。</p>
<p>推荐升级Google Chrome(谷歌浏览器)或其他浏览器或切换为极速模式，如果你对IE是真爱......那么请关闭本站吧。</p>
</div>
</div>
<div id="ie6-overlay"></div>
<style type="text/css">
#ie6-alertBox{width: 600px;margin-top: 160px;margin-right: auto;margin-bottom: 0px;margin-left: auto;padding: 20px;border: 1px solid #CCCCCC;text-align: center;font-family: "Microsoft YaHei", Verdana, sans-serif; line-height: 30px;} #ie6-infoBar h1{font-size: 22px;color: #ff0000;line-height: 60px;}
</style>
';
exit;//全面停止支持
}
?>