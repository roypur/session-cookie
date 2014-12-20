<?php


$key = hex2bin("1edab484078913761a0443cf2dabfcbfd09331aec49489743c6b46b97e7d6d183446285edd498e66a6e1320b2506c53441670ce43eaeace65f18fa6097f55cf0");

function genKey(){
    $new = bin2hex(mcrypt_create_iv(64, MCRYPT_DEV_URANDOM));
    return $new;
}

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
 
