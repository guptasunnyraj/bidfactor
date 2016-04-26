<?php
session_start();
include('connection.php');
for($i=0;$i<=900;$i++)
{
$a=rand(0,75);
$c="png/".$a.".png";
mysql_query("update pp set pic='$c' where id='$i'");
}
    header("location: home.php");
    mysql_close($con);
    ?>