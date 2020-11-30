<?php
// 数値型のチェック
function typeInt($int, $errors) {
  if (!ctype_digit($int)) {
    $errors[] = "整数値で入力してください。";
  }
}

$errors = array();
// 文字コードのチェック
foreach ($_POST as $key => $value) {
  if (is_array($value)) { $value = implode('', $value); }
  if (!mb_check_encoding($value)) {
    $errors[] = '文字コードに誤りがあります。';
    break;
  }
}
/* 
各入力値のチェック 
予定名 入力が無いと自動的に「無題」となるのでtitleはチェックしない。
年はチェックしない。
備考はNULL値を許容するのでチェックしない。
*/

// 年：月：日　時：分の値が整数値かどうかのチェック
typeInt($_POST['sdate_year'], $errors);
typeInt($_POST['sdate_month'], $errors);
typeInt($_POST['sdate_day'], $errors);
typeInt($_POST['stime_hour'], $errors);
typeInt($_POST['stime_minute'], $errors);

// 月のチェック
if ($_POST['sdate_month'] <= 0 || $_POST['sdate_month'] >= 13) {
  $errors[] = '月の入力が正しくありません。';
}
// 日のチェック　甘いチェック
if ($_POST['sdate_day'] <= 0 || $_POST['sdate_day'] >= 32) {
  $errors[] = '日の入力が正しくありません。';
}
// 時のチェック
if ($_POST['stime_hour'] < 0 || $_POST['stime_hour'] >= 24) {
  $errors[] = '時の入力が正しくありません。';
}
// 分のチェック
if ($_POST['stime_minute'] < 0 || $_POST['stime_minute'] >= 60) {
  $errors[] = '日の入力が正しくありません。';
}
// エラーメッセージの表示
if (count($errors) > 0) {
  die(implode('<br />', $errors).'<br />[<a href="schedule_form.php">戻る</a>]');
}

try {
  // データベースへの接続
  $db = new PDO('mysql:host=localhost;dbname=php10;charset=utf8', 'phpuser', 'phppass');
  // コマンドの発行
  $stt = $db -> prepare('INSERT INTO schedule (title, sdate, stime, memo) VALUES (:title, :sdate, :stime, :memo)');
  $stt -> bindValue(':title', $_POST['title']);
  $stt -> bindValue(':sdate', $_POST['sdate_year'].'/'.$_POST['sdate_month'].'/'.$_POST['sdate_day']);
  $stt -> bindValue(':stime', $_POST['stime_hour'].':'.$_POST['stime_minute']);
  $stt -> bindValue(':memo', $_POST['memo']);
  $stt -> execute();
  // データベースの切断
  $db = NULL;
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/schedule_form.php');
