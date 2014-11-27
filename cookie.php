<?php

$pass = "61e7680d2ac47e5b9e3c82118fae6e3cfcddff285ac75bb82872bb01f24ac657";

function valCookie(){
    $cookie = hex2bin(json_decode($_COOKIE['session']));
    $hash = hash(sha256, $_SERVER['REMOTE_ADDR'] . $cookie['uid'] . $cookie['expiry'] . $pass);
    if ((strcmp($hash, $cookie['hash']) == 0) && ($cookie['expiry'] > time())){
        return $cookie['uid']; //return user id.
        }
    }

function hashCookie($uid, $life){
    $text['uid'] = $uid;
    $text['expiry'] = time() + $life;
    $text['hash'] = hash(sha256, $_SERVER['REMOTE_ADDR'] . $text['uid'] . $text['expiry'] . $pass);
    setcookie("session", bin2hex(json_encode($text)));
    if(strlen($uid)){
        return $uid;
    }
}

?>
