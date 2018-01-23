<?php

if ( $Module == 'edit' ) {
    if ( $_SESSION['USER_LOGGED_IN'] == 1) {
        if( $_POST['enter'] &&
            ! empty( $_POST['name'] ) &&
            ! empty( $_POST['old_pass'] ) &&
            ! empty( $_POST['new_pass'] ) &&
            ! empty( $_POST['confirm_new_pass'] )
        ) {
            $name = formatChars( $_POST['name'] );
            $pass_old = formatChars( $_POST['old_pass'] );
            $pass_new = formatChars( $_POST['new_pass'] );
            $confirm_pass_new = formatChars( $_POST['confirm_new_pass'] );

            $row = mysqli_fetch_assoc(mysqli_query( $CONNECT,"SELECT password FROM users WHERE id = '$_SESSION[USER_ID]'") );

            dd($_SESSION);

            if ( $row[''] == genPass( $pass_old, $_SESSION['USER_LOGIN'] ) ) {
                if ( $pass_new == $confirm_pass_new ) {
                    $row = mysqli_query($CONNECT, "UPDATE users SET name = '$name', password = '$pass_new' WHERE id = '$_SESSION[USER_ID]'");
                    echo json_encode( array( 'succes' => 'true', 'error' => 'Password has been changed' ) );
                } else {
                    echo json_encode( array( 'succes' => 'false', 'error' => 'Passwords doesnt match' ) );
                }
            } else {
                echo json_encode( array( 'succes' => 'false', 'error' => 'Wrong old pass' ) );
            }
        } else {
            echo json_encode( array( 'succes' => 'false', 'error' => 'Error form validation' ) );
            dd($_POST);
        }

        if(!empty($_FILES['avatar'])) {
            upload_avatar($_FILES['avatar']);
        }
    }
}