<?php require_once('Connections/conn_project.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make unified connection variable
$conn_conn_project = new KT_connection($conn_project, $database_conn_project);

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_rs_userwelcome = "-1";
if (isset($_SESSION['kt_login_user'])) {
  $colname_rs_userwelcome = $_SESSION['kt_login_user'];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rs_userwelcome = sprintf("SELECT MaThanhVien, TenThanhVien, Username FROM thanhvien WHERE Username = %s", GetSQLValueString($colname_rs_userwelcome, "text"));
$rs_userwelcome = mysql_query($query_rs_userwelcome, $conn_project) or die(mysql_error());
$row_rs_userwelcome = mysql_fetch_assoc($rs_userwelcome);
$totalRows_rs_userwelcome = mysql_num_rows($rs_userwelcome);

// Make a logout transaction instance
$logoutTransaction = new tNG_logoutTransaction($conn_conn_project);
$tNGs->addTransaction($logoutTransaction);
// Register triggers
$logoutTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "KT_logout_now");
$logoutTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
// End of logout transaction instance

// Make a logout transaction instance
$logoutTransaction1 = new tNG_logoutTransaction($conn_conn_project);
$tNGs->addTransaction($logoutTransaction1);
// Register triggers
$logoutTransaction1->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "KT_logout_now");
$logoutTransaction1->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
// End of logout transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
</head>

<body>
<?php 
// Show IF Conditional region5 
if (@$_SESSION['kt_login_id'] != "") {
?>
   <div id="thanhvien">
   <div id="thanhvien_top">THÀNH VIÊN</div>
  <div id="thanhvien_cen"> Chào mừng bạn<br /> 
    <span class="chudo"><?php echo $row_rs_userwelcome['TenThanhVien']; ?></span> đã login <br />
    <?php
//Show If User Is Logged In (region1)
$isLoggedIn = new tNG_UserLoggedIn($conn_conn_project);
//Grand Levels: Level
$isLoggedIn->addLevel("1");
if ($isLoggedIn->Execute()) {
?>
      <a href="admin/admincp1.php">Trang quản lý</a>
      <?php
}
//End Show If User Is Logged In (region1)
?>
    <?php
//Show If User Is Logged In (region2)
$isLoggedIn1 = new tNG_UserLoggedIn($conn_conn_project);
//Grand Levels: Level
$isLoggedIn1->addLevel("2");
if ($isLoggedIn1->Execute()) {
?>
      <a href="admin/admincp_thuthu.php">Trang quản lý</a>
      <?php
}
//End Show If User Is Logged In (region2)
?>
    <br />
    <?php
//Show If User Is Logged In (region3)
$isLoggedIn2 = new tNG_UserLoggedIn($conn_conn_project);
//Grand Levels: Level
$isLoggedIn2->addLevel("3");
if ($isLoggedIn2->Execute()) {
?>
      <a href="admin/admincp_bpnhapsach.php">Trang quản lý</a>
      <?php
}
//End Show If User Is Logged In (region3)
?>
  <br />
      <a href="index.php?mod=user_cnthongtin">Cập nhật thông tin cá nhân</a><br />
      <a href="index.php?mod=thongtinmuontrasach">Xem thông tin mượn trả sách</a> <br />
<a href="<?php echo $logoutTransaction1->getLogoutLink(); ?>">Logout</a></div>
  <?php } 
// endif Conditional region5
?>
</body>
</html>
<?php
mysql_free_result($rs_userwelcome);
?>
