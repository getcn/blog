<?php
// +----------------------------------------------------------------------
// | 使用demo - 获得验证码图片
// +----------------------------------------------------------------------
// | Copyright (c) 极资源 https://www.junphp.cn 
// +----------------------------------------------------------------------
// | Time: 2018-03-23
// +----------------------------------------------------------------------

# 引入测试的数据库model
require_once dirname(__FILE__).'/Model.php';
# 引入验证码核心类库
require_once dirname(dirname(__FILE__)).'/vendor/Vif.php';

$model = new Model('vif_type');
# 1、先获得随机出来的分类
$find  = $model->order('rand()')->find();
# 2、根据随机分类，获得指定数量的图片，你想几张都可以，越多越安全
$num   = 4;
$model = new Model('vif_img');
$yes_list  = $model->field('vi_id, vi_url')->where('vt_id = '.$find['vt_id'])->order('rand()')->limit($num)->select();
# 3、再随机，获得4张除了指定分类外的其他图片
$no_list  = $model->field('vi_id, vi_url')->where('vt_id != '.$find['vt_id'])->order('rand()')->limit($num)->select();

$obj = new Vif();
# 4、调用验证码类库：将两组图片随机打乱合并成一组新数据
$img_list = $obj->MergeImg($yes_list, $no_list, $find['vt_title']);

echo $img_list;