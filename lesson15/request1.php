<?php
$defs = array(
  'name' => '山田太郎', 'email' => 'yamada@wings.msn.to',
  'zip' => '100-0000','sex' => '男性', 'age' => '40',
  'os' => array('win', 'linux'), 'memo' => '特になし'
);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP入門教室</title>
</head>
<body>
<h3>アンケート</h3>
<form method="POST" action="request2.php">
  <div class="container">
    <label for="name">名前：</label><br />
    <input type="text" id="name" name="name"
      value="<?php print($defs['name']); ?>" />
  </div>
  <div class="container">
    <label for="email">メールアドレス：</label><br />
    <input type="email" id="email" name="email"
      value="<?php print($defs['email']); ?>" />
  </div>
  <div class="container">
    <label for="zip">郵便番号：</label><br />
    <input type="text" id="zip" name="zip"
      value="<?php print($defs['zip']); ?>" />
  </div>
  <div class="container">
    性別：<br />
    <?php
    $sexes = array('男性', '女性', 'その他');
    foreach ($sexes as $sex) {
      print('<label>');
      print('<input type="radio" name="sex" value="'.$sex.'"');
      if ($sex === $defs['sex']) { print(' checked'); }
      print(' />');
      print($sex.'</label>');
    }
    ?>
  </div>
  <div class="container">
    <label for="age">年齢：</label><br />
    <select id="age" name="age">
    <?php 
      for ($i = 10; $i <= 50; $i += 10) {
        print('<option value="'. $i.'"');
        if ($i === (int)$defs['age']) { print(' selected'); }
        print('>' . $i .'代</option>');
      }
    ?>
    </select>
  </div>
  <div class="container">
    ご使用のOS：<br />
    <?php
    $oss = array('win' => 'Windows', 'mac' => 'Mac',
      'linux' => 'Linux');
    foreach ($oss as $k_os => $v_os) {
      print('<label>');
      print('<input type="checkbox" name="os[]" value="'.$k_os.'"');
      foreach ($defs['os'] as $os) {
        if ($k_os === $os) { print(' checked'); }
      }
      print(' />');
      print($v_os.'</label>');
    }
    ?>
  </div>
  <div class="container">
      <label for="memo">サイトへのご意見：</label><br />
    <textarea rows="5" cols="30" id="memo"
      name="memo"><?php print($defs['memo']); ?></textarea>
  </div>
  <input type="hidden" name="quest_num" value="XXX15204" />
  <input type="submit" value="送信" />
</form>
</body>
</html>