<?php
require_once('auth.php');
include('connection.php');
?>
<html>
<head>
	<title>Bid Factor@Infotsav</title>
		
</head>
<body >
<?php include('temp.php');?>

<div id="content">
<div style="float:right;"><b>
<?php echo $_SESSION['SESS_FIRST_NAME']?>,<a href="log.php">Logout!</a></b>
</div>
<b><font size=3 color="blue">UPDATES:
<?php $result=mysql_query("SELECT upd FROM up");
while($row = mysql_fetch_assoc($result))
{
?><br/> <?php
echo "#".$row['upd'];
} 

?></b>
<div style="margin-left:35%"><font color="red"><b><?php if($g==12) echo "Session Ends at 3PM";
if($g==13) echo "Session Ends at 4PM";
if($g==14) echo "Session Ends at 5PM";
if($g==15) echo "Session Ends at 6PM";
if($g==16) echo "Session Ends at 7PM";
if($g==17) echo "Session Ends at 8PM";
if($g==17) echo "Game Ends Thanx For Playing";
?></b></font></div>
<div style="margin-left:35%">
<?php
if(isset($_GET['error1']))
{ 
echo "<div><font color=red><b>*Invalid Id To Bid On</b></font></div>";
}?>
<?php
if(isset($_GET['error2']))
{ 
echo "<div><font color=red><b>*Maximum Bids Placed</b></font></div>";
}?>
<?php
if(isset($_GET['error3']))
{ 
echo "<div><font color=red><b>*Insufficent Money</b></font></div>";
}
if(isset($_GET['error4']))
{ 
echo "<div><font color=red><b>*Invalid Amount</b></font></div>";
}
if(isset($_GET['error5']))
{ 
echo "<div><font color=red><b>*You cannot Bid twice!</b></font></div>";
}?></div>
<form id="slick-login" name="reg" action="<?php if($g==0)echo 'index.php';else echo 'exec.php';?>"  method="post">
<input type="text" name="fname" class="placeholder" placeholder="ID!">
<input type="text" name="lname" class="placeholder" placeholder="Your Bid!">&nbsp; &nbsp; &nbsp;
<input type="submit" value="Bid On!">
</form>

<div id="nav">
	<ul>
		<li><a href="index.php">1</a></li>
		<li><a href="index.php?remarks=2">2</a></li>
		<li><a href="index.php?remarks=3">3</a></li>
		<li><a href="index.php?remarks=4">4</a></li>
		<li><a href="index.php?remarks=5">5</a></li>
	</ul>
<?php
$remarks="";
if(isset($_GET['remarks']))
{ $remarks = $_GET['remarks']; }
if ($remarks>='1' and $remarks<='5' )
{
$c=$remarks-1;
}
else
{
$c=0;
}
?>	
 
</div>

<font color="black"><div style="float:left;">
<?php    
for($i=50*$g+$c*10+1;$i<50*($g)+$c*10+11;$i++)
{
$result = mysql_query("SELECT * from pp
WHERE id ='$i'") 
or die(mysql_error()); 

$row = mysql_fetch_assoc($result) or die("No rows returned by query");
if($i%2==0)
{
echo " 
<table><tr><th ><img src='".$row['pic']."'  width=200 height=220  /></th>
    <th ><i>Price:Rs.".$row['price']."/-</i><br><i>Game Score: ".$row['f']."</i></th>
	<th ><img src=generated/".$i.".png style=border: 1px solid gray;  /></th> </tr> </table>   ";
	}
	if($i%2==1)
{echo " <table><tr><th ><img src=generated/".$i.".png style=border: 1px solid gray;  /></th>
    <th ><i>Price:Rs.".$row['price']."/-</i><br><i>Game Score: ".$row['f']."</i></th>
    <th ><img src='".$row['pic']."'  width=200 height=220  /></th></tr></table> ";	

		}
		} 
?>	           </div></font>

<div id="nav">
	<ul>
		<li><a href="index.php">1</a></li>
		<li><a href="index.php?remarks=2">2</a></li>
		<li><a href="index.php?remarks=3">3</a></li>
		<li><a href="index.php?remarks=4">4</a></li>
		<li><a href="index.php?remarks=5">5</a></li>
	</ul>
<?php
$remarks="";
if(isset($_GET['remarks']))
{ $remarks = $_GET['remarks']; }
if ($remarks>='1' and $remarks<='5' )
{
$c=$remarks-1;
}
else
{
$c=0;
}
?>	

</div>
         </div>          
    </body>
</html>
