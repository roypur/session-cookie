session-cookie
==============
This script prevents users from tampering with your cookies.
This is done using hashing of the cookie and a secret key. see 
<b>index.php</b> for example usage.

Remember to change the <b>$key</b> variable in <b>cookie.php</b>.

You can use the function <b>genKey()</b> to generate a new key. 
You will need to copy the value to the <b>cookie.php</b> file.
