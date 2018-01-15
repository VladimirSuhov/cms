<?php
if ( $_POST['registration_form'] ) {

    if ( ! empty( $_POST['name'] )    &&
        ! empty( $_POST['login'] )    &&
        ! empty( $_POST['email'] )    &&
        ! empty( $_POST['country'] )  &&
        ! empty( $_POST['captcha'] )
        )
    {
            $name      = formatChars($_POST['name']);
            $login     = formatChars($_POST['login']);
            $email     = formatChars($_POST['email']);
            $avatar    = 0;
            $captha    = formatChars($_POST['captcha']);
            $country   = formatChars($_POST['country']);
            $password  = genPass( $_POST['password'], $_POST['login'] );

        if( $_SESSION['captcha'] == md5( $captha )) {

            $row1 = mysqli_query( $CONNECT, "SELECT * FROM users");

            $row = mysqli_fetch_assoc( mysqli_query( $CONNECT, "SELECT login FROM users WHERE login = '$login'" ) );
            if ($row['login']) echo json_encode( array( 'succes' => 'false','error' => 'Логин ' .$login. ' уже используется.' ) );
            $row = mysqli_fetch_assoc( mysqli_query( $CONNECT, "SELECT email FROM users WHERE email = '$email'") );
            if ($row['email']) echo json_encode( array( 'succes' => 'false','error' => 'Email ' .$email. ' уже используется.' ) );

            if ( mysqli_query( $CONNECT, "INSERT INTO users VALUES (NULL, '$login', '$password', '$name', '$email', '$country', '$avatar', NOW(), 0)") )  {

                $code = base64_encode( $email );

                mail( $email, 'Регистрация аккаунта', 'Ссылка для активации: http://cms/account/activate/code/'
                    .substr( $code, 5 ).substr( $code, 0, -5 ), 'From: Vova Kaifarik' );

                echo json_encode( array('succes' => 'true', 'message' => 'Аккаунт создан') );
            } else {
                echo json_encode( array('succes' => 'false', 'message' => 'Не удалось создать аккаунт') );
                echo( "Error description: " . mysqli_error( $CONNECT ) );
            }
    } else {
            echo json_encode( array( 'succes' => 'false', 'message' => 'Не верно введена Captcha' ) );
        }

    } else {
        echo json_encode( array( 'succes' => 'false', 'message' => 'Ошибка валидации формы ' ) );
    }

}