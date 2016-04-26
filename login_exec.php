<?php
session_start();
require_once('connection.php');

$qry="SELECT halt FROM imp";
$result=mysql_query($qry) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row[0]==1)
{
	header("location: log.php");
}
else
{

mysql_select_db("infotsav", $bd) or die("Could not select database");
$errmsg_arr = array();
$errflag = false;
function clean($str) {
$str = @trim($str);
if(get_magic_quotes_gpc()) {
$str = stripslashes($str);
}
return mysql_real_escape_string($str);
}
$username = clean($_POST['username']);
$password = clean($_POST['password']);
if($username == '') {
$errmsg_arr[] = 'Username missing';
$errflag = true;
}
if($password == '') {
$errmsg_arr[] = 'Password missing';
$errflag = true;
}
 if($errflag) {
$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
 session_write_close();
 header("location: login.php");
exit();
}
$password = md5($password);
$qry="SELECT * FROM users WHERE username='$username' AND password='$password'";
 $result=mysql_query($qry) or die(mysql_error());
if($result) {
if(mysql_num_rows($result) > 0) {
session_regenerate_id();
$member = mysql_fetch_assoc($result);
$b=$member['id'];
mysql_select_db("simple_login", $bd) or die("Could not select database");
$qery="SELECT * FROM member WHERE username='$username' ";
$reesult=mysql_query($qery);
if(mysql_num_rows($reesult)==0) {
$res=mysql_query("INSERT INTO member(username, mem_id, pla, at, cashrem, bidcash)VALUES('$username', '$b', '0',  '0','50000','0')")or die(mysql_error());
}
$_SESSION['SESS_MEMBER_ID'] = $member['id'];
$_SESSION['SESS_FIRST_NAME'] = $member['username'];
$_SESSION['SESS_LAST_NAME'] = $member['password'];
session_write_close();
header("location: index.php");
exit();
}else {
$errmsg_arr[] = 'user name and password not found';
$errflag = true;
echo "USERNAME not found";
 if($errflag) {
$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
session_write_close();
header("location: index.php");
exit();
 }
}
}else {
die("Query failed");
}
}
?>