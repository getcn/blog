<?php
// +----------------------------------------------------------------------
// | 使用demo - 提交验证码核对
// +----------------------------------------------------------------------
// | Copyright (c) 极资源 https://www.junphp.cn 
// +----------------------------------------------------------------------
// | Time: 2018-03-23
// +----------------------------------------------------------------------

# 引入验证码核心类库
require_once dirname(dirname(__FILE__)).'/vendor/Vif.php';
$vif = $_POST['id'];

$obj = new Vif();
# 4、调用验证码类库：将两组图片随机打乱合并成一组新数据
$img_list = $obj->VifResult($vif);

echo $img_list;