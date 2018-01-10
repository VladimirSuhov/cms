<?php

function formatChars($data) {
    return nl2br( htmlspecialchars( trim($data), ENT_QUOTES ), false );
}

function genPass( $p1, $p2 ) {
   return md5('hahaha'.md5('lol'.$p1.'olo').md5('qwe'.$p2.'eqw'));
}

function dd($data) {
    echo '<pre>';
        var_dump($data);
    echo '</pre>';
}