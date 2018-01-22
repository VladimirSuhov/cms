<?php

function formatChars($data) {
    return nl2br( htmlspecialchars( trim($data), ENT_QUOTES ), false );
}

function genPass( $p1, $p2 ) {
   return md5('hahaha'.md5('lol'.$p1.'olo').md5('qwe'.$p2.'eqw'));
}

function dd( $data ) {
    echo '<pre>';
        var_dump( $data );
    echo '</pre>';
}

function messageSend( $p1, $p2 ) {
    if ( $p1 == 1 ) $p1     = 'Ошибка';
    elseif ( $p1 == 2 ) $p1 = 'Подсказка';
    elseif ( $p1 == 2 ) $p1 = 'Информация';
    $_SESSION['message'] = '<div class="message-box"><b> {$p1} </b> {$p2} </div>';
    exit( header('Location: ' .$_SERVER['HTTP_REFERER'] ) );
}

function random_string($length) {
    $char = '0123456789abcdefghijklmnopqrstuvwxyz';
    for ( $i = 0; $i < $length; $i++ ) {
        $string .= $char[rand(0, strlen($char)) -1];
    }
    return $string;
}

function messageShow () {
    if ($_SESSION['message']) $message = $_SESSION['message'];
    echo $message;
    $_SESSION['message'] = array();
}

function is_logged( $p1 ) {
    if ( $p1 <= 0 && $_SESSION['USER_LOGGED_IN'] !== $p1 ) {
        echo 'This page is avaliable only for guests';
    } elseif ( $_SESSION['USER_LOGGED_IN'] !== $p1 ) {
        echo 'This page is avaliable only for authenticated users';
    }
}

function upload_avatar( $filename ) {
    if( $filename['type'] !== 'image/jpeg' || 'image/png') {
        echo json_encode(['success' => 'false', 'message' => 'Недопустимый формат файла']);
    }
    if ( $filename['size'] > 1000000 ) {
        echo json_encode(['success' => 'false', 'message' => 'Размер файла не должен превышать 1 мб']);
    }
}