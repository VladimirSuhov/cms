<?php
if ( $Module == 'restore-password' && $Param['code'] ) {

        $email = base64_decode( $Param['code'] );

    if ( strpos( $email, '@' ) !== 0 ) {

        dd($email );

        echo json_encode( ['succes' => 'true', 'message' => 'Password has been changed'] );

    } else {
        echo json_encode( ['succes' => 'false', 'message' => 'Go fuck youself, bitch', 'redirect' => '/' ] );
    }
}