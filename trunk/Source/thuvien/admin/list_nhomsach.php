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
$tfi_listnhomsach2 = new TFI_TableFilter($conn_conn_project, "tfi_listnhomsach2");
$tfi_listnhomsach2->addColumn("nhomsach.MaNhomSach", "NUMERIC_TYPE", "MaNhomSach", "=");
$tfi_listnhomsach2->addColumn("nhomsach.TenNhomSach", "STRING_TYPE", "TenNhomSach", "%");
$tfi_listnhomsach2->addColumn("linhvuc.MaLinhVuc", "NUMERIC_TYPE", "MaLinhVuc", "=");
$tfi_listnhomsach2->addColumn("vitri.MaViTri", "NUMERIC_TYPE", "MaViTri", "=");
$tfi_listnhomsach2->addColumn("nhomsach.HienMenu1", "NUMERIC_TYPE", "HienMenu1", "=");
$tfi_listnhomsach2->Execute();

// Sorter
$tso_listnhomsach2 = new TSO_TableSorter("rsnhomsach1", "tso_listnhomsach2");
$tso_listnhomsach2->addColumn("nhomsach.MaNhomSach");
$tso_listnhomsach2->addColumn("nhomsach.TenNhomSach");
$tso_listnhomsach2->addColumn("linhvuc.TenLinhVuc");
$tso_listnhomsach2->addColumn("vitri.TenViTri");
$tso_listnhomsach2->addColumn("nhomsach.HienMenu1");
$tso_listnhomsach2->setDefault("nhomsach.TenNhomSach");
$tso_listnhomsach2->Execute();

// Navigation
$nav_listnhomsach2 = new NAV_Regular("nav_listnhomsach2", "rsnhomsach1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_linhvuc = "SELECT MaLinhVuc, TenLinhVuc FROM linhvuc ORDER BY TenLinhVuc ASC";
$rs_linhvuc = mysql_query($query_rs_linhvuc, $conn_project) or die(mysql_error());
$row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc);
$totalRows_rs_linhvuc = mysql_num_rows($rs_linhvuc);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_vitri = "SELECT MaViTri, TenViTri FROM vitri ORDER BY TenViTri ASC";
$rs_vitri = mysql_query($query_rs_vitri, $conn_project) or die(mysql_error());
$row_rs_vitri = mysql_fetch_assoc($rs_vitri);
$totalRows_rs_vitri = mysql_num_rows($rs_vitri);

//NeXTenesio3 Special List Recordset
$maxRows_rsnhomsach1 = $_SESSION['max_rows_nav_listnhomsach2'];
$pageNum_rsnhomsach1 = 0;
if (isset($_GET['pageNum_rsnhomsach1'])) {
  $pageNum_rsnhomsach1 = $_GET['pageNum_rsnhomsach1'];
}
$startRow_rsnhomsach1 = $pageNum_rsnhomsach1 * $maxRows_rsnhomsach1;

// Defining List Recordset variable
$NXTFilter_rsnhomsach1 = "1=1";
if (isset($_SESSION['filter_tfi_listnhomsach2'])) {
  $NXTFilter_rsnhomsach1 = $_SESSION['filter_tfi_listnhomsach2'];
}
// Defining List Recordset variable
$NXTSort_rsnhomsach1 = "nhomsach.TenNhomSach";
if (isset($_SESSION['sorter_tso_listnhomsach2'])) {
  $NXTSort_rsnhomsach1 = $_SESSION['sorter_tso_listnhomsach2'];
}
mysql_select_db($database_conn_project, $conn_project);

$query_rsnhomsach1 = "SELECT nhomsach.MaNhomSach, nhomsach.TenNhomSach, linhvuc.TenLinhVuc AS MaLinhVuc,  vitri.TenViTri AS MaViTri, nhomsach.HienMenu1 FROM (nhomsach LEFT JOIN linhvuc ON nhomsach.MaLinhVuc = linhvuc.MaLinhVuc) LEFT JOIN vitri ON nhomsach.MaViTri = vitri.MaViTri WHERE {$NXTFilter_rsnhomsach1} ORDER BY {$NXTSort_rsnhomsach1}";
$query_limit_rsnhomsach1 = sprintf("%s LIMIT %d, %d", $query_rsnhomsach1, $startRow_rsnhomsach1, $maxRows_rsnhomsach1);
$rsnhomsach1 = mysql_query($query_limit_rsnhomsach1, $conn_project) or die(mysql_error());
$row_rsnhomsach1 = mysql_fetch_assoc($rsnhomsach1);

if (isset($_GET['totalRows_rsnhomsach1'])) {
  $totalRows_rsnhomsach1 = $_GET['totalRows_rsnhomsach1'];
} else {
  $all_rsnhomsach1 = mysql_query($query_rsnhomsach1);
  $totalRows_rsnhomsach1 = mysql_num_rows($all_rsnhomsach1);
}
$totalPages_rsnhomsach1 = ceil($totalRows_rsnhomsach1/$maxRows_rsnhomsach1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listnhomsach2->checkBoundries();
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
  .KT_col_MaNhomSach {width:140px; overflow:hidden;}
  .KT_col_TenNhomSach {width:340px; overflow:hidden;}
  .KT_col_MaLinhVuc {width:140px; overflow:hidden;}
  .KT_col_MaViTri {width:140px; overflow:hidden;}
  .KT_col_HienMenu1 {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listnhomsach2">
  <h1> Nhóm sách
    <?php
  $nav_listnhomsach2->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listnhomsach2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listnhomsach2'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listnhomsach2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listnhomsach2'] == 1) {
?>
                            <a href="<?php echo $tfi_listnhomsach2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listnhomsach2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="MaNhomSach" class="KT_sorter KT_col_MaNhomSach <?php echo $tso_listnhomsach2->getSortIcon('nhomsach.MaNhomSach'); ?>"> <a href="<?php echo $tso_listnhomsach2->getSortLink('nhomsach.MaNhomSach'); ?>">Mã Nhóm Sách</a> </th>
            <th id="TenNhomSach" class="KT_sorter KT_col_TenNhomSach <?php echo $tso_listnhomsach2->getSortIcon('nhomsach.TenNhomSach'); ?>"> <a href="<?php echo $tso_listnhomsach2->getSortLink('nhomsach.TenNhomSach'); ?>">Tên nhóm sách</a> </th>
            <th id="MaLinhVuc" class="KT_sorter KT_col_MaLinhVuc <?php echo $tso_listnhomsach2->getSortIcon('linhvuc.TenLinhVuc'); ?>"> <a href="<?php echo $tso_listnhomsach2->getSortLink('linhvuc.TenLinhVuc'); ?>">Lĩnh Vực</a> </th>
            <th id="MaViTri" class="KT_sorter KT_col_MaViTri <?php echo $tso_listnhomsach2->getSortIcon('vitri.TenViTri'); ?>"> <a href="<?php echo $tso_listnhomsach2->getSortLink('vitri.TenViTri'); ?>">Vị Trí</a> </th>
            <th id="HienMenu1" class="KT_sorter KT_col_HienMenu1 <?php echo $tso_listnhomsach2->getSortIcon('nhomsach.HienMenu1'); ?>"> <a href="<?php echo $tso_listnhomsach2->getSortLink('nhomsach.HienMenu1'); ?>">Hiện Menu</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listnhomsach2'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listnhomsach2_MaNhomSach" id="tfi_listnhomsach2_MaNhomSach" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnhomsach2_MaNhomSach']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listnhomsach2_TenNhomSach" id="tfi_listnhomsach2_TenNhomSach" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnhomsach2_TenNhomSach']); ?>" size="20" maxlength="45" /></td>
            <td><select name="tfi_listnhomsach2_MaLinhVuc" id="tfi_listnhomsach2_MaLinhVuc">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listnhomsach2_MaLinhVuc']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_linhvuc['MaLinhVuc']?>"<?php if (!(strcmp($row_rs_linhvuc['MaLinhVuc'], @$_SESSION['tfi_listnhomsach2_MaLinhVuc']))) {echo "SELECTED";} ?>><?php echo $row_rs_linhvuc['TenLinhVuc']?></option>
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
            <td><select name="tfi_listnhomsach2_MaViTri" id="tfi_listnhomsach2_MaViTri">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listnhomsach2_MaViTri']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_vitri['MaViTri']?>"<?php if (!(strcmp($row_rs_vitri['MaViTri'], @$_SESSION['tfi_listnhomsach2_MaViTri']))) {echo "SELECTED";} ?>><?php echo $row_rs_vitri['TenViTri']?></option>
              <?php
} while ($row_rs_vitri = mysql_fetch_assoc($rs_vitri));
  $rows = mysql_num_rows($rs_vitri);
  if($rows > 0) {
      mysql_data_seek($rs_vitri, 0);
	  $row_rs_vitri = mysql_fetch_assoc($rs_vitri);
  }
?>
            </select>
            </td>
            <td><input type="text" name="tfi_listnhomsach2_HienMenu1" id="tfi_listnhomsach2_HienMenu1" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnhomsach2_HienMenu1']); ?>" size="20" maxlength="100" /></td>
            <td><input type="submit" name="tfi_listnhomsach2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsnhomsach1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="7"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsnhomsach1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_nhomsach" class="id_checkbox" value="<?php echo $row_rsnhomsach1['MaNhomSach']; ?>" />
                <input type="hidden" name="MaNhomSach" class="id_field" value="<?php echo $row_rsnhomsach1['MaNhomSach']; ?>" />
            </td>
            <td><div class="KT_col_MaNhomSach"><?php echo KT_FormatForList($row_rsnhomsach1['MaNhomSach'], 20); ?></div></td>
            <td><div class="KT_col_TenNhomSach"><?php echo KT_FormatForList($row_rsnhomsach1['TenNhomSach'], 400); ?></div></td>
            <td><div class="KT_col_MaLinhVuc"><?php echo KT_FormatForList($row_rsnhomsach1['MaLinhVuc'], 20); ?></div></td>
            <td><div class="KT_col_MaViTri"><?php echo KT_FormatForList($row_rsnhomsach1['MaViTri'], 20); ?></div></td>
            <td><div align="center">
              <?php 
// Show IF Conditional region5 
if (@$row_rsnhomsach1['HienMenu1'] == 1) {
?>
                <img src="tick.png" width="16" height="16" />
                <?php 
// else Conditional region5
} else { ?>
                <img src="checkbox_no.png" width="16" height="16" />
                <?php } 
// endif Conditional region5
?></div></td>
            <td><a class="KT_edit_link" href="admincp_form.php?mod=form_nhomsach&amp;MaNhomSach=<?php echo $row_rsnhomsach1['MaNhomSach']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rsnhomsach1 = mysql_fetch_assoc($rsnhomsach1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listnhomsach2->Prepare();
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
        <a class="KT_additem_op_link" href="admincp_form.php?mod=form_nhomsach&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>

</body>
</html>
<?php
mysql_free_result($rs_linhvuc);

mysql_free_result($rs_vitri);

mysql_free_result($rsnhomsach1);
?>
