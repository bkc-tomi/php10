<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=php10;charset=utf8', 'phpuser', 'phppass');
    print('データベースに接続出来ました。');
    $db = NULL;
} catch(PDOException $e) {
    die('エラーメッセージ'.$e -> getMessage());
}