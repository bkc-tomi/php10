<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=php10;charset=utf8', 'phpuser', 'phppass');
  if (isset($_POST['update'])) {
    $stt = $db->prepare('UPDATE schedule SET title=:title, sdate=:sdate, stime=:stime, memo=:memo WHERE sid=:sid');
    $stt->bindValue(':title', $_POST['title']);
    $stt->bindValue(':sdate', $_POST['sdate_year'].'/'.$_POST['sdate_month'].'/'.$_POST['sdate_day']);
    $stt->bindValue(':stime', $_POST['stime_hour'].':'.$_POST['stime_minute']);
    $stt->bindValue(':memo', $_POST['memo']);
  } elseif (isset($_POST['delete'])) {
    $stt = $db->prepare('DELETE FROM schedule WHERE sid=:sid');
  }
  $stt->bindValue(':sid', $_POST['sid']);
  $stt->execute();
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/schedule_read.php');
