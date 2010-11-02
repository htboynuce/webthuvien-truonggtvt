<?php require_once('../Connections/conn_project.php'); ?>
<?php
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

$KTColParam2_rs_thongkedocgia = "2010-08-20";
if (isset($_GET["key4"])) {
  $KTColParam2_rs_thongkedocgia = $_GET["key4"];
}
$KTColParam3_rs_thongkedocgia = "2010-09-20";
if (isset($_GET["key5"])) {
  $KTColParam3_rs_thongkedocgia = $_GET["key5"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rs_thongkedocgia = sprintf("SELECT thanhvien.MaThanhVien, thanhvien.TenThanhVien, thanhvien.Username, thanhvien.Level FROM thanhvien WHERE thanhvien.Level=4 AND thanhvien.NgayLapThe BETWEEN %s AND %s", GetSQLValueString($KTColParam2_rs_thongkedocgia, "date"),GetSQLValueString($KTColParam3_rs_thongkedocgia, "date"));
$rs_thongkedocgia = mysql_query($query_rs_thongkedocgia, $conn_project) or die(mysql_error());
$row_rs_thongkedocgia = mysql_fetch_assoc($rs_thongkedocgia);
$totalRows_rs_thongkedocgia = mysql_num_rows($rs_thongkedocgia);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 
// Show IF Conditional region1 
if ((@$_GET['key4'] != "")&&(@$_GET['key5'] != "")) {
?>
  <div id="ketquathongke_docgia">
    
    <?php if ($totalRows_rs_thongkedocgia > 0) { // Show if recordset not empty ?>
      <div id="ketquathongke_docgia_cen">Số độc giả : <?php echo $totalRows_rs_thongkedocgia ?> </div>
      <?php } // Show if recordset not empty ?>
    <?php if ($totalRows_rs_thongkedocgia == 0) { // Show if recordset empty ?>
      <div id="ketquathongke_docgia_error">Không có độc giả nào! Vui lòng thống kê lại !</div>
      <?php } // Show if recordset empty ?>
</div>
  <?php } 
// endif Conditional region1
?></body>
</html>
<?php
mysql_free_result($rs_thongkedocgia);
?>
