<?php
if ( $Module == 'activate' && $Param['code'] ) {

    if ( ! $_SESSION['USER_ACTIVE_EMAIL'] ) {
        $email_activate = base64_decode( $Param['code'] );
    }

    if ( strpos( $email_activate, '@' ) !== 0 ) {
        mysqli_query( $CONNECT, "UPDATE users SET active = 1 WHERE email = '$email_activate' " );

        $_SESSION['USER_ACTIVE_EMAIL'] = $email_activate;

        header('/');

        echo json_encode( array('succes' => 'true', 'message' => 'Email confirned' ) );

    } else {
        echo json_encode( array('succes' => 'false', 'message' => 'Email not confirned', 'redirect' => '/login' ) );
    }
}