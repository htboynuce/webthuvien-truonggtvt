<?php require_once('../Connections/conn_project.php'); ?>
<?php
//MX Widgets3 include
require_once('../includes/wdg/WDG.php');

// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

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

// Filter
$tfi_listchitietphieumuon1 = new TFI_TableFilter($conn_conn_project, "tfi_listchitietphieumuon1");
$tfi_listchitietphieumuon1->addColumn("chitietphieumuon.MaChiTietPhieuMuon", "NUMERIC_TYPE", "MaChiTietPhieuMuon", "=");
$tfi_listchitietphieumuon1->addColumn("cuonsach.Ma", "NUMERIC_TYPE", "MaCuonSach", "=");
$tfi_listchitietphieumuon1->addColumn("sach.MasSach", "NUMERIC_TYPE", "MaSach", "=");
$tfi_listchitietphieumuon1->addColumn("chitietphieumuon.NgayMuon", "DATE_TYPE", "NgayMuon", "=");
$tfi_listchitietphieumuon1->addColumn("chitietphieumuon.NgayHetHan", "DATE_TYPE", "NgayHetHan", "=");
$tfi_listchitietphieumuon1->addColumn("chitietphieumuon.NgayTra", "DATE_TYPE", "NgayTra", "=");
$tfi_listchitietphieumuon1->addColumn("chitietphieumuon.TinhTrang", "NUMERIC_TYPE", "TinhTrang", "=");
$tfi_listchitietphieumuon1->Execute();

// Sorter
$tso_listchitietphieumuon1 = new TSO_TableSorter("rschitietphieumuon1", "tso_listchitietphieumuon1");
$tso_listchitietphieumuon1->addColumn("chitietphieumuon.MaChiTietPhieuMuon");
$tso_listchitietphieumuon1->addColumn("cuonsach.MaCuonSach");
$tso_listchitietphieumuon1->addColumn("sach.TenSach");
$tso_listchitietphieumuon1->addColumn("chitietphieumuon.NgayMuon");
$tso_listchitietphieumuon1->addColumn("chitietphieumuon.NgayHetHan");
$tso_listchitietphieumuon1->addColumn("chitietphieumuon.NgayTra");
$tso_listchitietphieumuon1->addColumn("chitietphieumuon.TinhTrang");
$tso_listchitietphieumuon1->setDefault("chitietphieumuon.MaChiTietPhieuMuon");
$tso_listchitietphieumuon1->Execute();

// Navigation
$nav_listchitietphieumuon1 = new NAV_Regular("nav_listchitietphieumuon1", "rschitietphieumuon1", "../", $_SERVER['PHP_SELF'], 10);

if (isset($_GET['NxT_MaPhieuMuon'])) {
  $NxTDetailCond__rschitietphieumuon1_cond = " chitietphieumuon.MaPhieuMuon = " . GetSQLValueString($_GET['NxT_MaPhieuMuon'], "int") . " ";
}

mysql_select_db($database_conn_project, $conn_project);
$query_Recordset1 = "SELECT TenPhieuMuon, MaPhieuMuon FROM phieumuon ORDER BY TenPhieuMuon";
$Recordset1 = mysql_query($query_Recordset1, $conn_project) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conn_project, $conn_project);
$query_Recordset2 = "SELECT TenSach, MasSach FROM sach ORDER BY TenSach";
$Recordset2 = mysql_query($query_Recordset2, $conn_project) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conn_project, $conn_project);
$query_Recordset3 = "SELECT Ma, MaCuonSach, MaSach FROM cuonsach ORDER BY MaCuonSach ASC";
$Recordset3 = mysql_query($query_Recordset3, $conn_project) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$NxTMasterId_rsphieumuon1 = "-1";
if (isset($_GET['NxT_MaPhieuMuon'])) {
  $NxTMasterId_rsphieumuon1 = $_GET['NxT_MaPhieuMuon'];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rsphieumuon1 = sprintf("SELECT MaPhieuMuon, TenPhieuMuon FROM phieumuon WHERE MaPhieuMuon = %s", GetSQLValueString($NxTMasterId_rsphieumuon1, "int"));
$rsphieumuon1 = mysql_query($query_rsphieumuon1, $conn_project) or die(mysql_error());
$row_rsphieumuon1 = mysql_fetch_assoc($rsphieumuon1);
$totalRows_rsphieumuon1 = mysql_num_rows($rsphieumuon1);

//NeXTenesio3 Special List Recordset
$maxRows_rschitietphieumuon1 = $_SESSION['max_rows_nav_listchitietphieumuon1'];
$pageNum_rschitietphieumuon1 = 0;
if (isset($_GET['pageNum_rschitietphieumuon1'])) {
  $pageNum_rschitietphieumuon1 = $_GET['pageNum_rschitietphieumuon1'];
}
$startRow_rschitietphieumuon1 = $pageNum_rschitietphieumuon1 * $maxRows_rschitietphieumuon1;

// Defining List Recordset variable
$NxTDetailCond_rschitietphieumuon1 = "1=1";
if (isset($NxTDetailCond__rschitietphieumuon1_cond)) {
  $NxTDetailCond_rschitietphieumuon1 = $NxTDetailCond__rschitietphieumuon1_cond;
}
// Defining List Recordset variable
$NXTFilter_rschitietphieumuon1 = "1=1";
if (isset($_SESSION['filter_tfi_listchitietphieumuon1'])) {
  $NXTFilter_rschitietphieumuon1 = $_SESSION['filter_tfi_listchitietphieumuon1'];
}
// Defining List Recordset variable
$NXTSort_rschitietphieumuon1 = "chitietphieumuon.MaChiTietPhieuMuon";
if (isset($_SESSION['sorter_tso_listchitietphieumuon1'])) {
  $NXTSort_rschitietphieumuon1 = $_SESSION['sorter_tso_listchitietphieumuon1'];
}
mysql_select_db($database_conn_project, $conn_project);

$query_rschitietphieumuon1 = "SELECT chitietphieumuon.MaChiTietPhieuMuon, phieumuon.TenPhieuMuon AS MaPhieuMuon, sach.TenSach AS MaSach, chitietphieumuon.NgayTra, chitietphieumuon.TinhTrang, cuonsach.MaCuonSach AS MaCuonSach, chitietphieumuon.NgayMuon, chitietphieumuon.NgayHetHan FROM ((chitietphieumuon LEFT JOIN phieumuon ON chitietphieumuon.MaPhieuMuon = phieumuon.MaPhieuMuon) LEFT JOIN sach ON chitietphieumuon.MaSach = sach.MasSach) LEFT JOIN cuonsach ON chitietphieumuon.MaCuonSach = cuonsach.Ma WHERE {$NXTFilter_rschitietphieumuon1} AND  {$NxTDetailCond_rschitietphieumuon1}  ORDER BY {$NXTSort_rschitietphieumuon1}";
$query_limit_rschitietphieumuon1 = sprintf("%s LIMIT %d, %d", $query_rschitietphieumuon1, $startRow_rschitietphieumuon1, $maxRows_rschitietphieumuon1);
$rschitietphieumuon1 = mysql_query($query_limit_rschitietphieumuon1, $conn_project) or die(mysql_error());
$row_rschitietphieumuon1 = mysql_fetch_assoc($rschitietphieumuon1);

if (isset($_GET['totalRows_rschitietphieumuon1'])) {
  $totalRows_rschitietphieumuon1 = $_GET['totalRows_rschitietphieumuon1'];
} else {
  $all_rschitietphieumuon1 = mysql_query($query_rschitietphieumuon1);
  $totalRows_rschitietphieumuon1 = mysql_num_rows($all_rschitietphieumuon1);
}
$totalPages_rschitietphieumuon1 = ceil($totalRows_rschitietphieumuon1/$maxRows_rschitietphieumuon1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listchitietphieumuon1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><script src="../includes/nxt/scripts/list.js" type="text/javascript"></script><script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script><style type="text/css">
  /* Dynamic List row settings */
  .KT_col_MaChiTietPhieuMuon {width:40px; overflow:hidden;}
  .KT_col_MaCuonSach {width:100px; overflow:hidden;}
  .KT_col_MaSach {width:140px; overflow:hidden;}
  .KT_col_NgayMuon {width:120px; overflow:hidden;}
  .KT_col_NgayHetHan {width:120px; overflow:hidden;}
  .KT_col_NgayTra {width:120px; overflow:hidden;}
  .KT_col_TinhTrang {width:40px; overflow:hidden;}
</style>
<script type="text/javascript" src="../includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../includes/wdg/classes/JSRecordset.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/DependentDropdown.js"></script>
<?php
//begin JSRecordset
$jsObject_Recordset3 = new WDG_JsRecordset("Recordset3");
echo $jsObject_Recordset3->getOutput();
//end JSRecordset
?>
</head>

<body>
<div class="KT_tng" id="listchitietphieumuon1" align="center">
  <h1> Chi Tiết Phiếu Mượn
    <?php
  $nav_listchitietphieumuon1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <?php 
// Show IF Conditional region4 
if (isset($_GET['NxT_MaPhieuMuon'])) {
?>
      <table>
        <tr class="KT_masterlink">
          <td>List records for: &nbsp; <strong><?php echo $row_rsphieumuon1['TenPhieuMuon']; ?></strong></td>
          <td align="right"><a href="../includes/nxt/back.php?KT_back=-2"> Phiếu Mượn List</a></td>
        </tr>
              </table>
      <?php } 
// endif Conditional region4
?><form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listchitietphieumuon1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listchitietphieumuon1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listchitietphieumuon1']; ?>
            <?php 
  // else Conditional region1
  } else { ?>
            <?php echo NXT_getResource("all"); ?>
            <?php } 
  // endif Conditional region1
?>
            <?php echo NXT_getResource("records"); ?></a> &nbsp;
        &nbsp;
                            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listchitietphieumuon1'] == 1) {
?>
                            <a href="<?php echo $tfi_listchitietphieumuon1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listchitietphieumuon1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>            </th>
            <th id="MaChiTietPhieuMuon" class="KT_sorter KT_col_MaChiTietPhieuMuon <?php echo $tso_listchitietphieumuon1->getSortIcon('chitietphieumuon.MaChiTietPhieuMuon'); ?>"> <a href="<?php echo $tso_listchitietphieumuon1->getSortLink('chitietphieumuon.MaChiTietPhieuMuon'); ?>">Mã CT Phiếu Mượn</a> </th>
            <th id="MaCuonSach" class="KT_sorter KT_col_MaCuonSach <?php echo $tso_listchitietphieumuon1->getSortIcon('cuonsach.MaCuonSach'); ?>"> <a href="<?php echo $tso_listchitietphieumuon1->getSortLink('cuonsach.MaCuonSach'); ?>">Mã Cuốn Sách</a> </th><th id="MaSach" class="KT_sorter KT_col_MaSach <?php echo $tso_listchitietphieumuon1->getSortIcon('sach.TenSach'); ?>"> <a href="<?php echo $tso_listchitietphieumuon1->getSortLink('sach.TenSach'); ?>">Tên Sách</a></th>
            <th id="NgayMuon" class="KT_sorter KT_col_NgayMuon <?php echo $tso_listchitietphieumuon1->getSortIcon('chitietphieumuon.NgayMuon'); ?>"> <a href="<?php echo $tso_listchitietphieumuon1->getSortLink('chitietphieumuon.NgayMuon'); ?>">Ngày Mượn</a> </th>
            <th id="NgayHetHan" class="KT_sorter KT_col_NgayHetHan <?php echo $tso_listchitietphieumuon1->getSortIcon('chitietphieumuon.NgayHetHan'); ?>"> <a href="<?php echo $tso_listchitietphieumuon1->getSortLink('chitietphieumuon.NgayHetHan'); ?>">Ngày Hết Hạn</a> </th>
            <th id="NgayTra" class="KT_sorter KT_col_NgayTra <?php echo $tso_listchitietphieumuon1->getSortIcon('chitietphieumuon.NgayTra'); ?>"> <a href="<?php echo $tso_listchitietphieumuon1->getSortLink('chitietphieumuon.NgayTra'); ?>">Ngày Trả</a> </th><th id="TinhTrang" class="KT_sorter KT_col_TinhTrang <?php echo $tso_listchitietphieumuon1->getSortIcon('chitietphieumuon.TinhTrang'); ?>"> <a href="<?php echo $tso_listchitietphieumuon1->getSortLink('chitietphieumuon.TinhTrang'); ?>">Tình Trạng</a> </th><th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listchitietphieumuon1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listchitietphieumuon1_MaChiTietPhieuMuon" id="tfi_listchitietphieumuon1_MaChiTietPhieuMuon" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listchitietphieumuon1_MaChiTietPhieuMuon']); ?>" size="20" maxlength="100" /></td>
            <td><select name="tfi_listchitietphieumuon1_MaCuonSach" id="tfi_listchitietphieumuon1_MaCuonSach">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listchitietphieumuon1_MaCuonSach']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset3['Ma']?>"<?php if (!(strcmp($row_Recordset3['Ma'], @$_SESSION['tfi_listchitietphieumuon1_MaCuonSach']))) {echo "SELECTED";} ?>><?php echo $row_Recordset3['MaCuonSach']?></option>
              <?php
} while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
  $rows = mysql_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysql_fetch_assoc($Recordset3);
  }
?>
            </select>            </td><td><select name="tfi_listchitietphieumuon1_MaSach" id="tfi_listchitietphieumuon1_MaSach" wdg:subtype="DependentDropdown" wdg:type="widget" wdg:recordset="Recordset3" wdg:displayfield="MaCuonSach" wdg:valuefield="Ma" wdg:fkey="MaSach" wdg:triggerobject="tfi_listchitietphieumuon1_MaCuonSach" wdg:selected="<?php @$_SESSION['tfi_listchitietphieumuon1_MaCuonSach'] ?>">
              <option value=""><?php echo NXT_getResource("None"); ?></option>
            </select>            </td>
            <td><input type="text" name="tfi_listchitietphieumuon1_NgayMuon" id="tfi_listchitietphieumuon1_NgayMuon" value="<?php echo @$_SESSION['tfi_listchitietphieumuon1_NgayMuon']; ?>" size="10" maxlength="22" /></td>
            <td><input type="text" name="tfi_listchitietphieumuon1_NgayHetHan" id="tfi_listchitietphieumuon1_NgayHetHan" value="<?php echo @$_SESSION['tfi_listchitietphieumuon1_NgayHetHan']; ?>" size="10" maxlength="22" /></td>
            <td><input type="text" name="tfi_listchitietphieumuon1_NgayTra" id="tfi_listchitietphieumuon1_NgayTra" value="<?php echo @$_SESSION['tfi_listchitietphieumuon1_NgayTra']; ?>" size="10" maxlength="22" /></td><td><input type="text" name="tfi_listchitietphieumuon1_TinhTrang" id="tfi_listchitietphieumuon1_TinhTrang" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listchitietphieumuon1_TinhTrang']); ?>" size="20" maxlength="100" /></td><td><input type="submit" name="tfi_listchitietphieumuon1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rschitietphieumuon1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="9"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rschitietphieumuon1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_chitietphieumuon" class="id_checkbox" value="<?php echo $row_rschitietphieumuon1['MaChiTietPhieuMuon']; ?>" />
                <input type="hidden" name="MaChiTietPhieuMuon" class="id_field" value="<?php echo $row_rschitietphieumuon1['MaChiTietPhieuMuon']; ?>" />            </td>
            <td><div class="KT_col_MaChiTietPhieuMuon"><?php echo KT_FormatForList($row_rschitietphieumuon1['MaChiTietPhieuMuon'], 20); ?></div></td>
            <td><div class="KT_col_MaCuonSach"><?php echo KT_FormatForList($row_rschitietphieumuon1['MaCuonSach'], 20); ?></div></td><td><div class="KT_col_MaSach"><?php echo KT_FormatForList($row_rschitietphieumuon1['MaSach'], 200); ?></div></td>
            <td><div class="KT_col_NgayMuon"><?php echo date('d/m/Y',strtotime($row_rschitietphieumuon1['NgayMuon'])); ?></div></td>
            <td><div class="KT_col_NgayHetHan"><?php echo date('d/m/Y',strtotime($row_rschitietphieumuon1['NgayHetHan'])); ?></div></td>
            <td><div class="KT_col_NgayTra"><?php echo date('d/m/Y',strtotime($row_rschitietphieumuon1['NgayTra'])); ?></div></td>
            
            <td><div align="center">
              <?php 
// Show IF Conditional region5 
if (@$row_rschitietphieumuon1['TinhTrang'] == 1) {
?>
                <img src="tick.png" width="16" height="16" />
                <?php 
// else Conditional region5
} else { ?>
                <img src="checkbox_no.png" width="16" height="16" />
                <?php } 
// endif Conditional region5
?></div></td>
            <td><a class="KT_edit_link" href="admincp1.php?<?php echo isset($_GET['NxT_MaPhieuMuon']) ? "NxT_MaPhieuMuon=".$_GET['NxT_MaPhieuMuon'] : ""; ?>&amp;mod=form_chitietphieumuon&amp;MaChiTietPhieuMuon=<?php echo $row_rschitietphieumuon1['MaChiTietPhieuMuon']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rschitietphieumuon1 = mysql_fetch_assoc($rschitietphieumuon1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listchitietphieumuon1->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
        <span>&nbsp;</span>
        <select name="no_new" id="no_new">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
        <a class="KT_additem_op_link" href="admincp1.php?<?php echo isset($_GET['NxT_MaPhieuMuon']) ? "NxT_MaPhieuMuon=".$_GET['NxT_MaPhieuMuon'] : ""; ?>&amp;mod=form_chitietphieumuon&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>


</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($rsphieumuon1);

mysql_free_result($rschitietphieumuon1);
?>
