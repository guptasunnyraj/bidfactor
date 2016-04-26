
<?php
    
    require_once('connection.php');

for($i=1;$i<=900;$i++)
{
$result = mysql_query("SELECT f 
FROM pp
WHERE id ='$i'");
if( $row = mysql_fetch_assoc($result))
{  
$cname=intval($row['f']/10)*100+100+intval($row['f']%10)*30;


mysql_query("update pp set price='$cname' where id='$i'");


 
}

}
?>