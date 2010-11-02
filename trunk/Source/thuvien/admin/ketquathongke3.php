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

$KTColParam1_rs_thongke3 = "11";
if (isset($_GET["key2"])) {
  $KTColParam1_rs_thongke3 = $_GET["key2"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rs_thongke3 = sprintf("SELECT linhvuc.MaLinhVuc, linhvuc.TenLinhVuc, sach.MasSach, sach.TenSach, sach.cosachmoi, sach.SoSachConTrongKHo, sach.SoSachSuDungDuoc, sach.SoLuongNap, sach.NgayCapNhat FROM (sach LEFT JOIN linhvuc ON linhvuc.MaLinhVuc=sach.MaLinhVuc) WHERE linhvuc.MaLinhVuc=%s ", GetSQLValueString($KTColParam1_rs_thongke3, "text"));
$rs_thongke3 = mysql_query($query_rs_thongke3, $conn_project) or die(mysql_error());
$row_rs_thongke3 = mysql_fetch_assoc($rs_thongke3);
$totalRows_rs_thongke3 = mysql_num_rows($rs_thongke3);
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
if ((@$_GET['key3'] == "All") && (@$_GET['key4'] == "") && (@$_GET['key5'] == "")) {
?>
  <div id="ketquathongke_1">
    <?php if ($totalRows_rs_thongke3 > 0) { // Show if recordset not empty ?>
      <?php
     $tongnv=0;
	 for($i=0; $i<$totalRows_rs_thongke3;$i++)
	 {
	      $tongnv=$tongnv+ $row_rs_thongke3['SoLuongNap'];
	 }
  ?>
      <?php
     $tongsd=0;
	 for($j=0; $j<$totalRows_rs_thongke3;$j++)
	 {
	      $tongsd=$tongsd+ $row_rs_thongke3['SoSachSuDungDuoc'];
	 }
  ?>
      <div id="ketquathongke_1_top"><?php echo $row_rs_thongke3['TenLinhVuc']; ?></div>
      <div id="ketquathongke_1_cen">Tổng số <?php echo $row_rs_thongke3['TenLinhVuc']; ?> nhập vào  :<?php echo $tongnv ?>&nbsp;&nbsp;cuốn<br />
        Tổng số <?php echo $row_rs_thongke3['TenLinhVuc']; ?> sử dụng được :<?php echo $tongsd ?>&nbsp;&nbsp; cuốn<br/>
        <div id="xuatthongke">Xuất Phiếu Thống Kê        </div>
      </div>
      <?php } // Show if recordset not empty ?>
    <?php if ($totalRows_rs_thongke3 == 0) { // Show if recordset empty ?>
      <div id="ketquathongke_1_error">Không có cuốn sách nào trong khoảng thời gian bạn cần thống kê ! Vui lòng thống kê lại !</div>
      <?php } // Show if recordset empty ?>
  </div>
  <?php } 
// endif Conditional region1
?></body>
</html>
<?php
mysql_free_result($rs_thongke3);
?>