<?php
// Connessione al DB
$host = 'localhost';
$user = 'fantagame';
$pass = 'vefmufopve30';
$data = 'my_fantagame';
$cn = @mysql_connect($host,$user,$pass) or die (mysql_error());
$sl = @mysql_select_db($data) or die (mysql_error());
?>

