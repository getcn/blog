
<?php
$wenjian='FormatFactory_bd_4.0.5.0_setup.exe';
$sudu='5000.0';
$file=$wenjian;
// �����͵��ͻ��˵ı����ļ�
$local_file = $file;
// �ļ���
$download_file = $local_file;
// ������������(=> 20,5 kb/s)
$download_rate = $sudu;
if(file_exists($local_file) && is_file($local_file)) {
    // ���� headers
    header('Cache-control: private');
    header('Content-Type: application/octet-stream');
    header('Content-Length: '.filesize($local_file));
    header('Content-Disposition: filename='.$download_file);
    // flush ����
    flush();
    // ���ļ���
    $file = fopen($local_file, "r");
    while (!feof($file)) {
        // ���͵�ǰ�����ļ��������
        print fread($file, round($download_rate * 1024));
        // flush ����������������
        flush();
        ob_flush();  //��ֹPHP��web�������Ļ������Ӱ�����
        // �ն�1������
        sleep(1);
    }
    // �ر��ļ���
    fclose($file);
}
else {
    die('Error: no '.$local_file.' no!');
}
?>

$file = "1.txt";// �ļ�����ʵ��ַ��֧��url,������������url��
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


// �����͵��ͻ��˵ı����ļ�
$local_file = 'testfile.zip';
// �ļ���
$download_file = 'your-download-name.zip';
// ������������(=> 20,5 kb/s)
$download_rate = 20.5;
if(file_exists($local_file) && is_file($local_file)) {
    // ���� headers
    header('Cache-control: private');
    header('Content-Type: application/octet-stream');
    header('Content-Length: '.filesize($local_file));
    header('Content-Disposition: filename='.$download_file);
    // flush ����
    flush();
    // ���ļ���
    $file = fopen($local_file, "r");
    while (!feof($file)) {
        // ���͵�ǰ�����ļ��������
        print fread($file, round($download_rate * 1024));
        // flush ����������������
        flush();
        ob_flush();  //��ֹPHP��web�������Ļ������Ӱ�����
        // �ն�1������
        sleep(1);
    }
    // �ر��ļ���
    fclose($file);
}
else {
    die('Error: �ļ� '.$local_file.' ������!');
}