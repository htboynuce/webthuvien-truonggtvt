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
$tfi_listthanhvien1 = new TFI_TableFilter($conn_conn_project, "tfi_listthanhvien1");
$tfi_listthanhvien1->addColumn("thanhvien.MaThanhVien", "NUMERIC_TYPE", "MaThanhVien", "=");
$tfi_listthanhvien1->addColumn("thanhvien.TenThanhVien", "STRING_TYPE", "TenThanhVien", "%");
$tfi_listthanhvien1->addColumn("thanhvien.TongSoSachMuon", "NUMERIC_TYPE", "TongSoSachMuon", "=");
$tfi_listthanhvien1->addColumn("thanhvien.Username", "STRING_TYPE", "Username", "%");
$tfi_listthanhvien1->addColumn("lop.MaLop", "NUMERIC_TYPE", "MaLop", "=");
$tfi_listthanhvien1->addColumn("khoa.MaKhoa", "NUMERIC_TYPE", "MaKhoa", "=");
$tfi_listthanhvien1->addColumn("thanhvien.NgayLapThe", "DATE_TYPE", "NgayLapThe", "=");
$tfi_listthanhvien1->addColumn("thanhvien.Email", "STRING_TYPE", "Email", "%");
$tfi_listthanhvien1->addColumn("thanhvien.SoLanLogin", "NUMERIC_TYPE", "SoLanLogin", "=");
$tfi_listthanhvien1->addColumn("thanhvien.DisableDateUser", "DATE_TYPE", "DisableDateUser", "=");
$tfi_listthanhvien1->addColumn("thanhvien.Active", "CHECKBOX_1_0_TYPE", "Active", "%");
$tfi_listthanhvien1->Execute();

// Sorter
$tso_listthanhvien1 = new TSO_TableSorter("rsthanhvien1", "tso_listthanhvien1");
$tso_listthanhvien1->addColumn("thanhvien.MaThanhVien");
$tso_listthanhvien1->addColumn("thanhvien.TenThanhVien");
$tso_listthanhvien1->addColumn("thanhvien.TongSoSachMuon");
$tso_listthanhvien1->addColumn("thanhvien.Username");
$tso_listthanhvien1->addColumn("lop.TenLop");
$tso_listthanhvien1->addColumn("khoa.TenKhoa");
$tso_listthanhvien1->addColumn("thanhvien.NgayLapThe");
$tso_listthanhvien1->addColumn("thanhvien.Email");
$tso_listthanhvien1->addColumn("thanhvien.SoLanLogin");
$tso_listthanhvien1->addColumn("thanhvien.DisableDateUser");
$tso_listthanhvien1->addColumn("thanhvien.Active");
$tso_listthanhvien1->setDefault("thanhvien.MaThanhVien");
$tso_listthanhvien1->Execute();

// Navigation
$nav_listthanhvien1 = new NAV_Regular("nav_listthanhvien1", "rsthanhvien1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_lop = "SELECT MaLop, TenLop, MaKhoa FROM lop";
$rs_lop = mysql_query($query_rs_lop, $conn_project) or die(mysql_error());
$row_rs_lop = mysql_fetch_assoc($rs_lop);
$totalRows_rs_lop = mysql_num_rows($rs_lop);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_khoa = "SELECT MaKhoa, TenKhoa FROM khoa";
$rs_khoa = mysql_query($query_rs_khoa, $conn_project) or die(mysql_error());
$row_rs_khoa = mysql_fetch_assoc($rs_khoa);
$totalRows_rs_khoa = mysql_num_rows($rs_khoa);

//NeXTenesio3 Special List Recordset
$maxRows_rsthanhvien1 = $_SESSION['max_rows_nav_listthanhvien1'];
$pageNum_rsthanhvien1 = 0;
if (isset($_GET['pageNum_rsthanhvien1'])) {
  $pageNum_rsthanhvien1 = $_GET['pageNum_rsthanhvien1'];
}
$startRow_rsthanhvien1 = $pageNum_rsthanhvien1 * $maxRows_rsthanhvien1;

// Defining List Recordset variable
$NXTFilter_rsthanhvien1 = "1=1";
if (isset($_SESSION['filter_tfi_listthanhvien1'])) {
  $NXTFilter_rsthanhvien1 = $_SESSION['filter_tfi_listthanhvien1'];
}
// Defining List Recordset variable
$NXTSort_rsthanhvien1 = "thanhvien.MaThanhVien";
if (isset($_SESSION['sorter_tso_listthanhvien1'])) {
  $NXTSort_rsthanhvien1 = $_SESSION['sorter_tso_listthanhvien1'];
}
mysql_select_db($database_conn_project, $conn_project);

$query_rsthanhvien1 = "SELECT lop.MaLop, lop.TenLop, khoa.MaKhoa, khoa.TenKhoa, phieumuon.MaPhieuMuon, chitietphieumuon.TinhTrang, thanhvien.TenThanhVien, thanhvien.MaThanhVien,thanhvien.GioiTinh, thanhvien.Username, thanhvien.Email, thanhvien.SoLanLogin, thanhvien.DisableDateUser, thanhvien.Active, count(chitietphieumuon.MaChiTietPhieuMuon)  AS count_MaChiTietPhieuMuon_1 FROM ((((chitietphieumuon LEFT JOIN phieumuon ON phieumuon.MaPhieuMuon=chitietphieumuon.MaPhieuMuon) LEFT JOIN thanhvien ON thanhvien.MaThanhVien=phieumuon.MaThanhVien) LEFT JOIN khoa ON khoa.MaKhoa=thanhvien.MaKhoa) LEFT JOIN lop ON lop.MaLop=thanhvien.MaLop) WHERE chitietphieumuon.TinhTrang=0 AND {$NXTFilter_rsthanhvien1}  GROUP BY lop.MaLop, lop.TenLop, khoa.MaKhoa, khoa.TenKhoa, phieumuon.MaPhieuMuon, chitietphieumuon.TinhTrang, thanhvien.TenThanhVien, thanhvien.GioiTinh, thanhvien.Username, thanhvien.Email, thanhvien.SoLanLogin, thanhvien.DisableDateUser, thanhvien.Active ORDER BY  {$NXTSort_rsthanhvien1} ";
$query_limit_rsthanhvien1 = sprintf("%s LIMIT %d, %d", $query_rsthanhvien1, $startRow_rsthanhvien1, $maxRows_rsthanhvien1);
$rsthanhvien1 = mysql_query($query_limit_rsthanhvien1, $conn_project) or die(mysql_error());
$row_rsthanhvien1 = mysql_fetch_assoc($rsthanhvien1);

if (isset($_GET['totalRows_rsthanhvien1'])) {
  $totalRows_rsthanhvien1 = $_GET['totalRows_rsthanhvien1'];
} else {
  $all_rsthanhvien1 = mysql_query($query_rsthanhvien1);
  $totalRows_rsthanhvien1 = mysql_num_rows($all_rsthanhvien1);
}
$totalPages_rsthanhvien1 = ceil($totalRows_rsthanhvien1/$maxRows_rsthanhvien1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listthanhvien1->checkBoundries();
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
  .KT_col_MaThanhVien {width:140px; overflow:hidden;}
  .KT_col_TenThanhVien {width:140px; overflow:hidden;}
  .KT_col_TongSoSachMuon {width:140px; overflow:hidden;}
  .KT_col_Username {width:140px; overflow:hidden;}
  .KT_col_MaLop {width:140px; overflow:hidden;}
  .KT_col_MaKhoa {width:140px; overflow:hidden;}
  .KT_col_NgayLapThe {width:140px; overflow:hidden;}
  .KT_col_Email {width:140px; overflow:hidden;}
  .KT_col_SoLanLogin {width:140px; overflow:hidden;}
  .KT_col_DisableDateUser {width:140px; overflow:hidden;}
  .KT_col_Active {width:140px; overflow:hidden;}
</style>

</head>

<body>
<div class="KT_tng" id="listthanhvien1">
  <h1> Thanhvien
    <?php
  $nav_listthanhvien1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listthanhvien1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listthanhvien1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listthanhvien1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listthanhvien1'] == 1) {
?>
                            <a href="<?php echo $tfi_listthanhvien1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listthanhvien1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="MaThanhVien" class="KT_sorter KT_col_MaThanhVien <?php echo $tso_listthanhvien1->getSortIcon('thanhvien.MaThanhVien'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('thanhvien.MaThanhVien'); ?>">Mã Thành Viên</a> </th>
            <th id="TenThanhVien" class="KT_sorter KT_col_TenThanhVien <?php echo $tso_listthanhvien1->getSortIcon('thanhvien.TenThanhVien'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('thanhvien.TenThanhVien'); ?>">Tên Thành Viên</a> </th>
            <th id="TongSoSachMuon" class="KT_sorter KT_col_TongSoSachMuon <?php echo $tso_listthanhvien1->getSortIcon('thanhvien.TongSoSachMuon'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('thanhvien.TongSoSachMuon'); ?>">Tổng Số Sách Đang Mượn </a> </th>
            <th id="Username" class="KT_sorter KT_col_Username <?php echo $tso_listthanhvien1->getSortIcon('thanhvien.Username'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('thanhvien.Username'); ?>">Số CMND</a> </th>
            <th id="MaLop" class="KT_sorter KT_col_MaLop <?php echo $tso_listthanhvien1->getSortIcon('lop.TenLop'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('lop.TenLop'); ?>">Lớp </a> </th>
            <th id="MaKhoa" class="KT_sorter KT_col_MaKhoa <?php echo $tso_listthanhvien1->getSortIcon('khoa.TenKhoa'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('khoa.TenKhoa'); ?>">Khoa</a> </th>
            <th id="NgayLapThe" class="KT_sorter KT_col_NgayLapThe <?php echo $tso_listthanhvien1->getSortIcon('thanhvien.NgayLapThe'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('thanhvien.NgayLapThe'); ?>">Ngày Lập Thẻ</a> </th>
            <th id="Email" class="KT_sorter KT_col_Email <?php echo $tso_listthanhvien1->getSortIcon('thanhvien.Email'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('thanhvien.Email'); ?>">Email</a> </th>
            <th id="SoLanLogin" class="KT_sorter KT_col_SoLanLogin <?php echo $tso_listthanhvien1->getSortIcon('thanhvien.SoLanLogin'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('thanhvien.SoLanLogin'); ?>">Số lần login</a> </th>
            <th id="DisableDateUser" class="KT_sorter KT_col_DisableDateUser <?php echo $tso_listthanhvien1->getSortIcon('thanhvien.DisableDateUser'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('thanhvien.DisableDateUser'); ?>">DisableDateUser</a> </th>
            <th id="Active" class="KT_sorter KT_col_Active <?php echo $tso_listthanhvien1->getSortIcon('thanhvien.Active'); ?>"> <a href="<?php echo $tso_listthanhvien1->getSortLink('thanhvien.Active'); ?>">Active</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listthanhvien1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listthanhvien1_MaThanhVien" id="tfi_listthanhvien1_MaThanhVien" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanhvien1_MaThanhVien']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listthanhvien1_TenThanhVien" id="tfi_listthanhvien1_TenThanhVien" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanhvien1_TenThanhVien']); ?>" size="20" maxlength="70" /></td>
            <td><input type="text" name="tfi_listthanhvien1_TongSoSachMuon" id="tfi_listthanhvien1_TongSoSachMuon" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanhvien1_TongSoSachMuon']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listthanhvien1_Username" id="tfi_listthanhvien1_Username" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanhvien1_Username']); ?>" size="20" maxlength="45" /></td>
            <td><select name="tfi_listthanhvien1_MaLop" id="tfi_listthanhvien1_MaLop">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listthanhvien1_MaLop']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_lop['MaLop']?>"<?php if (!(strcmp($row_rs_lop['MaLop'], @$_SESSION['tfi_listthanhvien1_MaLop']))) {echo "SELECTED";} ?>><?php echo $row_rs_lop['TenLop']?></option>
              <?php
} while ($row_rs_lop = mysql_fetch_assoc($rs_lop));
  $rows = mysql_num_rows($rs_lop);
  if($rows > 0) {
      mysql_data_seek($rs_lop, 0);
	  $row_rs_lop = mysql_fetch_assoc($rs_lop);
  }
?>
            </select>
            </td>
            <td><select name="tfi_listthanhvien1_MaKhoa" id="tfi_listthanhvien1_MaKhoa">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listthanhvien1_MaKhoa']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_khoa['MaKhoa']?>"<?php if (!(strcmp($row_rs_khoa['MaKhoa'], @$_SESSION['tfi_listthanhvien1_MaKhoa']))) {echo "SELECTED";} ?>><?php echo $row_rs_khoa['TenKhoa']?></option>
              <?php
} while ($row_rs_khoa = mysql_fetch_assoc($rs_khoa));
  $rows = mysql_num_rows($rs_khoa);
  if($rows > 0) {
      mysql_data_seek($rs_khoa, 0);
	  $row_rs_khoa = mysql_fetch_assoc($rs_khoa);
  }
?>
            </select>
            </td>
            <td><input type="text" name="tfi_listthanhvien1_NgayLapThe" id="tfi_listthanhvien1_NgayLapThe" value="<?php echo @$_SESSION['tfi_listthanhvien1_NgayLapThe']; ?>" size="10" maxlength="22" /></td>
            <td><input type="text" name="tfi_listthanhvien1_Email" id="tfi_listthanhvien1_Email" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanhvien1_Email']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listthanhvien1_SoLanLogin" id="tfi_listthanhvien1_SoLanLogin" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanhvien1_SoLanLogin']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listthanhvien1_DisableDateUser" id="tfi_listthanhvien1_DisableDateUser" value="<?php echo @$_SESSION['tfi_listthanhvien1_DisableDateUser']; ?>" size="10" maxlength="22" /></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listthanhvien1_Active']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listthanhvien1_Active" id="tfi_listthanhvien1_Active" value="1" /></td>
            <td><input type="submit" name="tfi_listthanhvien1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsthanhvien1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="13"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsthanhvien1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_thanhvien" class="id_checkbox" value="<?php echo $row_rsthanhvien1['MaThanhVien']; ?>" />
                <input type="hidden" name="MaThanhVien" class="id_field" value="<?php echo $row_rsthanhvien1['MaThanhVien']; ?>" />
            </td>
            <td><div class="KT_col_MaThanhVien"><?php echo KT_FormatForList($row_rsthanhvien1['MaThanhVien'], 20); ?></div></td>
            <td><div class="KT_col_TenThanhVien"><?php echo KT_FormatForList($row_rsthanhvien1['TenThanhVien'], 20); ?></div></td>
            <td><div class="KT_col_TenThanhVien"><?php echo KT_FormatForList($row_rsthanhvien1['count_MaChiTietPhieuMuon_1'], 20); ?></div></td>
            <td><div class="KT_col_Username"><?php echo KT_FormatForList($row_rsthanhvien1['Username'], 20); ?></div></td>
            <td><div class="KT_col_MaLop"><?php echo KT_FormatForList($row_rsthanhvien1['MaLop'], 20); ?></div></td>
            <td><div class="KT_col_MaKhoa"><?php echo KT_FormatForList($row_rsthanhvien1['MaKhoa'], 20); ?></div></td>
            <td><div class="KT_col_NgayLapThe"><?php echo KT_formatDate($row_rsthanhvien1['NgayLapThe']); ?></div></td>
            <td><div class="KT_col_Email"><?php echo KT_FormatForList($row_rsthanhvien1['Email'], 20); ?></div></td>
            <td><div class="KT_col_SoLanLogin"><?php echo KT_FormatForList($row_rsthanhvien1['SoLanLogin'], 20); ?></div></td>
            <td><div class="KT_col_DisableDateUser"><?php echo KT_formatDate($row_rsthanhvien1['DisableDateUser']); ?></div></td>
            <td><div class="KT_col_Active"><?php echo KT_FormatForList($row_rsthanhvien1['Active'], 20); ?></div></td>
            <td><a class="KT_edit_link" href="admincp_form.php?mod=form_thanhvien&amp;MaThanhVien=<?php echo $row_rsthanhvien1['MaThanhVien']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rsthanhvien1 = mysql_fetch_assoc($rsthanhvien1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listthanhvien1->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
        <span>&nbsp;</span>
        <select name="no_new" id="no_new">
          <option value="1">1</option>
          <option value="3">3</option>
          <option value="6">6</option>
        </select>
        <a class="KT_additem_op_link" href="admincp_form.php?mod=form_thanhvien&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>

</body>
</html>
<?php
mysql_free_result($rs_lop);

mysql_free_result($rs_khoa);

mysql_free_result($rsthanhvien1);
?>
