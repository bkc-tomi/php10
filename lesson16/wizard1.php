<?php
require_once '../Encode.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP入門教室</title>
</head>
<body>
<h3>アンケート</h3>
<form method="POST" action="wizard2.php">
  <div class="container">
    <label for="name">名前：</label><br />
    <input type="text" id="name" name="name"
    value="<?php print(e($_SESSION['name'])); ?>" />
  </div>
  <div class="container">
    <label for="email">メールアドレス：</label><br />
    <input type="email" id="email" name="email"
    value="<?php print(e($_SESSION['email'])); ?>" />
  </div>
  <div class="container">
    <label for="zip">郵便番号：</label><br />
    <input type="zip" id="zip" name="zip"
    value="<?php print(e($_SESSION['zip'])); ?>" />
  </div>
  <div class="container">
    性別：<br />
    <?php
    $sexes = array('男性', '女性', 'その他');
    foreach ($sexes as $sex) {
      print('<label>');
      print('<input type="radio" name="sex" value="'.$sex.'"');
      if ($sex === $_SESSION['sex']) { print(' checked'); }
      print(' />');
      print($sex.'</label>');
    }
    ?>
  </div>
  <input type="submit" value="次へ" />
</form>
</body>
</html>
