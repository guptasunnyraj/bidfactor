<?php
include('connection.php');
session_start();	
    //Unset the variables stored in session
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_FIRST_NAME']);
    unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
	<title>Bid Factor@Infotsav</title>
</head>
<body >
<?php include('temp.php');?>
<div id="content">
<div style="margin-left:28%"><font color=blue><b>Timeline: 9th-10th Nov(2PM-8PM)</b></font></div>
<form id="slick-login" name="reg" action="login_exec.php"  method="post">
<input type="text" name="username" class="placeholder" placeholder="Username!">
<input type="password" name="password" class="placeholder" placeholder="Your Password!">&nbsp; &nbsp; &nbsp;
<input type="submit" value="Log In!">
</form>
<div id="nav">
	<ul>
		<li><a href="log.php">1</a></li>
		<li><a href="log.php?remarks=2">2</a></li>
		<li><a href="log.php?remarks=3">3</a></li>
		<li><a href="log.php?remarks=4">4</a></li>
		<li><a href="log.php?remarks=5">5</a></li>
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
		<li><a href="log.php">1</a></li>
		<li><a href="log.php?remarks=2">2</a></li>
		<li><a href="log.php?remarks=3">3</a></li>
		<li><a href="log.php?remarks=4">4</a></li>
		<li><a href="log.php?remarks=5">5</a></li>
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