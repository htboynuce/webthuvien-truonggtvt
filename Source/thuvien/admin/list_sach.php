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
$tfi_listsach1 = new TFI_TableFilter($conn_conn_project, "tfi_listsach1");
$tfi_listsach1->addColumn("sach.MasSach", "NUMERIC_TYPE", "MasSach", "=");
$tfi_listsach1->addColumn("sach.TenSach", "STRING_TYPE", "TenSach", "%");
$tfi_listsach1->addColumn("linhvuc.MaLinhVuc", "NUMERIC_TYPE", "MaLinhVuc", "=");
$tfi_listsach1->addColumn("nhomsach.MaNhomSach", "NUMERIC_TYPE", "MaNhom", "=");
$tfi_listsach1->addColumn("nhaxuatban.MaNhaXuatBan", "NUMERIC_TYPE", "MaNhaXuatBan", "=");
$tfi_listsach1->addColumn("sach.NgayCapNhat", "STRING_TYPE", "NgayCapNhat", "%");
$tfi_listsach1->addColumn("tacgia.MaTacGia", "NUMERIC_TYPE", "MaTacGia", "=");
$tfi_listsach1->addColumn("sach.Visible", "CHECKBOX_1_0_TYPE", "Visible", "%");
$tfi_listsach1->addColumn("sach.SoLanMuon", "STRING_TYPE", "SoLanMuon", "%");
$tfi_listsach1->Execute();

// Sorter
$tso_listsach1 = new TSO_TableSorter("rssach1", "tso_listsach1");
$tso_listsach1->addColumn("sach.MasSach");
$tso_listsach1->addColumn("sach.TenSach");
$tso_listsach1->addColumn("linhvuc.TenLinhVuc");
$tso_listsach1->addColumn("nhomsach.TenNhomSach");
$tso_listsach1->addColumn("nhaxuatban.TenNhaXuatBan");
$tso_listsach1->addColumn("sach.NgayCapNhat");
$tso_listsach1->addColumn("tacgia.TenTacGia");
$tso_listsach1->addColumn("sach.Visible");
$tso_listsach1->addColumn("sach.SoLanMuon");
$tso_listsach1->setDefault("sach.MasSach");
$tso_listsach1->Execute();

// Navigation
$nav_listsach1 = new NAV_Regular("nav_listsach1", "rssach1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_linhvuc = "SELECT MaLinhVuc, TenLinhVuc FROM linhvuc";
$rs_linhvuc = mysql_query($query_rs_linhvuc, $conn_project) or die(mysql_error());
$row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc);
$totalRows_rs_linhvuc = mysql_num_rows($rs_linhvuc);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_nhomsach = "SELECT MaNhomSach, TenNhomSach, MaLinhVuc FROM nhomsach";
$rs_nhomsach = mysql_query($query_rs_nhomsach, $conn_project) or die(mysql_error());
$row_rs_nhomsach = mysql_fetch_assoc($rs_nhomsach);
$totalRows_rs_nhomsach = mysql_num_rows($rs_nhomsach);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_nhaxuatban = "SELECT MaNhaXuatBan, TenNhaXuatBan FROM nhaxuatban";
$rs_nhaxuatban = mysql_query($query_rs_nhaxuatban, $conn_project) or die(mysql_error());
$row_rs_nhaxuatban = mysql_fetch_assoc($rs_nhaxuatban);
$totalRows_rs_nhaxuatban = mysql_num_rows($rs_nhaxuatban);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_tacgia = "SELECT MaTacGia, TenTacGia FROM tacgia";
$rs_tacgia = mysql_query($query_rs_tacgia, $conn_project) or die(mysql_error());
$row_rs_tacgia = mysql_fetch_assoc($rs_tacgia);
$totalRows_rs_tacgia = mysql_num_rows($rs_tacgia);

//NeXTenesio3 Special List Recordset
$maxRows_rssach1 = $_SESSION['max_rows_nav_listsach1'];
$pageNum_rssach1 = 0;
if (isset($_GET['pageNum_rssach1'])) {
  $pageNum_rssach1 = $_GET['pageNum_rssach1'];
}
$startRow_rssach1 = $pageNum_rssach1 * $maxRows_rssach1;

// Defining List Recordset variable
$NXTFilter_rssach1 = "1=1";
if (isset($_SESSION['filter_tfi_listsach1'])) {
  $NXTFilter_rssach1 = $_SESSION['filter_tfi_listsach1'];
}
// Defining List Recordset variable
$NXTSort_rssach1 = "sach.MasSach";
if (isset($_SESSION['sorter_tso_listsach1'])) {
  $NXTSort_rssach1 = $_SESSION['sorter_tso_listsach1'];
}
mysql_select_db($database_conn_project, $conn_project);

$query_rssach1 = "SELECT sach.MasSach, sach.TenSach, sach.GhiChu, linhvuc.TenLinhVuc AS MaLinhVuc, nhomsach.TenNhomSach AS MaNhom, nhaxuatban.TenNhaXuatBan AS MaNhaXuatBan, sach.NgayCapNhat, tacgia.TenTacGia AS MaTacGia, sach.Visible, sach.SoLanMuon FROM (((sach LEFT JOIN linhvuc ON sach.MaLinhVuc = linhvuc.MaLinhVuc) LEFT JOIN nhomsach ON sach.MaNhom = nhomsach.MaNhomSach) LEFT JOIN nhaxuatban ON sach.MaNhaXuatBan = nhaxuatban.MaNhaXuatBan) LEFT JOIN tacgia ON sach.MaTacGia = tacgia.MaTacGia WHERE {$NXTFilter_rssach1} ORDER BY {$NXTSort_rssach1}";
$query_limit_rssach1 = sprintf("%s LIMIT %d, %d", $query_rssach1, $startRow_rssach1, $maxRows_rssach1);
$rssach1 = mysql_query($query_limit_rssach1, $conn_project) or die(mysql_error());
$row_rssach1 = mysql_fetch_assoc($rssach1);

if (isset($_GET['totalRows_rssach1'])) {
  $totalRows_rssach1 = $_GET['totalRows_rssach1'];
} else {
  $all_rssach1 = mysql_query($query_rssach1);
  $totalRows_rssach1 = mysql_num_rows($all_rssach1);
}
$totalPages_rssach1 = ceil($totalRows_rssach1/$maxRows_rssach1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listsach1->checkBoundries();
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
  .KT_col_MasSach {width:80px; overflow:hidden;}
  .KT_col_TenSach {width:200px; overflow:hidden;}
  .KT_col_MaLinhVuc {width:80px; overflow:hidden;}
  .KT_col_MaNhom {width:170px; overflow:hidden;}
  .KT_col_MaNhaXuatBan {width:160px; overflow:hidden;}
  .KT_col_NgayCapNhat {width:140px; overflow:hidden;}
  .KT_col_MaTacGia {width:160px; overflow:hidden;}
  .KT_col_Visible {width:140px; overflow:hidden;}
  .KT_col_SoLanMuon {width:80px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listsach1" align="center">
  <h1>Bảng sách
    <?php
  $nav_listsach1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listsach1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listsach1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listsach1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listsach1'] == 1) {
?>
                            <a href="<?php echo $tfi_listsach1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listsach1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="MasSach" class="KT_sorter KT_col_MasSach <?php echo $tso_listsach1->getSortIcon('sach.MasSach'); ?>"> <a href="<?php echo $tso_listsach1->getSortLink('sach.MasSach'); ?>">Mã Sách</a> </th>
            <th id="TenSach" class="KT_sorter KT_col_TenSach <?php echo $tso_listsach1->getSortIcon('sach.TenSach'); ?>"> <a href="<?php echo $tso_listsach1->getSortLink('sach.TenSach'); ?>">Tên sách</a> </th>
            <th id="MaLinhVuc" class="KT_sorter KT_col_MaLinhVuc <?php echo $tso_listsach1->getSortIcon('linhvuc.TenLinhVuc'); ?>"> <a href="<?php echo $tso_listsach1->getSortLink('linhvuc.TenLinhVuc'); ?>">Lĩnh Vực</a> </th>
            <th id="MaNhom" class="KT_sorter KT_col_MaNhom <?php echo $tso_listsach1->getSortIcon('nhomsach.TenNhomSach'); ?>"> <a href="<?php echo $tso_listsach1->getSortLink('nhomsach.TenNhomSach'); ?>">Nhóm sách</a> </th>
            <th id="MaNhaXuatBan" class="KT_sorter KT_col_MaNhaXuatBan <?php echo $tso_listsach1->getSortIcon('nhaxuatban.TenNhaXuatBan'); ?>"> <a href="<?php echo $tso_listsach1->getSortLink('nhaxuatban.TenNhaXuatBan'); ?>">Nhà Xuất Bản</a> </th>
            <th id="NgayCapNhat" class="KT_sorter KT_col_NgayCapNhat <?php echo $tso_listsach1->getSortIcon('sach.NgayCapNhat'); ?>"> <a href="<?php echo $tso_listsach1->getSortLink('sach.NgayCapNhat'); ?>">Ngày cập nhật</a> </th>
            <th id="MaTacGia" class="KT_sorter KT_col_MaTacGia <?php echo $tso_listsach1->getSortIcon('tacgia.TenTacGia'); ?>"> <a href="<?php echo $tso_listsach1->getSortLink('tacgia.TenTacGia'); ?>">Tác Giả</a> </th>
            <th id="Visible" class="KT_sorter KT_col_Visible <?php echo $tso_listsach1->getSortIcon('sach.Visible'); ?>"> <a href="<?php echo $tso_listsach1->getSortLink('sach.Visible'); ?>">Visible</a> </th>
            <th id="SoLanMuon" class="KT_sorter KT_col_SoLanMuon <?php echo $tso_listsach1->getSortIcon('sach.SoLanMuon'); ?>"> <a href="<?php echo $tso_listsach1->getSortLink('sach.SoLanMuon'); ?>">Số lần mượn</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listsach1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listsach1_MasSach" id="tfi_listsach1_MasSach" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listsach1_MasSach']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listsach1_TenSach" id="tfi_listsach1_TenSach" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listsach1_TenSach']); ?>" size="20" maxlength="45" /></td>
            <td><select name="tfi_listsach1_MaLinhVuc" id="tfi_listsach1_MaLinhVuc">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listsach1_MaLinhVuc']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_linhvuc['MaLinhVuc']?>"<?php if (!(strcmp($row_rs_linhvuc['MaLinhVuc'], @$_SESSION['tfi_listsach1_MaLinhVuc']))) {echo "SELECTED";} ?>><?php echo $row_rs_linhvuc['TenLinhVuc']?></option>
              <?php
} while ($row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc));
  $rows = mysql_num_rows($rs_linhvuc);
  if($rows > 0) {
      mysql_data_seek($rs_linhvuc, 0);
	  $row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc);
  }
?>
            </select>
            </td>
            <td><select name="tfi_listsach1_MaNhom" id="tfi_listsach1_MaNhom">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listsach1_MaNhom']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_nhomsach['MaNhomSach']?>"<?php if (!(strcmp($row_rs_nhomsach['MaNhomSach'], @$_SESSION['tfi_listsach1_MaNhom']))) {echo "SELECTED";} ?>><?php echo $row_rs_nhomsach['TenNhomSach']?></option>
              <?php
} while ($row_rs_nhomsach = mysql_fetch_assoc($rs_nhomsach));
  $rows = mysql_num_rows($rs_nhomsach);
  if($rows > 0) {
      mysql_data_seek($rs_nhomsach, 0);
	  $row_rs_nhomsach = mysql_fetch_assoc($rs_nhomsach);
  }
?>
            </select>
            </td>
            <td><select name="tfi_listsach1_MaNhaXuatBan" id="tfi_listsach1_MaNhaXuatBan">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listsach1_MaNhaXuatBan']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_nhaxuatban['MaNhaXuatBan']?>"<?php if (!(strcmp($row_rs_nhaxuatban['MaNhaXuatBan'], @$_SESSION['tfi_listsach1_MaNhaXuatBan']))) {echo "SELECTED";} ?>><?php echo $row_rs_nhaxuatban['TenNhaXuatBan']?></option>
              <?php
} while ($row_rs_nhaxuatban = mysql_fetch_assoc($rs_nhaxuatban));
  $rows = mysql_num_rows($rs_nhaxuatban);
  if($rows > 0) {
      mysql_data_seek($rs_nhaxuatban, 0);
	  $row_rs_nhaxuatban = mysql_fetch_assoc($rs_nhaxuatban);
  }
?>
            </select>
            </td>
            <td><input type="text" name="tfi_listsach1_NgayCapNhat" id="tfi_listsach1_NgayCapNhat" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listsach1_NgayCapNhat']); ?>" size="20" maxlength="22" /></td>
            <td><select name="tfi_listsach1_MaTacGia" id="tfi_listsach1_MaTacGia">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listsach1_MaTacGia']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_tacgia['MaTacGia']?>"<?php if (!(strcmp($row_rs_tacgia['MaTacGia'], @$_SESSION['tfi_listsach1_MaTacGia']))) {echo "SELECTED";} ?>><?php echo $row_rs_tacgia['TenTacGia']?></option>
              <?php
} while ($row_rs_tacgia = mysql_fetch_assoc($rs_tacgia));
  $rows = mysql_num_rows($rs_tacgia);
  if($rows > 0) {
      mysql_data_seek($rs_tacgia, 0);
	  $row_rs_tacgia = mysql_fetch_assoc($rs_tacgia);
  }
?>
            </select>
            </td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listsach1_Visible']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listsach1_Visible" id="tfi_listsach1_Visible" value="1" /></td>
            <td><input type="text" name="tfi_listsach1_SoLanMuon" id="tfi_listsach1_SoLanMuon" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listsach1_SoLanMuon']); ?>" size="20" maxlength="20" /></td>
            <td><input type="submit" name="tfi_listsach1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rssach1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="11"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rssach1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_sach" class="id_checkbox" value="<?php echo $row_rssach1['MasSach']; ?>" />
                <input type="hidden" name="MasSach" class="id_field" value="<?php echo $row_rssach1['MasSach']; ?>" />
            </td>
            <td><div class="KT_col_MasSach"><?php echo KT_FormatForList($row_rssach1['MasSach'], 20); ?></div></td>
            <td><div class="KT_col_TenSach"><?php echo KT_FormatForList($row_rssach1['TenSach'], 200); ?></div></td>
            <td><div class="KT_col_MaLinhVuc"><?php echo KT_FormatForList($row_rssach1['MaLinhVuc'], 200); ?></div></td>
            <td><div class="KT_col_MaNhom"><?php echo KT_FormatForList($row_rssach1['MaNhom'], 200); ?></div></td>
            <td><div class="KT_col_MaNhaXuatBan"><?php echo KT_FormatForList($row_rssach1['MaNhaXuatBan'], 200); ?></div></td>
            <td><?php echo date('d/m/Y',strtotime($row_rssach1['NgayCapNhat'])); ?></td>
            <td><div class="KT_col_MaTacGia"><?php echo KT_FormatForList($row_rssach1['MaTacGia'], 200); ?></div></td>
            <td><div align="center">
              <?php 
// Show IF Conditional region4 
if (@$row_rssach1['Visible'] == 1) {
?>
                <img src="tick.png" width="16" height="16" />
                <?php 
// else Conditional region4
} else { ?>
                <img src="checkbox_no.png" width="16" height="16" />
                <?php } 
// endif Conditional region4
?></div></td>
            <td><div class="KT_col_SoLanMuon"><?php echo KT_FormatForList($row_rssach1['SoLanMuon'], 20); ?></div></td>
            <td><a class="KT_edit_link" href="admincp_form.php?mod=form_sach&amp;MasSach=<?php echo $row_rssach1['MasSach']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rssach1 = mysql_fetch_assoc($rssach1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listsach1->Prepare();
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
        <a class="KT_additem_op_link" href="admincp_form.php?mod=form_sach&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>


</body>
</html>
<?php
mysql_free_result($rs_linhvuc);

mysql_free_result($rs_nhomsach);

mysql_free_result($rs_nhaxuatban);

mysql_free_result($rs_tacgia);

mysql_free_result($rssach1);
?>
