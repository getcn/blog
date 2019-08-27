<?php
//
//CDN加速模式下获取IP
//
//获取IP使用方法：echo "您的上网IP是：".get_client_ip();
//淘宝IP库解析IP
//获取禁止访问地区配置文件《ipkuhomeindex/ipku》
//404.php跳转禁止
function get_client_ip()
{
    foreach (array(
                'HTTP_CLIENT_IP',
                'HTTP_X_FORWARDED_FOR',
                'HTTP_X_FORWARDED',
                'HTTP_X_CLUSTER_CLIENT_IP',
                'HTTP_FORWARDED_FOR',
                'HTTP_FORWARDED',
                'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER)) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                //会过滤掉保留地址和私有地址段的IP，例如 127.0.0.1会被过滤
                //也可以修改成正则验证IP
                if ((bool) filter_var($ip, FILTER_VALIDATE_IP,
                                FILTER_FLAG_IPV4 |
                                FILTER_FLAG_NO_PRIV_RANGE |
                                FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }
    }
    return null;
}
?>


<?php

$ip = get_client_ip();
$content = file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip);
$banned = json_decode(trim($content), true);
$lan = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']);
?>

<?php
$mobile = $banned['data']['country_id'];
$sips=file_get_contents('conn/ipdiquku/ipku');
 if(strpos($sips,$mobile) !==false) 
	echo '<script>location="../../404.php";</script>';
 else 
	?>
	
<?php
	//$mobiles = $banned['data']['country_id'];
	//$sipss=file_get_contents('pb/ipkuhomeindex/ipku');
//if(strpos($sipss,$mobile) !==false) 
	//echo '<script>location="404.php";</script>';
//else 

	?>