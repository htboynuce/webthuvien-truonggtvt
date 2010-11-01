<?php require_once('../Connections/conn_project.php'); ?>
<?php
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
$tfi_listphieumuon1 = new TFI_TableFilter($conn_conn_project, "tfi_listphieumuon1");
$tfi_listphieumuon1->addColumn("phieumuon.MaPhieuMuon", "NUMERIC_TYPE", "MaPhieuMuon", "=");
$tfi_listphieumuon1->addColumn("phieumuon.TenPhieuMuon", "STRING_TYPE", "TenPhieuMuon", "%");
$tfi_listphieumuon1->addColumn("thanhvien.MaThanhVien", "NUMERIC_TYPE", "MaThanhVien", "=");
$tfi_listphieumuon1->addColumn("phieumuon.NgayHetHanThe", "STRING_TYPE", "NgayHetHanThe", "%");
$tfi_listphieumuon1->addColumn("phieumuon.NgayLapThe", "DATE_TYPE", "NgayLapThe", "=");
$tfi_listphieumuon1->Execute();

// Sorter
$tso_listphieumuon1 = new TSO_TableSorter("rsphieumuon1", "tso_listphieumuon1");
$tso_listphieumuon1->addColumn("phieumuon.MaPhieuMuon");
$tso_listphieumuon1->addColumn("phieumuon.TenPhieuMuon");
$tso_listphieumuon1->addColumn("thanhvien.Username");
$tso_listphieumuon1->addColumn("phieumuon.NgayHetHanThe");
$tso_listphieumuon1->addColumn("phieumuon.NgayLapThe");
$tso_listphieumuon1->setDefault("phieumuon.MaPhieuMuon");
$tso_listphieumuon1->Execute();

// Navigation
$nav_listphieumuon1 = new NAV_Regular("nav_listphieumuon1", "rsphieumuon1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conn_project, $conn_project);
$query_Recordset1 = "SELECT Username, MaThanhVien FROM thanhvien ORDER BY Username";
$Recordset1 = mysql_query($query_Recordset1, $conn_project) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//NeXTenesio3 Special List Recordset
$maxRows_rsphieumuon1 = $_SESSION['max_rows_nav_listphieumuon1'];
$pageNum_rsphieumuon1 = 0;
if (isset($_GET['pageNum_rsphieumuon1'])) {
  $pageNum_rsphieumuon1 = $_GET['pageNum_rsphieumuon1'];
}
$startRow_rsphieumuon1 = $pageNum_rsphieumuon1 * $maxRows_rsphieumuon1;

// Defining List Recordset variable
$NXTFilter_rsphieumuon1 = "1=1";
if (isset($_SESSION['filter_tfi_listphieumuon1'])) {
  $NXTFilter_rsphieumuon1 = $_SESSION['filter_tfi_listphieumuon1'];
}
// Defining List Recordset variable
$NXTSort_rsphieumuon1 = "phieumuon.MaPhieuMuon";
if (isset($_SESSION['sorter_tso_listphieumuon1'])) {
  $NXTSort_rsphieumuon1 = $_SESSION['sorter_tso_listphieumuon1'];
}
mysql_select_db($database_conn_project, $conn_project);

$query_rsphieumuon1 = "SELECT phieumuon.MaPhieuMuon, phieumuon.TenPhieuMuon, thanhvien.Username AS MaThanhVien, phieumuon.NgayHetHanThe, phieumuon.NgayLapThe FROM phieumuon LEFT JOIN thanhvien ON phieumuon.MaThanhVien = thanhvien.MaThanhVien WHERE {$NXTFilter_rsphieumuon1} ORDER BY {$NXTSort_rsphieumuon1}";
$query_limit_rsphieumuon1 = sprintf("%s LIMIT %d, %d", $query_rsphieumuon1, $startRow_rsphieumuon1, $maxRows_rsphieumuon1);
$rsphieumuon1 = mysql_query($query_limit_rsphieumuon1, $conn_project) or die(mysql_error());
$row_rsphieumuon1 = mysql_fetch_assoc($rsphieumuon1);

if (isset($_GET['totalRows_rsphieumuon1'])) {
  $totalRows_rsphieumuon1 = $_GET['totalRows_rsphieumuon1'];
} else {
  $all_rsphieumuon1 = mysql_query($query_rsphieumuon1);
  $totalRows_rsphieumuon1 = mysql_num_rows($all_rsphieumuon1);
}
$totalPages_rsphieumuon1 = ceil($totalRows_rsphieumuon1/$maxRows_rsphieumuon1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listphieumuon1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
  .KT_col_MaPhieuMuon {width:140px; overflow:hidden;}
  .KT_col_TenPhieuMuon {width:140px; overflow:hidden;}
  .KT_col_MaThanhVien {width:140px; overflow:hidden;}
  .KT_col_NgayHetHanThe {width:140px; overflow:hidden;}
  .KT_col_NgayLapThe {width:140px; overflow:hidden;}
</style>

</head>

<body>
<div class="KT_tng" id="listphieumuon1">
  <h1> Phiếu Mượn
    <?php
  $nav_listphieumuon1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listphieumuon1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listphieumuon1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listphieumuon1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listphieumuon1'] == 1) {
?>
                            <a href="<?php echo $tfi_listphieumuon1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listphieumuon1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="MaPhieuMuon" class="KT_sorter KT_col_MaPhieuMuon <?php echo $tso_listphieumuon1->getSortIcon('phieumuon.MaPhieuMuon'); ?>"> <a href="<?php echo $tso_listphieumuon1->getSortLink('phieumuon.MaPhieuMuon'); ?>">Mã Phiếu Mượn</a> </th>
            <th id="TenPhieuMuon" class="KT_sorter KT_col_TenPhieuMuon <?php echo $tso_listphieumuon1->getSortIcon('phieumuon.TenPhieuMuon'); ?>"> <a href="<?php echo $tso_listphieumuon1->getSortLink('phieumuon.TenPhieuMuon'); ?>">Tên Phiếu Mượn</a> </th>
            <th id="MaThanhVien" class="KT_sorter KT_col_MaThanhVien <?php echo $tso_listphieumuon1->getSortIcon('thanhvien.Username'); ?>"> <a href="<?php echo $tso_listphieumuon1->getSortLink('thanhvien.Username'); ?>">Thành Viên</a> </th>
            <th id="NgayHetHanThe" class="KT_sorter KT_col_NgayHetHanThe <?php echo $tso_listphieumuon1->getSortIcon('phieumuon.NgayHetHanThe'); ?>"> <a href="<?php echo $tso_listphieumuon1->getSortLink('phieumuon.NgayHetHanThe'); ?>">Ngày hết hạn thẻ</a> </th>
            <th id="NgayLapThe" class="KT_sorter KT_col_NgayLapThe <?php echo $tso_listphieumuon1->getSortIcon('phieumuon.NgayLapThe'); ?>"> <a href="<?php echo $tso_listphieumuon1->getSortLink('phieumuon.NgayLapThe'); ?>">Ngày lập thẻ</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listphieumuon1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listphieumuon1_MaPhieuMuon" id="tfi_listphieumuon1_MaPhieuMuon" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listphieumuon1_MaPhieuMuon']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listphieumuon1_TenPhieuMuon" id="tfi_listphieumuon1_TenPhieuMuon" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listphieumuon1_TenPhieuMuon']); ?>" size="20" maxlength="50" /></td>
            <td><select name="tfi_listphieumuon1_MaThanhVien" id="tfi_listphieumuon1_MaThanhVien">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listphieumuon1_MaThanhVien']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['MaThanhVien']?>"<?php if (!(strcmp($row_Recordset1['MaThanhVien'], @$_SESSION['tfi_listphieumuon1_MaThanhVien']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['Username']?></option>
              <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
            </select>
            </td>
            <td><input type="text" name="tfi_listphieumuon1_NgayHetHanThe" id="tfi_listphieumuon1_NgayHetHanThe" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listphieumuon1_NgayHetHanThe']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listphieumuon1_NgayLapThe" id="tfi_listphieumuon1_NgayLapThe" value="<?php echo @$_SESSION['tfi_listphieumuon1_NgayLapThe']; ?>" size="10" maxlength="22" /></td>
            <td><input type="submit" name="tfi_listphieumuon1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsphieumuon1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="7"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsphieumuon1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_phieumuon" class="id_checkbox" value="<?php echo $row_rsphieumuon1['MaPhieuMuon']; ?>" />
                <input type="hidden" name="MaPhieuMuon" class="id_field" value="<?php echo $row_rsphieumuon1['MaPhieuMuon']; ?>" />
            </td>
            <td><div class="KT_col_MaPhieuMuon"><?php echo KT_FormatForList($row_rsphieumuon1['MaPhieuMuon'], 20); ?></div></td>
            <td><div class="KT_col_TenPhieuMuon"><?php echo KT_FormatForList($row_rsphieumuon1['TenPhieuMuon'], 20); ?></div></td>
            <td><div class="KT_col_MaThanhVien"><?php echo KT_FormatForList($row_rsphieumuon1['MaThanhVien'], 20); ?></div></td>
            <td><div class="KT_col_NgayHetHanThe"><?php echo KT_FormatForList($row_rsphieumuon1['NgayHetHanThe'], 20); ?></div></td>
            <td><div class="KT_col_NgayLapThe"><?php echo KT_formatDate($row_rsphieumuon1['NgayLapThe']); ?></div></td>
            <td><a class="KT_edit_link" href="admincp_form.php?mod=form_phieumuon&amp;MaPhieuMuon=<?php echo $row_rsphieumuon1['MaPhieuMuon']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a><a class="KT_link" href="admincp_thuthu.php?mod=list_chitietphieumuon&amp;NxT_MaPhieuMuon=<?php echo $row_rsphieumuon1['MaPhieuMuon']; ?>&amp;KT_back=1">Chi tiết phiếu mượn</a> </td>
          </tr>
          <?php } while ($row_rsphieumuon1 = mysql_fetch_assoc($rsphieumuon1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listphieumuon1->Prepare();
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
        <a class="KT_additem_op_link" href="admincp_form.php?mod=form_phieumuon&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>

</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($rsphieumuon1);
?>
