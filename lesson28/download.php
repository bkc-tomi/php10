<?php

const DOC_ROOT = '../doc/';
$flag = FALSE;
$o_dir = opendir(DOC_ROOT);
// クエリ情報パスのチェック(パストラバーサル攻撃への対策)
while ($file = readdir($o_dir)) {
    if (is_file(DOC_ROOT.$file)) {
        $filename = $file;
        $path = DOC_ROOT.$file;
        $file = mb_convert_encoding($file, 'UTF-8', 'UTF-8'); // windows等文字コードの変換が必要な場合
        if ($_GET['path'] === $file) {
            $flag = TRUE;
            break;
        }
    }
}
closedir($o_dir);

// エラー時は強制終了
if (!$flag) {
    die('不正なパスが指定されました。');
}

// ダウンロード処理
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.$filename);
print(file_get_contents($path));