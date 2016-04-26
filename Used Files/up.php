<?php
    
    require_once('connection.php');

for($i=1;$i<=9000;$i++)
{
mysql_query("update member set cashrem='50000',bidcash='0' where mem_id='$i'");
 
}


?>