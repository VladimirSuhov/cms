<?php
if ( $_POST['registration_form'] ) {

    if ( ! empty( $_POST['name'] )    &&
        ! empty( $_POST['login'] )    &&
        ! empty( $_POST['email'] )    &&
        ! empty( $_POST['country'] )  &&
        ! empty( $_POST['captcha'] )  &&
        ! empty( $_POST['password'] )
        )
    {

            $name      = formatChars( $_POST['name'] );
            $login     = formatChars( $_POST['login'] );
            $email     = formatChars( $_POST['email'] );
            $avatar    = 0;
            $captha    = formatChars( $_POST['captcha'] );
            $country   = formatChars( $_POST['country'] );
            $pass = formatChars( $_POST['password'] );
            $password  = genPass( $pass, $login );

        if( $_SESSION['captcha'] == md5( $captha ) ) {

            $row = mysqli_fetch_assoc( mysqli_query( $CONNECT, "SELECT login FROM users WHERE login = '$login'" ) );
            if ($row['login']) {
                echo json_encode(array('succes' => 'false', 'error' => 'Login ' . $login . ' is already used.'));
            }

            $row = mysqli_fetch_assoc( mysqli_query( $CONNECT, "SELECT email FROM users WHERE email = '$email'") );
            if ($row['email']) {
                echo json_encode( array( 'succes' => 'false','error' => 'Email ' .$email. ' is already used.' ) );
            }

            if ( mysqli_query( $CONNECT, "INSERT INTO users VALUES (NULL, '$login', '$password', '$name', '$email', '$country', '$avatar', NOW(), 0)") )  {

                $code = base64_encode( $email );

                mail( $email, 'Регистрация аккаунта', 'Ссылка для активации: http://cms/account/activate/code/' .$code);

                echo json_encode( array('succes' => 'true', 'message' => 'Account created') );

            } else {

                echo json_encode( array('succes' => 'false', 'message' => 'Could not create account') );

                echo( "Error description: " . mysqli_error( $CONNECT ) );

            }
    } else {
            echo json_encode( array( 'succes' => 'false', 'message' => 'Wrong Captcha' ) );
        }

    } else {
        echo json_encode( array( 'succes' => 'false', 'message' => 'Validation error' ) );
    }

}

