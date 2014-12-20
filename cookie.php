<?php

$key = hex2bin("8ef7200e7a3207799ecd741433439d5c41e17c30415fbe4121740821032d0f03261023dc346cb4ca2d868324985c6d7e21602c7de7b6fda0ab8d52f0fffd1811");

function valCookie(){
    if (isset($_COOKIE['session']) && isset($_COOKIE['hash'])){
        $cookie = json_decode(hex2bin($_COOKIE['session']), true);

        global $key;
        $hash = hash_hmac('sha256', $_COOKIE['session'], $key);
        $uid = $cookie['uid'];
        if ((hash_equals($hash, $_COOKIE['hash'])) && ($cookie['expiry'] > time())){
            return $uid; //return user id.
            }
        }
    }
function hashCookie($uid, $timeout = 3600){
    global $key;
    $cookie['uid'] = $uid;
    $cookie['expiry'] = time()+$timeout;
    
    $hexCookie = bin2hex(json_encode($cookie));
    
    $hash = hash_hmac('sha256', $hexCookie, $key);
    
    setcookie("session", $hexCookie, $cookie['expiry']);
    setcookie("hash", $hash);
    if(strlen($uid)){
        return true;
        }
    }
?>
 
