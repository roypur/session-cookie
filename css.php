<html>
<header>
<link rel='stylesheet' type='text/css' href='style.css' />
<header>
<body>
<h1>hello</h1>
<div id='page'>
<table>
<?php
$db = new mysqli('127.0.0.1', 'root', '', 'new');
$result = $db->query("select navn, passord from elev");

while($row = $result->fetch_assoc()){
echo "<tr><td>" . $row['navn'] . "</tr>" . $row['passord'] . "</td></tr>";
}
?>
</table>
</div>

</body>
</html>
