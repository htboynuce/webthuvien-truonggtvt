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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rs_ketquatimkiem1khoa = 10;
$pageNum_rs_ketquatimkiem1khoa = 0;
if (isset($_GET['pageNum_rs_ketquatimkiem1khoa'])) {
  $pageNum_rs_ketquatimkiem1khoa = $_GET['pageNum_rs_ketquatimkiem1khoa'];
}
$startRow_rs_ketquatimkiem1khoa = $pageNum_rs_ketquatimkiem1khoa * $maxRows_rs_ketquatimkiem1khoa;

$KTColParam1_rs_ketquatimkiem1khoa = "11";
if (isset($_GET["key2"])) {
  $KTColParam1_rs_ketquatimkiem1khoa = $_GET["key2"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rs_ketquatimkiem1khoa = sprintf("SELECT linhvuc.MaLinhVuc, linhvuc.TenLinhVuc, sach.MasSach, tacgia.MaTacGia, tacgia.TenTacGia, sach.GhiChu, sach.TenSach, sach.cosachmoi FROM ((sach LEFT JOIN linhvuc ON linhvuc.MaLinhVuc=sach.MaLinhVuc) LEFT JOIN tacgia ON tacgia.MaTacGia=sach.MaTacGia) WHERE linhvuc.MaLinhVuc=%s ", GetSQLValueString($KTColParam1_rs_ketquatimkiem1khoa, "text"));
$query_limit_rs_ketquatimkiem1khoa = sprintf("%s LIMIT %d, %d", $query_rs_ketquatimkiem1khoa, $startRow_rs_ketquatimkiem1khoa, $maxRows_rs_ketquatimkiem1khoa);
$rs_ketquatimkiem1khoa = mysql_query($query_limit_rs_ketquatimkiem1khoa, $conn_project) or die(mysql_error());
$row_rs_ketquatimkiem1khoa = mysql_fetch_assoc($rs_ketquatimkiem1khoa);

if (isset($_GET['totalRows_rs_ketquatimkiem1khoa'])) {
  $totalRows_rs_ketquatimkiem1khoa = $_GET['totalRows_rs_ketquatimkiem1khoa'];
} else {
  $all_rs_ketquatimkiem1khoa = mysql_query($query_rs_ketquatimkiem1khoa);
  $totalRows_rs_ketquatimkiem1khoa = mysql_num_rows($all_rs_ketquatimkiem1khoa);
}
$totalPages_rs_ketquatimkiem1khoa = ceil($totalRows_rs_ketquatimkiem1khoa/$maxRows_rs_ketquatimkiem1khoa)-1;

$KTColParam1_Recordset1 = "11";
if (isset($_GET["key2"])) {
  $KTColParam1_Recordset1 = $_GET["key2"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_Recordset1 = sprintf("SELECT linhvuc.MaLinhVuc, linhvuc.TenLinhVuc, sach.MasSach, tacgia.MaTacGia, tacgia.TenTacGia, sach.GhiChu, sach.TenSach, sach.cosachmoi FROM ((sach LEFT JOIN linhvuc ON linhvuc.MaLinhVuc=sach.MaLinhVuc) LEFT JOIN tacgia ON tacgia.MaTacGia=sach.MaTacGia) WHERE linhvuc.MaLinhVuc=%s ", GetSQLValueString($KTColParam1_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $conn_project) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$KTColParam1_rs_sach = "11";
if (isset($_GET["cat"])) {
  $KTColParam1_rs_sach = $_GET["cat"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rs_sach = sprintf("SELECT linhvuc.MaLinhVuc, linhvuc.TenLinhVuc, tacgia.TenTacGia, tacgia.MaTacGia, nhaxuatban.MaNhaXuatBan, nhaxuatban.TenNhaXuatBan, sach.MasSach, sach.TenSach, sach.cosachmoi, sach.GhiChu FROM (((sach LEFT JOIN linhvuc ON linhvuc.MaLinhVuc=sach.MaLinhVuc) LEFT JOIN nhaxuatban ON nhaxuatban.MaNhaXuatBan=sach.MaNhaXuatBan) LEFT JOIN tacgia ON tacgia.MaTacGia=sach.MaTacGia) WHERE linhvuc.MaLinhVuc=%s ", GetSQLValueString($KTColParam1_rs_sach, "int"));
$rs_sach = mysql_query($query_rs_sach, $conn_project) or die(mysql_error());
$row_rs_sach = mysql_fetch_assoc($rs_sach);
$totalRows_rs_sach = mysql_num_rows($rs_sach);

$queryString_rs_ketquatimkiem1khoa = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rs_ketquatimkiem1khoa") == false && 
        stristr($param, "totalRows_rs_ketquatimkiem1khoa") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rs_ketquatimkiem1khoa = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rs_ketquatimkiem1khoa = sprintf("&totalRows_rs_ketquatimkiem1khoa=%d%s", $totalRows_rs_ketquatimkiem1khoa, $queryString_rs_ketquatimkiem1khoa);

$TFM_LimitLinksEndCount = 3;
$TFM_temp = $pageNum_rs_ketquatimkiem1khoa + 1;
$TFM_startLink = max(1,$TFM_temp - intval($TFM_LimitLinksEndCount/2));
$TFM_temp = $TFM_startLink + $TFM_LimitLinksEndCount - 1;
$TFM_endLink = min($TFM_temp, $totalPages_rs_ketquatimkiem1khoa + 1);
if($TFM_endLink != $TFM_temp) $TFM_startLink = max(1,$TFM_endLink - $TFM_LimitLinksEndCount + 1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="p7ttm/p7TTMscripts.js"></script>
<link href="p7ttm/p7TTM01.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript">
<!--
<?php 
  $j=0;
do { 
  $j++;
?>
P7_opTTM('id:p7Tooltip_<?php echo $j ?>','att:title','p7TTM01',8,300,5,1,1,0,0,0,300,0,1,1);
<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
//-->
</script>
</head>

<body>
<?php 
// Show IF Conditional region2 
if (@$_GET['key3'] == "All") {
?>
    <div id="ketquatimkiem1khoa">
      <?php if ($totalRows_rs_ketquatimkiem1khoa > 0) { // Show if recordset not empty ?>
        <div id="ketquatimkiem1khoa_top"><?php echo $row_rs_ketquatimkiem1khoa['TenLinhVuc']; ?></div>
        <div id="ketquatimkiem1khoa_cen">
          <div id="ketquatimkiem1khoa_cen_cen1">
            <?php
do { // horizontal looper version 3
?>
              <div id="ketquatimkiem1khoa_cen_cen2">
                <div align="center"> <a href="index.php?mod=chitiet_sach&amp;cat=<?php echo $row_rs_sach['MaLinhVuc']; ?>&amp;masach=<?php echo $row_rs_sach['MasSach']; ?>"><?php echo $row_rs_ketquatimkiem1khoa['TenSach']; ?></a>
                    <?php 
// Show IF Conditional region1 
if (@$row_rs_ketquatimkiem1khoa['cosachmoi'] == 1) {
?>
                      <img src="images/New.gif" />
                      <?php } 
// endif Conditional region1
?>
                    <br/>
                    <a href="#" title="<?php echo $row_rs_ketquatimkiem1khoa['GhiChu']; ?>" class="p7TTM_trg" id="p7Tooltip_<?php echo $i ?>"><?php echo $row_rs_ketquatimkiem1khoa['TenTacGia']; ?></a><br/>
                    <br/>
                  <a href="index.php?mod=chitiet_sach&amp;cat=<?php echo $row_rs_sach['MaLinhVuc']; ?>&amp;masach=<?php echo $row_rs_sach['MasSach']; ?>"><img src="images/xemchitiet.jpg" border="0" /></a> </div>
              </div>
              <?php
$row_rs_ketquatimkiem1khoa = mysql_fetch_assoc($rs_ketquatimkiem1khoa);
    if (!isset($nested_rs_ketquatimkiem1khoa)) {
      $nested_rs_ketquatimkiem1khoa= 1;
    }
    if (isset($row_rs_ketquatimkiem1khoa) && is_array($row_rs_ketquatimkiem1khoa) && $nested_rs_ketquatimkiem1khoa++ % 2==0) {
      echo "<div class=clear></div>";
    }
  } while ($row_rs_ketquatimkiem1khoa); //end horizontal looper version 3
?>
          </div>
        </div>
        <div class="clear"></div>
        <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_rs_ketquatimkiem1khoa == 0) { // Show if recordset empty ?>
        <div id="ketquatimkiem1khoa_error">Không tìm thấy kết quả nào ! Hãy thử tìm kiếm lại !</div>
        <?php } // Show if recordset empty ?>
      <div id="ketquatimkiem1khoa_phantrang">
        <?php
$TFM_Previous = $pageNum_rs_ketquatimkiem1khoa - 3;
if ($TFM_Previous >= 0) {
   printf('...<a href="'."%s?pageNum_rs_ketquatimkiem1khoa=%d%s", $currentPage, $TFM_Previous, $queryString_rs_ketquatimkiem1khoa.'">');
   echo "Back </a>...";
   //Basic-UltraDev Previous X pages SB
}
?>
        <?php
for ($i = $TFM_startLink; $i <= $TFM_endLink; $i++) {
  $TFM_LimitPageEndCount = $i -1;
  if($TFM_LimitPageEndCount != $pageNum_rs_ketquatimkiem1khoa) {
    printf('<a href="'."%s?pageNum_rs_ketquatimkiem1khoa=%d%s", $currentPage, $TFM_LimitPageEndCount, $queryString_rs_ketquatimkiem1khoa.'">');
    echo "$i</a>";
  }else{
    echo "<strong>$i</strong>";
  }
if($i != $TFM_endLink) echo(" | ");}
?>
        <?php
$TFM_Next = $pageNum_rs_ketquatimkiem1khoa + 3;
$TFM_Last = $totalPages_rs_ketquatimkiem1khoa+1;
if ($TFM_Next - 1 < $totalPages_rs_ketquatimkiem1khoa) { 
  printf('...<a href="'."%s?pageNum_rs_ketquatimkiem1khoa=%d%s", $currentPage, $TFM_Next, $queryString_rs_ketquatimkiem1khoa.'">');
    echo " Next  </a>...";
}
?>
      </div>
    </div>
    <?php } 
// endif Conditional region2
?></body>
</html>
<?php
mysql_free_result($rs_ketquatimkiem1khoa);

mysql_free_result($Recordset1);

mysql_free_result($rs_sach);
?>
