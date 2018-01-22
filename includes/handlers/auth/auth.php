<?php
if ( $Module == 'login' ) {
    if ($_POST['login_form']) {

        if (!empty( $_POST['login'] ) &&
            !empty( $_POST['password'] ) &&
            !empty( $_POST['captcha'] )
        ) {
            $login     = formatChars( $_POST['login'] );
            $captha    = formatChars( $_POST['captcha'] );
            $pass      = formatChars( $_POST['password'] );
            $password  = genPass( $pass, $login );
            if ( $_SESSION['captcha'] == md5($captha) ) {

                $row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT * FROM users WHERE login = '$login'"));

                if ( $row['password'] !== $password ) {
                    echo json_encode( ['succes' => 'false', 'error' => 'Incorrect password']);
                } elseif ( (int) $row['active'] !== 1 ) {
                    echo json_encode(['succes' => 'false', 'error' => 'Account not active']);
                } else {
                    $_SESSION['USER_ID'] = $row['id'];
                    $_SESSION['USER_NAME'] = $row['name'];
                    $_SESSION['USER_LOGIN'] = $row['login'];
                    $_SESSION['USER_REGDATE'] = $row['regdate'];
                    $_SESSION['USER_COUNTRY'] = $row['avarat'];
                    $_SESSION['USER_LOGGED_IN'] = 1;

                    if ( $_REQUEST['remember'] ) {
                        setcookie('remember_user', $password, strtotime('+30 days'), '/' );
                    }

                    exit( header('Location: /profile') );
                }
            } else {
                echo json_encode( ['succes' => 'false', 'message' => 'Wrong Captcha'] );
            }

        } else {
            echo json_encode( ['succes' => 'false', 'message' => 'Validation error'] );
        }

    }
}

if ( $Module == 'logout' && $_SESSION['USER_LOGGED_IN'] == 1 ) {
    $_SESSION = [];
    if ( $_COOKIE['remember_user'] ) {
        setcookie('remember_user', '' , strtotime('-30 days'), '/' );
        unset( $_COOKIE['remember_user'] );
    }
    session_unset();
    exit( header('Location: /login') );
}

if ( $Module == 'reset' && $_POST['enter'] ) {
    if (!empty( $_POST['email'] ) ) {
        $email     = formatChars( $_POST['email'] );
        $captha    = formatChars( $_POST['captcha'] );
        if ( $_SESSION['captcha'] == md5($captha) ) {
            $row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT id, email FROM users WHERE email = '$email'"));
            if (! $row['email'] ) {
                echo json_encode( ['success' => 'false', 'message' => 'There is no user with this email'] );
            } else {
                if ( ! empty($_SESSION['PASS_RESTORE'] ) ) {
                    $code = base64_encode($email);
                    mail($email, 'Регистрация аккаунта', 'Ссылка для восстановления: http://cms/account/restore-password/code/' . $code);
                    $_SESSION['PASS_RESTORE'] = random_string(15);
                    dd($_SESSION['PASS_RESTORE']);
                    echo json_encode(['success' => 'true', 'message' => 'Mail with the confirm link has been sended on your email']);
                }
            }
        }
    }
}
?>
