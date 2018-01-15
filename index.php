<?php
include_once 'settings.php';
include_once 'includes/helpers.php';
session_start();

$CONNECT = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
//            $Params[[$URL_Parts][$i]] = $URL_Parts[++$i];
        }

    }
}

if ( $Page == 'index' ) include('template-parts/index.php');
elseif ( $Page == 'login' ) include('template-parts/login.php');
elseif ( $Page == 'register' ) include('template-parts/register.php');
elseif ( $Page == 'account' ) include('includes/handlers/register.php');


function head( $title ) {
    require_once('template-parts/header.php');
}

function footer() {
    require_once('template-parts/footer.php');
}

