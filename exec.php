<?php
session_start();
include('connection.php');
$p=$_SESSION['SESS_MEMBER_ID'];
$cname=$_POST['fname'];
$lname=$_POST['lname'];
$c=0;
$d=0;
$k=0;
for($i=50*$g+1;$i<=50*$g+50;$i++)
{
$result = mysql_query("SELECT money AS av, id, mem_id as k
FROM bidd
WHERE id ='$p' and mem_id='$i'");
while( $row = mysql_fetch_assoc($result))
{
$c++;
if($cname==$row['k'])
{
$d=1;
}
}
}
$res = mysql_query("SELECT bidcash, cashrem, pla 
FROM member
WHERE mem_id ='$p'");
$ro = mysql_fetch_assoc($res);
$rest = mysql_query("SELECT * 
FROM pp
WHERE id ='$cname'");
$roe = mysql_fetch_assoc($rest);

$l=$c+$ro['pla'];
if($l<5 and $d==0 and $lname+$ro['bidcash']<=$ro['cashrem'] and $g*50<$cname and $cname<50*($g+1)+1 and $lname>=$roe['price'])
{
$fname=$_SESSION['SESS_MEMBER_ID'];   
mysql_query("INSERT INTO bidd(mem_id,id,money)VALUES('$cname','$fname','$lname')");
$r=$ro['bidcash']+$lname;
mysql_query("update member set bidcash='$r' where mem_id='$p'");
header("location:  index.php");
}
else 
{
if($g*50>=$cname or $cname>=50*($g+1)+1)
{
 header("location:  index.php?error1");
}
else if($lname<$roe['price'])
{
header("location:  index.php?error4");
}
else if($d==1)
{
header("location:  index.php?error5");
}

else if($l>4)
{
header("location:  index.php?error2");
}
else if($lname+$ro['bidcash']>$ro['cashrem'])
{
header("location:  index.php?error3");
}

}
    mysql_close();
    ?>