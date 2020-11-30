<?php require_once '../Encode.php'; ?>
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
    <dd><?php print(e($_POST['name'])); ?></dd>
<dt>メールアドレス：</dt>
    <dd><?php print(e($_POST['email'])); ?></dd>
<dt>郵便番号：</dt>
    <dd><?php print(e($_POST['zip'])); ?></dd>
<dt>性別：</dt>
    <dd><?php print(e($_POST['sex'])); ?></dd>
<dt>年齢：</dt>
    <dd><?php print(e($_POST['age'])); ?></dd>
<dt>ご使用のOS：</dt>
    <dd><?php 
    if (isset($_POST['os']) === TRUE) {
        print(e(implode(',', $_POST['os'])));
    }
    ?></dd>
<dt>サイトのご意見：</dt>
    <dd><?php print(nl2br(e($_POST['memo']))); ?></dd>
<dt>アンケート番号</dt>
    <dd><?php print(e($_POST['quest_num'])); ?></dd>
</dl>
<pre>
    <?php
    foreach ($_POST as $p) {
        print($p);
    }
    ?>
</pre>
</body>
</html>
