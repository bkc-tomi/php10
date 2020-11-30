<?php
$data = array(
  '山田太郎' => 
    array('男', '1965/12/04', '東京都東京市東町1-1-1'),
  '横山花子' => 
    array('女', '1975/09/21', '神奈川県神奈川市西町1-2-3'),
  '田中一郎' => 
    array('男', '1968/11/17', '東京都東京市南町2-1-4'),
  '山本久美子' => 
    array('女', '1972/01/24', '東京都東京市西町3-2-1'),
  '鈴木次郎' => 
    array('男', '1976/08/09', '千葉県千葉市北町1-4-2'),
  '星山裕子' => 
    array('その他', '19679/05/07', '茨城県茨木市東町3-2-1'),
  '佐藤勝男' => 
    array('男', '1980/12/15', '東京都東京市北町2-1-3')
);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP入門教室</title>
</head>
<body>
<ol>
<?php
foreach($data as $name => $prof) {
  $img = '';
  $pos = mb_strpos($name, $_POST['keywd']);
  if ($pos !== FALSE) {
    switch ($prof[0]) {
      case '男':
        $img = '../images/male.gif';
      break;
      case '女':
        $img = '../images/female.gif';
      break;
      default:
        $img = '../images/other.gif';
    }

    print("<img src='{$img}' alt='{$prof[0]}' />");
    print("<dt>{$name}</dt>");
    print("<dd>{$prof[0]}</dd>");
    print("<dd>{$prof[1]}</dd>");
    print("<dd>{$prof[2]}</dd>");
  }
}
?>
</ol>
</body>
</html>
