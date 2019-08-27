
<?php
$wenjian='FormatFactory_bd_4.0.5.0_setup.exe';
$sudu='5000.0';
$file=$wenjian;
// 将发送到客户端的本地文件
$local_file = $file;
// 文件名
$download_file = $local_file;
// 设置下载速率(=> 20,5 kb/s)
$download_rate = $sudu;
if(file_exists($local_file) && is_file($local_file)) {
    // 发送 headers
    header('Cache-control: private');
    header('Content-Type: application/octet-stream');
    header('Content-Length: '.filesize($local_file));
    header('Content-Disposition: filename='.$download_file);
    // flush 内容
    flush();
    // 打开文件流
    $file = fopen($local_file, "r");
    while (!feof($file)) {
        // 发送当前部分文件给浏览者
        print fread($file, round($download_rate * 1024));
        // flush 内容输出到浏览器端
        flush();
        ob_flush();  //防止PHP或web服务器的缓存机制影响输出
        // 终端1秒后继续
        sleep(1);
    }
    // 关闭文件流
    fclose($file);
}
else {
    die('Error: no '.$local_file.' no!');
}
?>

$file = "1.txt";// 文件的真实地址（支持url,不过不建议用url）
if (file_exists($file)) {
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename='.basename($file));
  header('Content-Transfer-Encoding: binary');
  header('Expires: 0');
  header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
  header('Pragma: public');
  header('Content-Length: ' . filesize($file));
  ob_clean();
  flush();
  readfile($file);
  exit;
}


// 将发送到客户端的本地文件
$local_file = 'testfile.zip';
// 文件名
$download_file = 'your-download-name.zip';
// 设置下载速率(=> 20,5 kb/s)
$download_rate = 20.5;
if(file_exists($local_file) && is_file($local_file)) {
    // 发送 headers
    header('Cache-control: private');
    header('Content-Type: application/octet-stream');
    header('Content-Length: '.filesize($local_file));
    header('Content-Disposition: filename='.$download_file);
    // flush 内容
    flush();
    // 打开文件流
    $file = fopen($local_file, "r");
    while (!feof($file)) {
        // 发送当前部分文件给浏览者
        print fread($file, round($download_rate * 1024));
        // flush 内容输出到浏览器端
        flush();
        ob_flush();  //防止PHP或web服务器的缓存机制影响输出
        // 终端1秒后继续
        sleep(1);
    }
    // 关闭文件流
    fclose($file);
}
else {
    die('Error: 文件 '.$local_file.' 不存在!');
}