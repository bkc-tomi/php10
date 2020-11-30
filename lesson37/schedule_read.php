<?php
require_once '../Encode.php';

try {
  $db = new PDO('mysql:host=localhost;dbname=php10;charset=utf8', 'phpuser', 'phppass');
  $stt = $db->prepare('SELECT * FROM schedule ORDER BY sdate ASC, stime ASC');
  $stt->execute();
  $db = NULL;
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP入門教室</title>
</head>
<body>
<h3>簡易スケジュール帳</h3>
<table border="1">
<tr>
  <th>日付</th><th>時刻</th><th>予定名</th><th>備考</th>
</tr>
<?php
while ($row = $stt->fetch()) {
?>
<tr>
  <td><?php format($row['sdate'], 'Y/m/d'); ?></td>
  <td><?php format($row['stime'], 'H:i'); ?></td>
  <td><?php print(e($row['title'])); ?></td>
  <td><?php print(e($row['memo'])); ?></td>
</tr>
<?php
}
?>
</table>
</body>
</html>
