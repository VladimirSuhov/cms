<?php

function formatChars($data) {
    return nl2br( htmlspecialchars( trim($data), ENT_QUOTES ), false );
}

function genPass( $p1, $p2 ) {
   return md5('hahaha'.md5('lol'.$p1.'olo').md5('qwe'.$p2.'eqw'));
}

function dd($data) {
    echo '<pre>';
        var_dump($data);
    echo '</pre>';
}

function messageSend( $p1, $p2 ) {
    if ( $p1 == 1 ) $p1     = 'Ошибка';
    elseif ( $p1 == 2 ) $p1 = 'Подсказка';
    elseif ( $p1 == 2 ) $p1 = 'Информация';
    $_SESSION['message'] = '<div class="message-box"><b>'.$p1. '</b>' .$p2. '</div>';
    exit( header('Location: ' .$_SERVER['HTTP_REFERER'] ) );
}

function messageShow () {
    if ($_SESSION['message']) $message = $_SESSION['message'];
    echo $message;
    $_SESSION['message'] = array();
}