<?php
session_start();
//$Refresh = 5;
require_once('connection.php');
//header("Refresh: " . $Refresh);
if($_SESSION['SESS_FIRST_NAME']=='ggrocks')
{

for($i=50*$g+1;$i<50*($g+1)+1;$i++)
{
$result = mysql_query("SELECT money AS av, id, mem_id as k
FROM bidd
WHERE mem_id ='$i'
ORDER BY `bidd`.`money` DESC");
if( $row = mysql_fetch_assoc($result))
{  
$cname=$row['k'];
$lname=$row['av'];
$fname=$row['id'];
$qye = mysql_query("SELECT *
FROM pp
WHERE id ='$i'");
$qz = mysql_fetch_assoc($qye);
mysql_query("INSERT INTO players(mem_id,id,money)VALUES('$cname','$fname','$lname')");
$res = mysql_query("SELECT *
FROM member
WHERE mem_id ='$fname'");
$ro = mysql_fetch_assoc($res);
$r=$ro['cashrem']-$lname;
$b=0;
$z=$ro['pla']+1;
$y=$ro['at']+$qz['f'];
$e=$ro['a']+$qz['a'];
$s=$ro['b']+$qz['b'];
$t=$ro['c']+$qz['c'];
$u=$ro['d']+$qz['d'];
$v=$ro['e']+$qz['e'];
mysql_query("update member set cashrem='$r',bidcash='$b',pla='$z',at='$y',a='$e',b='$s',c='$t',d='$u',e='$v' where mem_id='$fname'");

 
}

}
$result = mysql_query("SELECT g
FROM imp");
$ro = mysql_fetch_assoc($result);
$g=$ro['g']+1;
mysql_query("update imp set g='$g'");
mysql_query("ALTER TABLE member  DROP bidcash");
mysql_query("ALTER TABLE member ADD bidcash INT( 11 ) NOT NULL ");
}
?>