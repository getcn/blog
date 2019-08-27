<link rel="stylesheet" href="//res.layui.com/layui/build/css/layui.css" media="all">
<link rel="stylesheet" href="//res.layui.com/css/global.css" media="all">

 <script src="http://cdn.bootcss.com/jquery/1.12.3/jquery.min.js"></script>
  <script src="Modulars/layer/layer.js"></script>
  <div style="text-align: center">

  <a class="layui-btn layui-btn-primary" href="javascript:;" id="about" >点击获密码或取联系方式</a>
<script>
;!function(){


//页面一打开就执行，放入ready是为了layer所需配件（css、扩展模块）加载完毕
$('#about').on('click', function(){
  layer.open({
  type: 1
  ,title: false //不显示标题栏
  ,closeBtn: false
  
  ,shade: 0.8
  ,shadeClose: true
  ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
  ,resize: false
  ,btn: false 
  ,btnAlign: 'c'
  ,moveType: 1 //拖拽模式，0或者1
  ,content: '<strong><img  src="<?php echo $ewm ?>"><br/>以上二维码由作者提供<br />若二维码存在问题，请尽快通知管理审核 </strong>'
  ,success: function(layero){
    var btn = layero.find('.layui-layer-btn');
    btn.find('.layui-layer-btn0').attr({
      href: '#'
      ,target: '#'
    });
  }
});
});



}();
</script>
</div>