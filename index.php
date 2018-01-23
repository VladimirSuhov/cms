<?php
include_once 'settings.php';
include_once 'includes/helpers.php';
session_start();

$CONNECT = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ( $_SESSION['USER_LOGGED_IN'] !=1 && $_COOKIE['remember_user'] ) {
    $row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT * FROM users WHERE password = '$_COOKIE[remember_user]'"));
    $_SESSION['USER_ID'] = $row['id'];
    $_SESSION['USER_NAME'] = $row['name'];
    $_SESSION['USER_LOGIN'] = $row['login'];
    $_SESSION['USER_REGDATE'] = $row['regdate'];
    $_SESSION['USER_COUNTRY'] = $row['avarat'];
    $_SESSION['USER_LOGGED_IN'] = 1;
}

if ( $_SERVER['REQUEST_URI'] == '/') {
    $Page = 'index';
    $Module = 'index';
} else {
    $URL_Path = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
    $URL_Parts = explode('/', trim($URL_Path, ' /'));

    $Page = array_shift($URL_Parts);
    $Module = array_shift($URL_Parts);

    if( !empty($Module) ) {

        $Param = [];

        for ($i = 0; $i < count($URL_Parts); $i++) {
            $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
        }
    }
}

if ( $Page == 'index' ) include( 'template-parts/index.php' );

elseif ( $Page == 'login' ) include('template-parts/account/login.php');

elseif ( $Page == 'register' ) include('template-parts/account/register.php');

elseif ( $Page == 'account' && $Module == 'register' ) include('includes/handlers/auth/register.php');

elseif ( $Page == 'account' && $Module == 'login' ) include('includes/handlers/auth/auth.php');

elseif ( $Page == 'account' && $Module == 'logout' ) include('includes/handlers/auth/auth.php');

elseif ( $Page == 'account' && $Module == 'activate' ) include('includes/handlers/auth/activate.php');

elseif ( $Page == 'account' && $Module == 'reset' ) include('includes/handlers/auth/auth.php');

elseif ( $Page == 'account' && $Module == 'restore' ) include('template-parts/account/restore.php');

elseif ( $Page == 'account' && $Module == 'restore-password' ) include('includes/handlers/auth/restore.php');

elseif ( $Page == 'account' && $Module == 'activate' ) include('includes/handlers/auth/activate.php');

elseif ( $Page == 'profile' && $Module == 'edit') include('includes/handlers/user/edit.php');

elseif ( $Page == 'chat' ) include( 'template-parts/chat.php' );

function head( $title ) {
    require_once('template-parts/header.php');
}

function footer() {
    require_once('template-parts/footer.php');
}

