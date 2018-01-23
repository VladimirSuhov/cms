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
    if ($_FILES['avatar']['tmp_name']) {
        if ($filename['type'] !== 'image/jpeg') {
            dd($filename['type']);
            echo json_encode(['success' => 'false', 'message' => 'Wrong format']);
        }
        if ($filename['size'] > 2000000) {
            echo json_encode(['success' => 'false', 'message' => 'File is too large']);
        }
        $image = imagecreatefromjpeg($_FILES['avatar']['tmp_name']);
        $size = getimagesize($filename['tmp_name']);
        $tmp = imagecreatetruecolor(120, 120);
        imagecopyresampled($tmp, $image, 0, 0, 0, 0, 120, 120, $size[0], $size[1]);
        if ($_SESSION['USER_AVATAR'] == 0) {
            $files = glob('resource/avatar/*', GLOB_ONLYDIR);
            foreach ($files as $num => $dir) {
                $num++;
                $count = sizeof(glob($dir . '/*.*'));
                if ($count < 250) {
                    $download = $dir . '/' . $_SESSION['USER_ID'];
                    $_SESSION['USER_AVATAR'] = $num;
                    mysqli_query($CONNECT, "UPDATE users  SET avatar = $num WHERE `id` = $_SESSION[USER_ID]");
                    break;
                }
            }
        } else {
            $download = 'resource/avatar/' . $_SESSION['USER_AVATAR'] . '/' . $_SESSION['USER_ID'];
            imagejpeg($tmp, $download . '.jpg');
            imagedestroy($image);
            imagedestroy($tmp);
            echo json_encode(['success' => 'false', 'message' => 'Image has been uploaded']);
        }
    }
}