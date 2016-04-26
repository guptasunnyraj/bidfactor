<?php
session_start();
include('connection.php');
$p=$_SESSION['SESS_MEMBER_ID'];
$cname=$_POST['fname'];
$t=0;
$res = mysql_query("SELECT *
FROM member
WHERE mem_id='$p'");
$ro = mysql_fetch_assoc($res);
$hh=$ro['cashrem'];
$fff=$ro['pla']-1;
$z=$ro['at'];
$e=$ro['a'];
$h=$ro['b'];
$i=$ro['c'];
$j=$ro['d'];
$k=$ro['e'];
$rep = mysql_query("SELECT price as p,f,a,b,c,d,e
FROM pp
WHERE id='$cname'");
$rop = mysql_fetch_assoc($rep);
$re = mysql_query("SELECT mem_id as p
FROM players
WHERE id='$p' and mem_id='$cname'");
$ro = mysql_fetch_assoc($re);
$r=$hh+intval($rop['p']*1.2);
$z=$z-$rop['f'];
$e=$e-$rop['a'];
$h=$h-$rop['b'];
$i=$i-$rop['c'];
$j=$j-$rop['d'];
$k=$k-$rop['e'];
if($ro['p']==$cname)

{
mysql_query("update member set cashrem='$r',pla='$fff',at='$z',a='$e',b='$h',c='$i',d='$j',e='$k' where mem_id='$p'");
mysql_query("delete from players where mem_id='$cname' AND id='$p'");
header("location: profile.php");
}
else
{
header("location: profile.php?erro");
}
 mysql_close();    ?>