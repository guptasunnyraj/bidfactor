<?php
$mysql_hostname = "localhost";
$mysql_user = "bidfactor";
$mysql_password = "sunny#bid";
$mysql_database = "simple_login";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
$result = mysql_query("SELECT g FROM imp");
$ro = mysql_fetch_assoc($result);
$g=$ro['g']-1;
if($g==18) $g=0;
?>