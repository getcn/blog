
<?php

header('Content-Type:text/html;charset=utf-8;');
function dmicrotime() {
    return array_sum(explode(' ', microtime()));
}
$t = dmicrotime();
 
//主要代码开始。
$bd = 'conn/sensitivewordss/vocabulary_judge'; // 敏感词 列表， 每行一个敏感词
$bdc = 'conn/sensitivewordss/cache/bad_words_cache'; // 生成 缓存 文件， cache 目录事先已经建立
 
$str = $row["content"]; // 需要处理的内容。
 
$badwords_last_time = 0; // 预设定 缓存对应的文件日期。
 
if(file_exists($bdc)) include $bdc; // 除了初次使用， 大多数文件存在。
if($badwords_last_time !== filemtime($bd)) {
    $badwords_array = make_cache($bd, $bdc); // 如果敏感词字典改变，重新生成缓存。大多时候不会执行。
}
 
//echo 'make_cache:<font color="red">',(dmicrotime() - $t),'</font><br />';
 
$t = dmicrotime();
$str = strtr($str, $badwords_array); // 真正执行敏感词替换的错做。 没有什么比这个更有效的。
//echo 'strtr:<font color="red">',(dmicrotime() - $t),'</font><br />';
 
// 代码结束，显示替换后效果。
echo $str;
 
 
// 生成缓存，代码很简单，如果用文本查看生成的文件的话，其实就是一个格式好的敏感词数组。
// 并且手动维护这个缓存文件作为敏感词过滤字典或许更有效。
function make_cache($badwords, $cachefile = null, $enc = 'utf-8') {
    $file  = file($badwords);
    if(!$file) return false;
    $array = array();
    foreach($file as $k=>$v) {
        $v = trim($v);
        if(!$v) continue;
 
        // 下面只是生成 敏感词 转换后的格式,如果要求不苛刻，可以简单写成 $array[$k] = '*';
        // 这里我复杂处理一下，因为是生成 cache 不用管 效率。
        // 下面的替换过程其实可以很随意，不喜欢'*'号可以用'?','x'等等，随意的很。
        $s_len = mb_strlen($v, $enc);
        switch ($s_len) {
            // 两个字的敏感词，只替换第二字为'*'
            case 2 : {
                $array[$v] =  '';//mb_substr($v, 0,1,$enc) .'*'
                break;
            }
 
            // 敏感词，一个字，虽然很少。不过可能会有。
            case 1 : {
                $array[$v] = '';
                break;
            }
 
            // 其他情况，取首位各一个字，中间根据多少个字替换多少个'*';
            default : {
                $array[$v] = mb_substr($v, 0,0,$enc) . str_repeat('',($s_len-0)) . mb_substr($v, 0,0,$enc);
			// array[$v] = mb_substr($v, 0,1,$enc) . str_repeat('*',($s_len-2)) . mb_substr($v, -1,1,$enc);
            }
        }
    }
 
    // 保存序列备用。
    if(!$cachefile) $cachefile = $badwords . '_cache';
    $str = '<!--管理-->'.'<?php $badwords_last_time = ' . filemtime($badwords) . ';$badwords_array = ' . var_export($array,true) . ';';
    file_put_contents($cachefile, $str, LOCK_EX);
    return $array;
}


?>