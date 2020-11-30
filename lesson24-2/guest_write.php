<?php
$org_file = fopen('guest.dat', 'rb');
$tmp_file = fopen('guest.tmp', 'wb');
// ロック
flock($org_file, LOCK_SH);
flock($tmp_file, LOCK_EX);
// クライアントの入力を書き込む
fputs($tmp_file, date('Y年 m月 d日 H:i:s')."\t");
fputs($tmp_file, $_POST['name']."\t");
fputs($tmp_file, $_POST['message']."\n");
// guest.datのデータを書き込む
while ($row = fgets($org_file)) {
    fputs($tmp_file, $row);
}
// ロックの解除
flock($org_file, LOCK_UN);
flock($tmp_file, LOCK_UN);
// 閉じる
fclose($tmp_file);
fclose($org_file);
// guest.datを削除
unlink('guest.dat');
rename('guest.tmp', 'guest.dat');
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/guest_input.php');
