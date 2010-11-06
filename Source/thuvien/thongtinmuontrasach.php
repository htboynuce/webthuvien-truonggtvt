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

$KTColParam1_rs_thongtinmuontrasach = "12";
if (isset($_SESSION["kt_login_user"])) {
  $KTColParam1_rs_thongtinmuontrasach = $_SESSION["kt_login_user"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rs_thongtinmuontrasach = sprintf("SELECT thanhvien.MaThanhVien, thanhvien.TenThanhVien, phieumuon.MaPhieuMuon, chitietphieumuon.MaChiTietPhieuMuon, phieumuon.NgayHetHanThe, thanhvien.TongSoSachMuon, sach.MasSach, sach.TenSach, chitietphieumuon.NgayHetHan, chitietphieumuon.NgayMuon, cuonsach.MaCuonSach, cuonsach.Ma, chitietphieumuon.TinhTrang, thanhvien.Username FROM ((((chitietphieumuon LEFT JOIN phieumuon ON phieumuon.MaPhieuMuon=chitietphieumuon.MaPhieuMuon) LEFT JOIN thanhvien ON thanhvien.MaThanhVien=phieumuon.MaThanhVien) LEFT JOIN sach ON sach.MasSach=chitietphieumuon.MaSach) LEFT JOIN cuonsach ON cuonsach.Ma=chitietphieumuon.MaCuonSach) WHERE chitietphieumuon.TinhTrang=0  AND thanhvien.Username=%s ", GetSQLValueString($KTColParam1_rs_thongtinmuontrasach, "text"));
$rs_thongtinmuontrasach = mysql_query($query_rs_thongtinmuontrasach, $conn_project) or die(mysql_error());
$row_rs_thongtinmuontrasach = mysql_fetch_assoc($rs_thongtinmuontrasach);
$totalRows_rs_thongtinmuontrasach = mysql_num_rows($rs_thongtinmuontrasach);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="thongtinmuontrasach">
   <div id="thongtinmuontrasach_top">THÔNG TIN MƯỢN TRẢ SÁCH</div>
   <div id="thongtinmuontrasach_cen">
   <span class="docgia">Độc Giả :<?php echo $row_rs_thongtinmuontrasach['TenThanhVien']; ?></span><br />
     <?php do { ?>
      <div id="thongtinmuontrasach_cen1">
        Mã cuốn sách :<?php echo $row_rs_thongtinmuontrasach['MaCuonSach']; ?><br />
        Tên sách :<?php echo $row_rs_thongtinmuontrasach['TenSach']; ?><br />
        Ngày mượn :<?php echo $row_rs_thongtinmuontrasach['NgayMuon']; ?><br />
      Ngày hết hạn :<?php echo $row_rs_thongtinmuontrasach['NgayHetHan']; ?> </div>
       <?php } while ($row_rs_thongtinmuontrasach = mysql_fetch_assoc($rs_thongtinmuontrasach)); ?></div>
</div>
</body>
</html>
<?php
mysql_free_result($rs_thongtinmuontrasach);
?>
