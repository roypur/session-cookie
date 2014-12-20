<?php
echo date("d M y G:i", time()+200);
$db = new mysqli('127.0.0.1', 'root', '', 'new');
$result = $db->query("select * from users");
while($row = $result->fetch_assoc()){
echo $row['name'] . "<br>";
}

?>
