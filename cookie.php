<?php

$pass = "61e7680d2ac47e5b9e3c82118fae6e3cfcddff285ac75bb82872bb01f24ac657";

function valCookie(){
    if (isset($_COOKIE['session'])){
        $cookie = json_decode(hex2bin($_COOKIE['session']), true);
        global $pass;
        $hash = hash('sha256', $_SERVER['REMOTE_ADDR'] . $cookie['uid'] . $cookie['expiry'] . $pass);
        $uid = $cookie['uid'];
        if ((strcmp((string)$hash, (string)$cookie['hash']) == 0) && ($cookie['expiry'] > time())){
            return $uid; //return user id.
            }
        }
    }
function hashCookie($uid, $expiry){
    global $pass;
    $cookie['uid'] = $uid;
    $cookie['expiry'] = $expiry;
    $cookie['hash'] = hash('sha256', $_SERVER['REMOTE_ADDR'] . $cookie['uid'] . $cookie['expiry'] . $pass);
    $hexCookie = bin2hex(json_encode($cookie));
    setcookie("session", $hexCookie, $expiry);
    if(strlen($uid)){
        return true;
    }
}
?>
