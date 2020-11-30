<?php

require_once 'Auth/Auth.php';

function myLogin() {
    require_once 'login.php';
}

$params = array(
    'dsn' => 'mysqli://phpuser:phppass@localhost/php10',
    'table' => 'schedule_usr',
    'usernamecol' => 'uid',
    'passwordcol' => 'passwd'
);

$auth = new Auth('MDB2', $params, 'myLogin');

$auth -> start();


if (!$auth -> checkAuth()) {
    die();
} else {
    print('<a href="logout.php">ログアウト</a>');
}

