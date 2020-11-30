<?php
$file = fopen('guest.dat', 'ab');
【ここに入力】
fputs($file, date('Y年 m月 d日 H:i:s')."\t");
fputs($file, $_POST['name']."\t");
sleep(5);
fputs($file, $_POST['message']."\n");
【ここに入力】
fclose($file);
header('Location: http://localhost/php10/lesson22-2/guest_input.php');
