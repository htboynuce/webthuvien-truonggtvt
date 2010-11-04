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

$KTColParam1_rs_sachmoi = "11";
if (isset($_GET["cat"])) {
  $KTColParam1_rs_sachmoi = $_GET["cat"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rs_sachmoi = sprintf("SELECT linhvuc.MaLinhVuc, linhvuc.TenLinhVuc, tacgia.MaTacGia, tacgia.TenTacGia, sach.MasSach, sach.TenSach, sach.cosachmoi FROM ((sach LEFT JOIN linhvuc ON linhvuc.MaLinhVuc=sach.MaLinhVuc) LEFT JOIN tacgia ON tacgia.MaTacGia=sach.MaTacGia) WHERE linhvuc.MaLinhVuc=%s  AND sach.cosachmoi=1  LIMIT 0,6", GetSQLValueString($KTColParam1_rs_sachmoi, "int"));
$rs_sachmoi = mysql_query($query_rs_sachmoi, $conn_project) or die(mysql_error());
$row_rs_sachmoi = mysql_fetch_assoc($rs_sachmoi);
$totalRows_rs_sachmoi = mysql_num_rows($rs_sachmoi);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
</head>


<body>
<div id="sachmoileft">
  <div id="sachmoileft_top">SÁCH MỚI</div>
  <marquee direction="up" scrolldelay="60" scrollamount="2" behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()">
  <div id="sachmoileft_cen">
    <?php do { ?>
      <div id="tensach"><a href="index.php?mod=chitiet_sach&amp;cat=<?php echo $row_rs_sachmoi['MaLinhVuc']; ?>&amp;masach=<?php echo $row_rs_sachmoi['MasSach']; ?>"><?php echo $row_rs_sachmoi['TenSach']; ?></a><img src="images/New.gif" width="41" height="22" /></div>
      <div id="tentacgia">
        <div id="tentacgia_1">
          <?php echo $row_rs_sachmoi['TenTacGia']; ?>          </div>
      </div>
      <?php } while ($row_rs_sachmoi = mysql_fetch_assoc($rs_sachmoi)); ?></div>
</marquee>      
</div>
</body>
</html>
<?php
mysql_free_result($rs_sachmoi);
?>
