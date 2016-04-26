<?php
session_start();
include('connection.php');
$p=$_SESSION['SESS_MEMBER_ID'];
$cname=$_POST['fname'];
$res = mysql_query("SELECT bidcash
FROM member
WHERE mem_id='$p'");
$ro = mysql_fetch_assoc($res);
$h=$ro['bidcash'];
$rep = mysql_query("SELECT mem_id as a, id,money as k
FROM bidd
WHERE mem_id='$cname' AND id='$p'");
$rop = mysql_fetch_assoc($rep);
if($rop['a']==$cname and $g*50<$cname and $cname<50*($g+1)+1)
{
$r=$h-$rop['k'];
mysql_query("update member set bidcash='$r' where mem_id='$p'");
mysql_query("delete from bidd where mem_id='$cname' AND id='$p'");
header("location: profile.php");
}
else
{
header("location: profile.php?error");
}

    mysql_close();
    ?>