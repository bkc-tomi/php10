<?php
if ($auth) {
    if ($auth -> getAuth()) {
        print('ログアウトしました。');
        print('<a href="schedule_read.php">ログイン画面へ</a>');
        $auth -> logout();
    } else {
        print('ログインしていませんでした。');
        print('<a href="schedule_read.php">ログイン画面へ</a>');
    }
}
// htmlの出力後は意味がない
// http_response_code( 301 );
// header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/schedule_read.php');
?>
<script defer>
    // JavaScriptで強制的にページ遷移
    (function () {
        window.location.href = "schedule_read.php";
    })();
</script>