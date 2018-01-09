<?php
//require_once 'settings.php';

if ( $_SERVER['REQUEST_URI'] == '/') {
    $Page = 'index';
    $Module = 'index';
} else {
    $URL_Path = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
    $URL_Parts = explode('/', trim($URL_Path, ' /'));

    $Page = array_shift($URL_Parts);
    $Module = array_shift($URL_Parts);

    if( !empty($Module) ) {
        $Params = array();

        for ( $i = 0; $i < count($URL_Parts); $i++ ) {
            $Params[[$URL_Parts][$i]] = $URL_Parts[++$i];
        }
    }
}

if ( $Page == 'index' ) {
    echo 'Главная страница';
} elseif ( $Page == 'photo' ) {
    echo 'Страница фото';
} elseif ( $Page == 'comment' ) {
    echo 'Страница с комментариями';
} elseif ( $Page == 'register' ) {
    echo 'Страница регистрации';
}

print_r($Module);