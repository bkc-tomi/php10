<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP入門教室</title>
</head>
<body>
<!-- ポストデータで受け取る -->
<form method="POST" action="request2.php">
    <div>
        <label for="name">名前</label>
        <input type="text" id="name" name="name" />
    </div>
    <input type="submit" value="送信" />
</form>
<!-- クエリパラメータで受け取る -->
<form method="GET" action="request3.php">
    <div>
        <label for="name">名前</label>
        <input type="text" id="name" name="name" />
    </div>
    <input type="submit" value="送信" />
</form>
</body>
</html>
