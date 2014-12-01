<?php

$key = "61e7680d2ac47e5b9e3c82118fae6e3cfcddff285ac75bb82872bb01f24ac657";

function valCookie(){
    if (isset($_COOKIE['session'])){
        $cookie = json_decode(hex2bin($_COOKIE['session']), true);
        global $key;
        $hash = hash_hmac('sha256', $_SERVER['REMOTE_ADDR'] . $cookie['uid'] . $cookie['expiry'], $key);
        $uid = $cookie['uid'];
        if ((hash_equals($hash, $cookie['hash'])) && ($cookie['expiry'] > time())){
            return $uid; //return user id.
            }
        }
    }
function hashCookie($uid, $timeout = 3600){
    global $key;
    $cookie['uid'] = $uid;
    $cookie['expiry'] = time()+$timeout;
    $cookie['hash'] = hash_hmac('sha256', $_SERVER['REMOTE_ADDR'] . $cookie['uid'] . $cookie['expiry'], $key);
    $hexCookie = bin2hex(json_encode($cookie));
    setcookie("session", $hexCookie, $cookie['expiry']);
    if(strlen($uid)){
        return true;
    }
}
?>
