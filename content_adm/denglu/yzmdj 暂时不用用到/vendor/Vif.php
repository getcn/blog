<?php
// +----------------------------------------------------------------------
// | 仿12306点图验证码
// +----------------------------------------------------------------------
// | Copyright (c) 极资源 https://www.junphp.cn 
// +----------------------------------------------------------------------
// | Time: 2018-03-22
// +----------------------------------------------------------------------

class Vif{
    private $KEY = 'jun_vif_key'; // session的key名

    /**
     * ①用于将分类图片和随机图片打乱组合,并记录需要验证的session
     *
     * @author 小黄牛
     * @param array  $yes_list 指定分类的图片数组
     * @param array  $no_list  随机的混淆图片数组
     * @param string $title    分类名称，用于生成描述文字
     * @param string $id       图片主键id的字段名
     * @return array 合并完成的图片
     * 
     */
    public function MergeImg($yes_list, $no_list, $title='', $id='vi_id'){
        # 先for，获得图片id，并写入session
        $vif_id = '';
        foreach ($yes_list as $val) {
            $vif_id .= $val[$id].',';
        }
        $vif_id = rtrim($vif_id, ',');
        $res    = $this->Session($this->KEY, $vif_id);
        if (!$res) {
            return $this->Json('01', 'Session写入失败');
        }

        # 随机合并并返回
        $list   = $this->ShuffleAssoc(array_merge_recursive($yes_list, $no_list));
        return $this->Json('00', "请点击下列所有 {$title} 图片后，点击提交！", $list);
    }

    /**
     * ②核验验证码
     * @author 小黄牛
     * @param string $vif    验证码id，使用,号间隔
     * @param bool   $status 验证失败后，是否清空seesion
     */
    public function VifResult($vif, $status=false){
        $yes_vif = $this->Session($this->KEY);

        if (!$yes_vif) {
            if ($status) {
                $this->Session($this->KEY, null);
            }
            return $this->Json('01', '验证码已过期');
        }

        $yes_vif = explode(',', $yes_vif);
        $yan_vif = explode(',', ltrim(rtrim($vif, ','), ','));

        # 先验证个数是否一致
        if (count($yan_vif) != count($yes_vif)) {
            if ($status) {
                $this->Session($this->KEY, null);
            }
            return $this->Json('01', '验证失败');
        }

        # 再验证id是否一致
        foreach ($yan_vif as $v) {
            if (!in_array($v, $yes_vif)) {
                if ($status) {
                    $this->Session($this->KEY, null);
                }
                return $this->Json('01', '验证失败');
            }
        }

        # 清空seesion
        $this->Session($this->KEY, null);
        return $this->Json('00', '验证通过');
    }

    /**
     * ③ 生成seesion
     * 
     * @author 小黄牛
     * @param string $key   键名
     * @param string $value 键值，为空时则是读取seesion
     * @param int    $time  过期时间(秒)
     * @return string || bool
     */
    private function Session($key, $value='', $time=1800){
        isset($_SESSION) || session_start();
        if($key == NULL){
            session_destroy();
            return true;
        }

        if(!empty($value)){
            if(!empty($time)){
                $Ftime = time()+$time;
                $_SESSION[$key] = $value.':'.$Ftime;
            }else{
                $Ftime = time()+C('SESSION_TIME');
                $_SESSION[$array] = $value.':'.$Ftime;
            }
            return true;
        }else{
            $AP = explode(':',$_SESSION[$key]);
            $Scode = $AP[0];
            $Stime = $AP[1];
            if(time() >= $Stime){
                return false;
            }
            return $Scode;
        }
        return false;
    }

    /**
     * ④二维数组随机排序
     *
     * @author 小黄牛
     * @param array  $list 需要排序的数组
     * @return array
     */
    private function ShuffleAssoc($list) {  
        if (!is_array($list)) return $list;  
           
        $keys = array_keys($list);  
        shuffle($keys);  
        $random = array();  
        foreach ($keys as $key) {
            $random[] = $list[$key];  
        }
        return $random;  
     }

    /**
     * ⑤返回固定格式的Json
     *
     * @author 小黄牛
     * @param string $code 状态码 00|01 成功|失败
     * @param string $msg  说明
     * @param array  $data 成功返回数据
     */
    private function Json($code, $msg, $data=array()){
        return str_replace('\\/', '/', json_encode(array(
            'code' => "{$code}",
            'msg'  => $msg,
            'data' => $data
        )));
    }
}