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

$maxRows_ketquatimkiem3khoa_moi = 10;
$pageNum_ketquatimkiem3khoa_moi = 0;
if (isset($_GET['pageNum_ketquatimkiem3khoa_moi'])) {
  $pageNum_ketquatimkiem3khoa_moi = $_GET['pageNum_ketquatimkiem3khoa_moi'];
}
$startRow_ketquatimkiem3khoa_moi = $pageNum_ketquatimkiem3khoa_moi * $maxRows_ketquatimkiem3khoa_moi;

$KTColParam1_ketquatimkiem3khoa_moi = "11";
if (isset($_GET["key2"])) {
  $KTColParam1_ketquatimkiem3khoa_moi = $_GET["key2"];
}
$KTColParam2_ketquatimkiem3khoa_moi = "kinh";
if (isset($_GET["key1"])) {
  $KTColParam2_ketquatimkiem3khoa_moi = $_GET["key1"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_ketquatimkiem3khoa_moi = sprintf("SELECT linhvuc.MaLinhVuc, linhvuc.TenLinhVuc, sach.MasSach, tacgia.MaTacGia, tacgia.TenTacGia, sach.GhiChu, sach.TenSach, sach.cosachmoi, nhomsach.MaNhomSach, nhomsach.TenNhomSach FROM (((sach LEFT JOIN linhvuc ON linhvuc.MaLinhVuc=sach.MaLinhVuc) LEFT JOIN tacgia ON tacgia.MaTacGia=sach.MaTacGia) LEFT JOIN nhomsach ON nhomsach.MaNhomSach=sach.MaNhom) WHERE linhvuc.MaLinhVuc=%s  AND sach.TenSach LIKE %s ", GetSQLValueString($KTColParam1_ketquatimkiem3khoa_moi, "text"),GetSQLValueString("%" . $KTColParam2_ketquatimkiem3khoa_moi . "%", "text"));
$query_limit_ketquatimkiem3khoa_moi = sprintf("%s LIMIT %d, %d", $query_ketquatimkiem3khoa_moi, $startRow_ketquatimkiem3khoa_moi, $maxRows_ketquatimkiem3khoa_moi);
$ketquatimkiem3khoa_moi = mysql_query($query_limit_ketquatimkiem3khoa_moi, $conn_project) or die(mysql_error());
$row_ketquatimkiem3khoa_moi = mysql_fetch_assoc($ketquatimkiem3khoa_moi);

if (isset($_GET['totalRows_ketquatimkiem3khoa_moi'])) {
  $totalRows_ketquatimkiem3khoa_moi = $_GET['totalRows_ketquatimkiem3khoa_moi'];
} else {
  $all_ketquatimkiem3khoa_moi = mysql_query($query_ketquatimkiem3khoa_moi);
  $totalRows_ketquatimkiem3khoa_moi = mysql_num_rows($all_ketquatimkiem3khoa_moi);
}
$totalPages_ketquatimkiem3khoa_moi = ceil($totalRows_ketquatimkiem3khoa_moi/$maxRows_ketquatimkiem3khoa_moi)-1;

$queryString_ketquatimkiem3khoa_moi = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_ketquatimkiem3khoa_moi") == false && 
        stristr($param, "totalRows_ketquatimkiem3khoa_moi") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_ketquatimkiem3khoa_moi = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_ketquatimkiem3khoa_moi = sprintf("&totalRows_ketquatimkiem3khoa_moi=%d%s", $totalRows_ketquatimkiem3khoa_moi, $queryString_ketquatimkiem3khoa_moi);

$TFM_LimitLinksEndCount = 3;
$TFM_temp = $pageNum_ketquatimkiem3khoa_moi + 1;
$TFM_startLink = max(1,$TFM_temp - intval($TFM_LimitLinksEndCount/2));
$TFM_temp = $TFM_startLink + $TFM_LimitLinksEndCount - 1;
$TFM_endLink = min($TFM_temp, $totalPages_ketquatimkiem3khoa_moi + 1);
if($TFM_endLink != $TFM_temp) $TFM_startLink = max(1,$TFM_endLink - $TFM_LimitLinksEndCount + 1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 
// Show IF Conditional region2 
if ((@$_GET['key1'] != "Nhập vào từ cần tìm")&&(@$_GET['key3'] == "All")) {
?>
  <div id="ketquatimkiem1khoa">
    <?php if ($totalRows_ketquatimkiem3khoa_moi > 0) { // Show if recordset not empty ?>
      <div id="ketquatimkiem1khoa_top"><?php echo $row_ketquatimkiem3khoa_moi['TenLinhVuc']; ?></div>
      <div id="ketquatimkiem1khoa_cen">
        <div id="ketquatimkiem1khoa_cen_cen1">
          <?php
  do { // horizontal looper version 3
?>
            <div id="ketquatimkiem1khoa_cen_cen2">
              <div align="center"><a href="index.php?mod=chitiet_sach&amp;cat=<?php echo $row_ketquatimkiem3khoa_moi['MaLinhVuc']; ?>&amp;masach=<?php echo $row_ketquatimkiem3khoa_moi['MasSach']; ?>"><?php echo $row_ketquatimkiem3khoa_moi['TenSach']; ?></a>
                  <?php 
// Show IF Conditional region1 
if (@$row_ketquatimkiem3khoa_moi['cosachmoi'] == 1) {
?>
                    <img src="images/New.gif" width="41" height="22" />
                    <?php } 
// endif Conditional region1
?>
                  <br />
                  <?php echo $row_ketquatimkiem3khoa_moi['TenTacGia']; ?><br/><br/>
                  <a href="index.php?mod=chitiet_sach&amp;cat=<?php echo $row_ketquatimkiem3khoa_moi['MaLinhVuc']; ?>&amp;masach=<?php echo $row_ketquatimkiem3khoa_moi['MasSach']; ?>"><img src="images/xemchitiet.jpg" border="0" /></a><br/>
              </div>
            </div>
            <br />
            <?php
    $row_ketquatimkiem3khoa_moi = mysql_fetch_assoc($ketquatimkiem3khoa_moi);
    if (!isset($nested_ketquatimkiem3khoa_moi)) {
      $nested_ketquatimkiem3khoa_moi= 1;
    }
    if (isset($row_ketquatimkiem3khoa_moi) && is_array($row_ketquatimkiem3khoa_moi) && $nested_ketquatimkiem3khoa_moi++ % 2==0) {
      echo "<div class=clear></div>";
    }
  } while ($row_ketquatimkiem3khoa_moi); //end horizontal looper version 3
?>
        </div>
      </div>
      <div class="clear"></div>
      <div id="ketquatimkiem1khoa_phantrang">
        <?php
$TFM_Previous = $pageNum_ketquatimkiem3khoa_moi - 3;
if ($TFM_Previous >= 0) {
   printf('<a href="'."%s?pageNum_ketquatimkiem3khoa_moi=%d%s", $currentPage, $TFM_Previous, $queryString_ketquatimkiem3khoa_moi.'">');
   echo "Back |";
   //Basic-UltraDev Previous X pages SB
}
?>
        <?php
for ($i = $TFM_startLink; $i <= $TFM_endLink; $i++) {
  $TFM_LimitPageEndCount = $i -1;
  if($TFM_LimitPageEndCount != $pageNum_ketquatimkiem3khoa_moi) {
    printf('<a href="'."%s?pageNum_ketquatimkiem3khoa_moi=%d%s", $currentPage, $TFM_LimitPageEndCount, $queryString_ketquatimkiem3khoa_moi.'">');
    echo "$i</a>";
  }else{
    echo "<strong>$i</strong>";
  }
if($i != $TFM_endLink) echo(" | ");}
?>
        <?php
$TFM_Next = $pageNum_ketquatimkiem3khoa_moi + 3;
$TFM_Last = $totalPages_ketquatimkiem3khoa_moi+1;
if ($TFM_Next - 1 < $totalPages_ketquatimkiem3khoa_moi) { 
  printf('|<a href="'."%s?pageNum_ketquatimkiem3khoa_moi=%d%s", $currentPage, $TFM_Next, $queryString_ketquatimkiem3khoa_moi.'">');
    echo "Next";
}
?>
      </div>
      <?php } // Show if recordset not empty ?>
    <div id="ketquatimkiem1khoa_error">
      <?php if ($totalRows_ketquatimkiem3khoa_moi == 0) { // Show if recordset empty ?>
        Không tìm thấy kết quả tìm kiếm nào ! Hãy thử tìm kiếm lại !
        <?php } // Show if recordset empty ?>
    </div>
  </div>
  <?php } 
// endif Conditional region2
?></body>
</html>
<?php
mysql_free_result($ketquatimkiem3khoa_moi);
?>
