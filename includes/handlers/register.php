<?php

if ( $_POST['registration_form'] ) {

    if ( ! empty( $_POST['name'] ) &&
        ! empty( $_POST['login'] ) &&
        ! empty( $_POST['email'] ) &&
        ! empty( $_POST['country'] ))
    {

            $name = formatChars($_POST['name']);
            $login = formatChars($_POST['login']);
            $email = formatChars($_POST['email']);
            $country = formatChars($_POST['country']);
            $avatar = formatChars($_POST['avatar']);

            echo json_encode(array('succes' => 'true'));
    }

    $row = mysqli_fetch_assoc( mysqli_query( $CONNECT, "SELECT `login` FROM users WHERE `login` = $login") );
        if ($row['login']) echo json_encode(array('succes' => 'false','error' => 'Логин ' .$login. ' уже используется.'));
    $row = mysqli_fetch_assoc( mysqli_query( $CONNECT, "SELECT `login` FROM users WHERE `login` = $login") );
    if ($row['login']) echo json_encode(array('succes' => 'false','error' => 'Логин ' .$login. ' уже используется.'));
}