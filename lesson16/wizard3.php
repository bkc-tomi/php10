<?php
require_once '../Encode.php';

session_start();
if (isset($_POST['age']) === TRUE) { $_SESSION['age'] = $_POST['age']; }
if (isset($_POST['os']) === TRUE) { $_SESSION['os'] = $_POST['os']; }
if (isset($_POST['memo']) === TRUE) { $_SESSION['memo'] = $_POST['memo']; }
if (isset($_POST['quest_num']) === TRUE) { $_SESSION['quest_num'] = $_POST['quest_num']; }
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
    <dd><?php 
    if (isset($_SESSION['os']) === TRUE) {
        print(e(implode(',', $_SESSION['os'])));
    }
    ?></dd>
<dt>サイトのご意見：</dt>
    <dd><?php print(nl2br(e($_SESSION['memo']))); ?></dd>
<dt>アンケート番号</dt>
    <dd><?php print(e($_SESSION['quest_num'])); ?></dd>
</dl>
<?php session_unset(); ?>
</body>
</html>
