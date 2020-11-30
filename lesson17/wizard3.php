<?php
require_once '../Encode.php';
// POST、SESSIONのデータは全てstringで扱われる。
session_start();
if (isset($_POST['age'])) { $_SESSION['age'] = $_POST['age']; }
if (isset($_POST['os']) || isset($_SESSION['os'])) {
  $_SESSION['os'] = $_POST['os']; }
if (isset($_POST['memo'])) { $_SESSION['memo'] = $_POST['memo']; }
if (isset($_POST['quest_num'])) { $_SESSION['quest_num'] = $_POST['quest_num']; }

$errors = array(); // エラーを保存する配列

// 文字コードのチェック
foreach ($_SESSION as $key => $value) {
  if (is_array($value)) { $value = implode('', $value); }
  if (!mb_check_encoding($value)) {
    $errors[] = '文字コードに誤りがあります。';
    break;
  }
}
// 必須入力のチェック
// trim: 文字列の前後の空文字を除去する。
if (trim($_SESSION['name']) === '') {
  $errors[] = '名前は必ず入力してください。';
}
// 文字列長のチェック
// mb_strlen: php.ini -> mbstring.internal_encodingのパラメータを元に文字列の長さをチェック
if (mb_strlen($_SESSION['name']) > 50) {
  $errors[] = '名前は50文字以内で入力してください。';
}
// 数値型のチェック
// ctype_digit: 入力された文字の全てが数字であるかを判定。
if (!ctype_digit($_SESSION['age'])) {
  $errors[] = '年齢は整数値で入力してください。';
}
// 数値範囲チェック
if ($_SESSION['age'] < 10 || $_SESSION['age'] > 50) {
  $errors[] = '年齢は10〜50の間で入力してください。';
}
// 候補値チェック　この場合未入力は許可する。
$opts = array('win', 'mac', 'linux');
if (isset($_SESSION['os'])) {
  foreach ($_SESSION['os'] as $os) {
    if (!in_array($os, $opts)) {
      $errors[] = 'OSは決められた選択肢の中から選択してください。';
      break;
    }
  }
}
// エラーメッセージの表示
if (count($errors) > 0) {
  die(implode('<br />', $errors).'<br />[<a href="wizard1.php">戻る</a>]');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP入門教室</title>
</head>
<body>
<h3>ご回答ありがとうございました。</h3>
<p>以下の内容で送信致しました。</p>
<dl>
<dt>名前：</dt>
<dd><?php print(e($_SESSION['name'])); ?></dd>
<dt>メールアドレス：</dt>
<dd><?php print(e($_SESSION['email'])); ?></dd>
<dt>郵便番号：</dt>
<dd><?php print(e($_SESSION['zip'])); ?></dd>
<dt>性別：</dt>
<dd><?php print(e($_SESSION['sex'])); ?></dd>
<dt>年齢：</dt>
<dd><?php print(e($_SESSION['age'])); ?></dd>
<dt>ご使用のOS：</dt>
<dd><?php if (isset($_SESSION['os'])) {
  print(e(implode(',', $_SESSION['os']))); } ?></dd>
<dt>サイトへのご意見：</dt>
<dd><?php print(nl2br(e($_SESSION['memo']))); ?></dd>
<dt>アンケート番号：</dt>
<dd><?php print(e($_SESSION['quest_num'])); ?></dd>
</dl>
<pre>
<?php
// 文字コードのチェック
foreach ($_SESSION as $key => $value) {
  print('$value:'.$key.gettype($value).'<br />');
  print('$_SESSION:'.$key.gettype($_SESSION[$key]).'<br />');
}
?>

</pre>
<?php session_unset(); ?>
</body>
</html>
