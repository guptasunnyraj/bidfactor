<?php
    require_once('auth.php');
include('connection.php');
    ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Profile</title>
    </head>
<body >
<?php include('temp.php');?>
        <div id="content">
		<div style="float:right; margin-bottom: 10px;"><b>
<?php echo $_SESSION['SESS_FIRST_NAME']?>,<a href="log.php">Logout!</a></b>
</div>
<?php
$c=0;
$p=$_SESSION['SESS_MEMBER_ID'];
$y=$_SESSION['SESS_FIRST_NAME'];
$res = mysql_query("SELECT *
FROM member
WHERE mem_id ='$p'");
while( $ro = mysql_fetch_assoc($res))
{
?>
<table border="1px" width="100%" style="margin-bottom: 20px;">
<tr>
<th width="20%"><?php echo $y;?></th>
<th width="20%">Cash:<?php echo $ro['cashrem'];?></th>

<th width="20%">Bidcash:<?php echo $ro['bidcash'];?></th>


<th width="20%">Game Score:<?php echo $ro['at'];?></th>

<th width="30%">Players:<?php echo $ro['pla'];?></th></tr>
</table>
<?php
}
 
 
        




$result = mysql_query("SELECT money AS av, id, mem_id as k
FROM bidd
WHERE id ='$p'");


while( $row = mysql_fetch_assoc($result))
{


if(50*$g<$row['k'] and $row['k']<50*($g+1)+1)
{
echo "<table><tr><th>Bid:</th></tr></table>";
$z=$row['k'];
$rsult = mysql_query("SELECT *
FROM pp
WHERE id ='$z'");
$ro = mysql_fetch_assoc($rsult);
$i="generated/".$row['k'].".png";
echo "<table><tr><th ><img src='".$ro['pic']."'  width=200 height=220  /></th>
    <th ><i>Your Bid:Rs.".$row['av']."/-</i><br><i>Price:Rs.".$ro['price']."/-</i><br><i>Game Score:".$ro['f']."</i></th>
	<th ><img src=".$i." style=border: 1px solid gray;  /></th> </tr> </table>  "; 
    
}

}
?>



	
<table style="margin-top:10px;"><tr><th >Remove Bid:</th></tr></table>
<p align="center"><?php
if(isset($_GET['error']))
{ 
echo "<div style=margin-left:30%><font color=red><b>*Invalid Id</b></font></div>";
}?>
<form id="slick-login" name="reg" action="delb.php"  method="post" align="centre">
<input type="text" name="fname" class="placeholder" placeholder="Mem_id!">
<input type="submit" value="Delete!">
</form>

</p>
<?php

$resul = mysql_query("SELECT money AS av, id, mem_id as k
FROM players
WHERE id ='$p'");

while( $roww = mysql_fetch_assoc($resul))
{

echo "<table><tr><th>Player In Your Team:</th></tr></table>";
$z=$roww['k'];
$rsult = mysql_query("SELECT *
FROM pp
WHERE id ='$z'");
$ro = mysql_fetch_assoc($rsult);
$t=$ro['price']*1.2;
$i="generated/".$roww['k'].".png";
echo "<table><tr><th ><img src=".$i." style=border: 1px solid gray;  /></th>
    <th ><i>Your Bid:Rs.".$roww['av']."/-</i><br><i>Price:Rs.".$ro['price']."/-</i><br><i>Sell At:Rs.".$t."/-</i><br><i>Game Score:".$ro['f']."</i></th>
	 <th ><img src='".$ro['pic']."'  width=200 height=220  /></th></tr> </table>  "; 
    
}
?>
<table><tr><th >Sell Player:</th></tr></table>
<p align="center"><?php
if(isset($_GET['erro']))
{ 
echo "<div style=margin-left:30%><font color=red><b>*Invalid Id</b></font></div>";
}?>
<form id="slick-login" name="reg" action="<?php if($g==0)echo 'index.php';else echo 'deb.php';?>"  method="post">
<input type="text" name="fname" class="placeholder" placeholder="Mem_id!">
<input type="submit" value="Delete!">
</form>

</p> 
<?php




 mysql_close();
?></div>
</body>
</html>