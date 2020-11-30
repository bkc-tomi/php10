<?php
$file = fopen('guest.dat', 'ab');
flock($file, LOCK_EX); // 排他ロック
fputs($file, date('Y年 m月 d日 H:i:s')."\t");
fputs($file, $_POST['name']."\t");
sleep(5);
fputs($file, $_POST['message']."\n");
flock($file, LOCK_UN); // ロックを解除
fclose($file);
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/guest_input.php');
