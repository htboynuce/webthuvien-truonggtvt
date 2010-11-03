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

$maxRows_rs_sach = 10;
$pageNum_rs_sach = 0;
if (isset($_GET['pageNum_rs_sach'])) {
  $pageNum_rs_sach = $_GET['pageNum_rs_sach'];
}
$startRow_rs_sach = $pageNum_rs_sach * $maxRows_rs_sach;

$KTColParam1_rs_sach = "11";
if (isset($_GET["cat"])) {
  $KTColParam1_rs_sach = $_GET["cat"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rs_sach = sprintf("SELECT linhvuc.MaLinhVuc, linhvuc.TenLinhVuc, tacgia.TenTacGia, tacgia.MaTacGia, nhaxuatban.MaNhaXuatBan, nhaxuatban.TenNhaXuatBan, sach.MasSach, sach.TenSach, sach.cosachmoi, sach.GhiChu FROM (((sach LEFT JOIN linhvuc ON linhvuc.MaLinhVuc=sach.MaLinhVuc) LEFT JOIN nhaxuatban ON nhaxuatban.MaNhaXuatBan=sach.MaNhaXuatBan) LEFT JOIN tacgia ON tacgia.MaTacGia=sach.MaTacGia) WHERE linhvuc.MaLinhVuc=%s ", GetSQLValueString($KTColParam1_rs_sach, "int"));
$query_limit_rs_sach = sprintf("%s LIMIT %d, %d", $query_rs_sach, $startRow_rs_sach, $maxRows_rs_sach);
$rs_sach = mysql_query($query_limit_rs_sach, $conn_project) or die(mysql_error());
$row_rs_sach = mysql_fetch_assoc($rs_sach);

if (isset($_GET['totalRows_rs_sach'])) {
  $totalRows_rs_sach = $_GET['totalRows_rs_sach'];
} else {
  $all_rs_sach = mysql_query($query_rs_sach);
  $totalRows_rs_sach = mysql_num_rows($all_rs_sach);
}
$totalPages_rs_sach = ceil($totalRows_rs_sach/$maxRows_rs_sach)-1;

$KTColParam1_Recordset1 = "11";
if (isset($_GET["cat"])) {
  $KTColParam1_Recordset1 = $_GET["cat"];
}
mysql_select_db($database_conn_project, $conn_project);
$query_Recordset1 = sprintf("SELECT linhvuc.MaLinhVuc, linhvuc.TenLinhVuc, tacgia.TenTacGia, tacgia.MaTacGia, nhaxuatban.MaNhaXuatBan, nhaxuatban.TenNhaXuatBan, sach.MasSach, sach.TenSach, sach.cosachmoi, sach.GhiChu FROM (((sach LEFT JOIN linhvuc ON linhvuc.MaLinhVuc=sach.MaLinhVuc) LEFT JOIN nhaxuatban ON nhaxuatban.MaNhaXuatBan=sach.MaNhaXuatBan) LEFT JOIN tacgia ON tacgia.MaTacGia=sach.MaTacGia) WHERE linhvuc.MaLinhVuc=%s ", GetSQLValueString($KTColParam1_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conn_project) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$queryString_rs_sach = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rs_sach") == false && 
        stristr($param, "totalRows_rs_sach") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rs_sach = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rs_sach = sprintf("&totalRows_rs_sach=%d%s", $totalRows_rs_sach, $queryString_rs_sach);

$TFM_LimitLinksEndCount = 3;
$TFM_temp = $pageNum_rs_sach + 1;
$TFM_startLink = max(1,$TFM_temp - intval($TFM_LimitLinksEndCount/2));
$TFM_temp = $TFM_startLink + $TFM_LimitLinksEndCount - 1;
$TFM_endLink = min($TFM_temp, $totalPages_rs_sach + 1);
if($TFM_endLink != $TFM_temp) $TFM_startLink = max(1,$TFM_endLink - $TFM_LimitLinksEndCount + 1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_nbGroup(event, grpName) { //v6.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])? args[i+1] : img.MM_up);
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    nbArr = document[grpName];
    if (nbArr)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
      nbArr[nbArr.length] = img;
  } }
}
//-->
</script>
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
P7_opTTM('id:p7Tooltip_1','att:title','p7TTM01',8,300,5,1,1,0,0,0,300,0,1,1);
P7_opTTM('id:p7Tooltip_1','att:title','p7TTM01',8,300,5,1,1,0,0,0,300,0,1,1);
//-->
</script>
</head>

<body onload="MM_preloadImages('images/xemchitiet1.jpg')"> 
<div id="sach">
  <div id="sach_top">SÁCH</div>
  <table border="0">
    <tr>
      <?php
	  $i=0;
do { // horizontal looper version 3
      $i++;
?>
        <td>
        <div id="sach_khung">
          <div id="sach_khung1"><a href="index.php?mod=chitiet_sach&amp;cat=<?php echo $row_rs_sach['MaLinhVuc']; ?>&amp;masach=<?php echo $row_rs_sach['MasSach']; ?>"><?php echo $row_rs_sach['TenSach']; ?> </a> 
            <?php 
// Show IF Conditional region1 
if (@$row_rs_sach['cosachmoi'] == 1) {
?>
              <img src="images/New.gif" width="41" height="22" />
          <?php } 
// endif Conditional region1
?></div>
        Tác giả :&nbsp;
           <a title="<?php echo $row_rs_sach['GhiChu']; ?>" class="p7TTM_trg" id="p7Tooltip_<?php echo $i ?>"><?php echo $row_rs_sach['TenTacGia']; ?></a>
           <br />
           Nhà xuất bản :
           <?php echo $row_rs_sach['TenNhaXuatBan']; ?>
           
           <div id="sach_khung2">              <a  href="index.php?mod=chitiet_sach&amp;cat=<?php echo $row_rs_sach['MaLinhVuc']; ?>&amp;masach=<?php echo $row_rs_sach['MasSach']; ?>"><img src="images/xemchitiet.jpg" border="0" /></a> </div>
        </td>
          
        <?php
$row_rs_sach = mysql_fetch_assoc($rs_sach);
    if (!isset($nested_rs_sach)) {
      $nested_rs_sach= 1;
    }
    if (isset($row_rs_sach) && is_array($row_rs_sach) && $nested_rs_sach++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_rs_sach); //end horizontal looper version 3
?>
    </tr>
  </table>
</div>


<div id="sach_phantrang">

  <div align="center">
<?php
$TFM_Previous = $pageNum_rs_sach - 3;
if ($TFM_Previous >= 0) {
   printf('...<a href="'."%s?pageNum_rs_sach=%d%s", $currentPage, $TFM_Previous, $queryString_rs_sach.'">');
   echo "[Back] </a>...";
   //Basic-UltraDev Previous X pages SB
}
?>
<?php
for ($i = $TFM_startLink; $i <= $TFM_endLink; $i++) {
  $TFM_LimitPageEndCount = $i -1;
  if($TFM_LimitPageEndCount != $pageNum_rs_sach) {
    printf('<a href="'."%s?pageNum_rs_sach=%d%s", $currentPage, $TFM_LimitPageEndCount, $queryString_rs_sach.'">');
    echo "$i</a>";
  }else{
    echo "<strong>$i</strong>";
  }
if($i != $TFM_endLink) echo(" |");}
?>
<?php
$TFM_Next = $pageNum_rs_sach + 3;
$TFM_Last = $totalPages_rs_sach+1;
if ($TFM_Next - 1 < $totalPages_rs_sach) { 
  printf('...<a href="'."%s?pageNum_rs_sach=%d%s", $currentPage, $TFM_Next, $queryString_rs_sach.'">');
    echo "[Next] </a>...";
}
?></div>
</div>
</body>
</html>
<?php
mysql_free_result($rs_sach);

mysql_free_result($Recordset1);
?>
