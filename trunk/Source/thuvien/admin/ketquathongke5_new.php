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

mysql_select_db($database_conn_project, $conn_project);
$query_rs_thongke5 = "SELECT MasSach, TenSach, SoLuongNap, SoSachSuDungDuoc, SoSachConTrongKHo FROM sach";
$rs_thongke5 = mysql_query($query_rs_thongke5, $conn_project) or die(mysql_error());
$row_rs_thongke5 = mysql_fetch_assoc($rs_thongke5);
$totalRows_rs_thongke5 = mysql_num_rows($rs_thongke5);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="ketquathongke_1">
  
  <?php 
 $tong=0;
  do { 

?>
   <?php
   $tong+=$row_rs_thongke5['SoLuongNap'];
   ?>
 
  <?php } while ($row_rs_thongke5 = mysql_fetch_assoc($rs_thongke5)); ?>
  
  <div id="ketquathongke_1_top"></div>
  <div id="ketquathongke_1_cen">
    Tổng số sách của thư viện:<?php echo $tong ?>&nbsp;&nbsp; cuốn<br/>
  <div id="xuatthongke">Xuất Phiếu Thống Kê </div>
  </div>
  
</div>
</body>
</html>
<?php
mysql_free_result($rs_thongke5);
?>