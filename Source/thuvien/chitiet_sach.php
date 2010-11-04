<?php require_once('Connections/conn_project.php'); ?>
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

$KTColParam1_rs_sach = "1";
if (isset($_GET["masach"])) {
  $KTColParam1_rs_sach = $_GET["masach"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rs_sach = sprintf("SELECT linhvuc.MaLinhVuc, linhvuc.TenLinhVuc, nhaxuatban.MaNhaXuatBan, nhaxuatban.TenNhaXuatBan, sach.SoTrang, sach.GiaTien, sach.NamXuatBan, sach.GhiChu, sach.TenSach, sach.LanXuatBan, tacgia.MaTacGia, tacgia.TenTacGia, ngonngusach.MaNgonNguSach, ngonngusach.TenNgonNguSach, sach.MasSach, nhomsach.MaNhomSach, nhomsach.TenNhomSach, vitri.TenViTri, vitri.MaViTri FROM ((((((sach LEFT JOIN linhvuc ON linhvuc.MaLinhVuc=sach.MaLinhVuc) LEFT JOIN nhaxuatban ON nhaxuatban.MaNhaXuatBan=sach.MaNhaXuatBan) LEFT JOIN tacgia ON tacgia.MaTacGia=sach.MaTacGia) LEFT JOIN ngonngusach ON ngonngusach.MaNgonNguSach=sach.MaNgonNgu) LEFT JOIN nhomsach ON nhomsach.MaNhomSach=sach.MaNhom) LEFT JOIN vitri ON vitri.MaViTri=nhomsach.MaViTri) WHERE sach.MasSach=%s ", GetSQLValueString($KTColParam1_rs_sach, "int"));
$rs_sach = mysql_query($query_rs_sach, $conn_project) or die(mysql_error());
$row_rs_sach = mysql_fetch_assoc($rs_sach);
$totalRows_rs_sach = mysql_num_rows($rs_sach);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#chitiet_sach_bot {
	margin-top: 15px;
}
.style5 {font-size: 15px}
-->
</style>
</head>

<body>

<div id="chitiet_sach">
  <div id="chitiet_sach_top">THÔNG TIN CHI TIẾT VỀ SÁCH</div>
  
  <div id="chitiet_sach_cen">
  <table width="559" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200" height="25" align="center" valign="middle"><span class="style5">Tên Sách</span></td>
    <td width="359" height="25" align="center" valign="middle"><span class="style5"><?php echo $row_rs_sach['TenSach']; ?></span></td>
  </tr>
  <tr>
    <td width="200" height="25" align="center" valign="middle"><span class="style5">Tác Giả</span></td>
    <td width="359" height="25" align="center" valign="middle"><span class="style5"><?php echo $row_rs_sach['TenTacGia']; ?></span></td>
  </tr>
  <tr>
    <td width="200" height="25" align="center" valign="middle"><span class="style5">Nhà Xuất Bản</span></td>
    <td width="359" height="25" align="center" valign="middle"><span class="style5"><?php echo $row_rs_sach['TenNhaXuatBan']; ?></span></td>
  </tr>
  <tr>
    <td width="200" height="25" align="center" valign="middle"><span class="style5">Ngôn ngữ sách</span></td>
    <td width="359" height="25" align="center" valign="middle"><span class="style5"><?php echo $row_rs_sach['TenNgonNguSach']; ?></span></td>
  </tr>
  <tr>
    <td width="200" height="25" align="center" valign="middle"><span class="style5">Giá Tiền</span></td>
    <td width="359" height="25" align="center" valign="middle"><span class="style5"><?php echo $row_rs_sach['GiaTien']; ?></span></td>
  </tr>
  <tr>
    <td width="200" height="25" align="center" valign="middle"><span class="style5">Số Trang</span></td>
    <td width="359" height="25" align="center" valign="middle"><span class="style5"><?php echo $row_rs_sach['SoTrang']; ?></span></td>
  </tr>
  <tr>
    <td width="200" height="25" align="center" valign="middle"><span class="style5">Năm Xuất Bản</span></td>
    <td width="359" height="25" align="center" valign="middle"><span class="style5"><?php echo $row_rs_sach['NamXuatBan']; ?></span></td>
  </tr>
  <tr>
    <td width="200" height="25" align="center" valign="middle"><span class="style5">Lần Xuất Bản</span></td>
    <td width="359" height="25" align="center" valign="middle"><span class="style5"><?php echo $row_rs_sach['LanXuatBan']; ?></span></td>
  </tr>
  <tr>
    <td width="200" height="25" align="center" valign="middle"><span class="style5">Vị Trí</span></td>
    <td width="359" height="25" align="center" valign="middle"><span class="style5"><?php echo $row_rs_sach['TenViTri']; ?></span></td>
  </tr>
  <tr>
    <td width="200" height="25" align="center" valign="middle"><span class="style5">Ghi Chú</span></td>
    <td width="359" height="25" valign="top"><span class="style5"><?php echo $row_rs_sach['GhiChu']; ?></span></td>
  </tr>
</table>
</div>


<div id="chitiet_sach_bot">
  <a href="javascript:history.go(-1)"><img src="images/quaylai.gif" border="0" align="right" /></a><a href="javascript:history.go(-1)"> </a></div>
  <div class="clear"></div>
  
  </div>
  
</body>
</html>
<?php
mysql_free_result($rs_sach);
?>
