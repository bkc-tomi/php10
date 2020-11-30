<?php require_once '../Encode.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP入門教室</title>
</head>
<body>
<h3>ファイルリスト</h3>
<table border="1">
<tr>
  <th>ファイル</th><th>サイズ</th><th>最終アクセス日</th><th>最終更新日</th>
</tr>
<?php
const DOC_ROOT = '../doc/';
// レッスン２８と同じだがオブジェクト指向でやっている。
$dir = new DirectoryIterator(DOC_ROOT);
foreach ($dir as $file) {
  if ($file -> isFile()) {
    $name = mb_convert_encoding($file -> getFilename(), 'UTF-8', 'UTF=8');
?>
  <tr>
    <td><a href="download.php?path=<?php print(urlencode($name)); ?>">
      <?php print(e($name)); ?>
    </a></td>
    <td><?php print(round($file -> getSize() / 1024)); ?>KB</td>
    <td><?php print(date('Y/m/d H:i:s', $file -> getATime())); ?></td>
    <td><?php print(date('Y/m/d H:i:s', $file -> getMTime())); ?></td>
  </tr>
<?php
  }
}
?>
</table>
</body>
</html>
