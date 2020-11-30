<?php
$file = fopen('guest.dat', 'ab');
flock($file, LOCK_EX);
fputs($file, date('Y年 m月 d日 H:i:s')."\t");
fputs($file, $_POST['name']."\t");
fputs($file, $_POST['message']."\n");
flock($file, LOCK_UN);
fclose($file);
header('Location: http://localhost/php10/lesson24/guest_input.php');
