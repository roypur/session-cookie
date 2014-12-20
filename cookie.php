<?php


$key = "adf337c8acb30da926a441522466159243fe12cf8e75731af5c1e18a7dd9a25c";

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
    setcookie("hash", $hash, $cookie['expiry']);
    if(strlen($uid)){
        return true;
        }
    }
?>
 
