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
$data = @file("guest.dat") or die('ファイルが開ませんでした。');
print('<dl>');
foreach (array_reverse($data) as $row) {
    $datum = explode("\t", $row);
?>
  <dt><?php print(e($datum[1])); ?>
    （<?php print(e($datum[0])); ?>）</dt>
  <dd>メッセージ:<?php print(e($datum[2])); ?><hr /></dd>
<?php
}
print('</dl>');
?>
</body>
</html>
