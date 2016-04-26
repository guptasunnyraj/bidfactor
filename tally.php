<?php
include('connection.php');
?>
<html>
<head>
	<title>Tally</title>
		
</head>
<body >
<?php include('temp.php');?>

<div id="content">
<table  width="100%" style="margin-top:30px;">
<tr>
<th width="20%">Rank</th>
<th width="20%">Username</th>
<th width="20%">Players</th>
<th width="20%">Game Score</th></tr>
<?php
$k=1;
for($i=5;$i>=0;$i--)
{
$result=mysql_query("SELECT *
FROM member
where pla='$i'
ORDER BY at DESC,a DESC,b DESC,c DESC,d DESC,e DESC,cashrem DESC");
while($row = mysql_fetch_assoc($result))
{
?>
<tr><th width="20%"><?php echo $k?></th>
<th width="20%"><?php echo $row['username']?></th>
<th width="20%"><?php echo $row['pla']?></th>
<th width="20%"><?php echo $row['at']?></th></tr>

<?php
$k++;
}
}
?>
</table>
</div>
</body>
</html>