<?php
// ファイルをオープン(ない場合は作成)
$file = fopen('guest.dat', 'ab');
// ファイルへの書き込み
fputs($file, date('Y年 m月 d日 H:i:s')."\t");
fputs($file, $_POST['name']."\t");
fputs($file, $_POST['message']."\n");
fclose($file);
// 元のページへリダイレクト
// header('Location: http://localhost/before/php10/lesson21/guest_input.php');
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/guest_input.php');
?>