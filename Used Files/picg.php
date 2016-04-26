<?php
session_start();
include('connection.php');
for($i=1;$i<=2;$i++)
{
$result = mysql_query("SELECT * from pp
WHERE id ='$i'") 
or die(mysql_error());   
$row = mysql_fetch_assoc($result) or die("No rows returned by query");
	

	include "libchart/classes/libchart.php";

	$chart = new HorizontalBarChart(650, 220);

	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("TeamWork", $row['e']));
	$dataSet->addPoint(new Point("Management", $row['d']));
	$dataSet->addPoint(new Point("Leadership", $row['c']));
	$dataSet->addPoint(new Point("Creativity", $row['b']));
	$dataSet->addPoint(new Point("Coding", $row['a']));
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));

	$chart->setTitle($row['Avataar']."(ID:".$row['id'].")");
	$chart->render("generated/".$i.".png");
}
    header("location: home.php");
    mysql_close($con);
    ?>