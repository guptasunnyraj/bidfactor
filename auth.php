<?php
ob_start();
@session_start();
if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
header("location: log.php");
ob_flush();
exit();
}
?>