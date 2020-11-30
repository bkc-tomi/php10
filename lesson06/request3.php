<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP入門教室</title>
</head>
<body>
こんにちは、
<?php print htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8'); ?>
さん！
</body>
</html>
