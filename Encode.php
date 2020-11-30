<?php
function e($str, $charset = 'UTF-8') {
    // 特殊文字のエスケープ　[', ", <, >, &]
    return htmlspecialchars($str, ENT_QUOTES, $charset);
}

function format($datetime, $format='yyyy/MM/dd') {
    $ts = strtotime($datetime);
    print(date($format, $ts));
}
?>