<?php require_once '../Encode.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP入門教室</title>
</head>
<body>
<h3>ゲストブック(閲覧)</h3>
<?php
$file = @fopen('guest.dat', 'rb')
  or die('ファイルが開けませんでした。');
flock($file, LOCK_SH);
print('<dl>');
while ($row = fgetcsv($file, 1024, "\t")) {
?>
  <dt><?php print(e($row[1])); ?>
    （<?php print(e($row[0])); ?>）</dt>
  <dd>メッセージ:<?php print(e($row[2])); ?><hr /></dd>
<?php
}
print('</dl>');
flock($file, LOCK_UN);
fclose($file);
?>
</body>
</html>
