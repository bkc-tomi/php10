<?php
$data = array('山田太郎', '横山花子', '田中一郎', '山本久美子', '鈴木次郎', '星山裕子', '佐藤勝夫');
$data[2] = '井上翔太';
$data[] = '山口はな';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP入門教室</title>
</head>
<body>
    名簿には<?php print(count($data)); ?>人が登録されています。
    <ol>
    <?php
        print('<li>'.$data[0].'</li>');
        print('<li>'.$data[1].'</li>');
        print('<li>'.$data[2].'</li>');
        print('<li>'.$data[3].'</li>');
        print('<li>'.$data[4].'</li>');
        print('<li>'.$data[5].'</li>');
        print('<li>'.$data[6].'</li>');
        print('<li>'.$data[7].'</li>');
    ?>
    </ol>

    <pre>
    <?php
    print_r($data);
    ?>
    </pre>
    <?php
    print_r($data);
    ?>
</body>
</html>
