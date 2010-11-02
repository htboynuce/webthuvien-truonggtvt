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
$tfi_listlinhvuc2 = new TFI_TableFilter($conn_conn_project, "tfi_listlinhvuc2");
$tfi_listlinhvuc2->addColumn("linhvuc.MaLinhVuc", "NUMERIC_TYPE", "MaLinhVuc", "=");
$tfi_listlinhvuc2->addColumn("linhvuc.TenLinhVuc", "STRING_TYPE", "TenLinhVuc", "%");
$tfi_listlinhvuc2->addColumn("linhvuc.HienLinhVuc", "NUMERIC_TYPE", "HienLinhVuc", "=");
$tfi_listlinhvuc2->addColumn("linhvuc.HienMenu", "NUMERIC_TYPE", "HienMenu", "=");
$tfi_listlinhvuc2->Execute();

// Sorter
$tso_listlinhvuc2 = new TSO_TableSorter("rslinhvuc1", "tso_listlinhvuc2");
$tso_listlinhvuc2->addColumn("linhvuc.MaLinhVuc");
$tso_listlinhvuc2->addColumn("linhvuc.TenLinhVuc");
$tso_listlinhvuc2->addColumn("linhvuc.HienLinhVuc");
$tso_listlinhvuc2->addColumn("linhvuc.HienMenu");
$tso_listlinhvuc2->setDefault("linhvuc.TenLinhVuc");
$tso_listlinhvuc2->Execute();

// Navigation
$nav_listlinhvuc2 = new NAV_Regular("nav_listlinhvuc2", "rslinhvuc1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rslinhvuc1 = $_SESSION['max_rows_nav_listlinhvuc2'];
$pageNum_rslinhvuc1 = 0;
if (isset($_GET['pageNum_rslinhvuc1'])) {
  $pageNum_rslinhvuc1 = $_GET['pageNum_rslinhvuc1'];
}
$startRow_rslinhvuc1 = $pageNum_rslinhvuc1 * $maxRows_rslinhvuc1;

// Defining List Recordset variable
$NXTFilter_rslinhvuc1 = "1=1";
if (isset($_SESSION['filter_tfi_listlinhvuc2'])) {
  $NXTFilter_rslinhvuc1 = $_SESSION['filter_tfi_listlinhvuc2'];
}
// Defining List Recordset variable
$NXTSort_rslinhvuc1 = "linhvuc.TenLinhVuc";
if (isset($_SESSION['sorter_tso_listlinhvuc2'])) {
  $NXTSort_rslinhvuc1 = $_SESSION['sorter_tso_listlinhvuc2'];
}
mysql_select_db($database_conn_project, $conn_project);

$query_rslinhvuc1 = "SELECT linhvuc.MaLinhVuc, linhvuc.TenLinhVuc, linhvuc.HienLinhVuc, linhvuc.HienMenu FROM linhvuc WHERE {$NXTFilter_rslinhvuc1} ORDER BY {$NXTSort_rslinhvuc1}";
$query_limit_rslinhvuc1 = sprintf("%s LIMIT %d, %d", $query_rslinhvuc1, $startRow_rslinhvuc1, $maxRows_rslinhvuc1);
$rslinhvuc1 = mysql_query($query_limit_rslinhvuc1, $conn_project) or die(mysql_error());
$row_rslinhvuc1 = mysql_fetch_assoc($rslinhvuc1);

if (isset($_GET['totalRows_rslinhvuc1'])) {
  $totalRows_rslinhvuc1 = $_GET['totalRows_rslinhvuc1'];
} else {
  $all_rslinhvuc1 = mysql_query($query_rslinhvuc1);
  $totalRows_rslinhvuc1 = mysql_num_rows($all_rslinhvuc1);
}
$totalPages_rslinhvuc1 = ceil($totalRows_rslinhvuc1/$maxRows_rslinhvuc1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listlinhvuc2->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_MaLinhVuc {width:140px; overflow:hidden;}
  .KT_col_TenLinhVuc {width:240px; overflow:hidden;}
  .KT_col_HienLinhVuc {width:140px; overflow:hidden;}
  .KT_col_HienMenu {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listlinhvuc2" align="center">
  <h1> Lĩnh Vực
    <?php
  $nav_listlinhvuc2->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listlinhvuc2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listlinhvuc2'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listlinhvuc2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listlinhvuc2'] == 1) {
?>
                  <a href="<?php echo $tfi_listlinhvuc2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listlinhvuc2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="MaLinhVuc" class="KT_sorter KT_col_MaLinhVuc <?php echo $tso_listlinhvuc2->getSortIcon('linhvuc.MaLinhVuc'); ?>"> <a href="<?php echo $tso_listlinhvuc2->getSortLink('linhvuc.MaLinhVuc'); ?>">Mã Lĩnh Vực</a> </th>
            <th id="TenLinhVuc" class="KT_sorter KT_col_TenLinhVuc <?php echo $tso_listlinhvuc2->getSortIcon('linhvuc.TenLinhVuc'); ?>"> <a href="<?php echo $tso_listlinhvuc2->getSortLink('linhvuc.TenLinhVuc'); ?>">Tên Lĩnh Vực</a> </th>
            <th id="HienLinhVuc" class="KT_sorter KT_col_HienLinhVuc <?php echo $tso_listlinhvuc2->getSortIcon('linhvuc.HienLinhVuc'); ?>"> <a href="<?php echo $tso_listlinhvuc2->getSortLink('linhvuc.HienLinhVuc'); ?>">Hiện Lĩnh Vực</a> </th>
            <th id="HienMenu" class="KT_sorter KT_col_HienMenu <?php echo $tso_listlinhvuc2->getSortIcon('linhvuc.HienMenu'); ?>"> <a href="<?php echo $tso_listlinhvuc2->getSortLink('linhvuc.HienMenu'); ?>">Hiện Menu</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listlinhvuc2'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listlinhvuc2_MaLinhVuc" id="tfi_listlinhvuc2_MaLinhVuc" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listlinhvuc2_MaLinhVuc']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listlinhvuc2_TenLinhVuc" id="tfi_listlinhvuc2_TenLinhVuc" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listlinhvuc2_TenLinhVuc']); ?>" size="20" maxlength="45" /></td>
              <td><input type="text" name="tfi_listlinhvuc2_HienLinhVuc" id="tfi_listlinhvuc2_HienLinhVuc" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listlinhvuc2_HienLinhVuc']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listlinhvuc2_HienMenu" id="tfi_listlinhvuc2_HienMenu" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listlinhvuc2_HienMenu']); ?>" size="20" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listlinhvuc2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rslinhvuc1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rslinhvuc1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_linhvuc" class="id_checkbox" value="<?php echo $row_rslinhvuc1['MaLinhVuc']; ?>" />
                    <input type="hidden" name="MaLinhVuc" class="id_field" value="<?php echo $row_rslinhvuc1['MaLinhVuc']; ?>" />
                </td>
                <td><div class="KT_col_MaLinhVuc"><?php echo KT_FormatForList($row_rslinhvuc1['MaLinhVuc'], 20); ?></div></td>
                <td><div class="KT_col_TenLinhVuc"><?php echo KT_FormatForList($row_rslinhvuc1['TenLinhVuc'], 200); ?></div></td>
                <td><div align="center">
                  <?php 
// Show IF Conditional region5 
if (@$row_rslinhvuc1['HienLinhVuc'] == 1) {
?>
                    <img src="tick.png" width="16" height="16" />
                    <?php 
// else Conditional region5
} else { ?>
                    <img src="checkbox_no.png" width="16" height="16" />
                    <?php } 
// endif Conditional region5
?></div></td>
                <td><div align="center">
                  <?php 
// Show IF Conditional region4 
if (@$row_rslinhvuc1['HienMenu'] == 1) {
?>
                    <img src="tick.png" width="16" height="16" />
                    <?php 
// else Conditional region4
} else { ?>
                    <img src="checkbox_no.png" width="16" height="16" /> .
                    <?php } 
// endif Conditional region4
?></div></td>
                <td><a class="KT_edit_link" href="admincp1.php?mod=form_linhvuc&amp;MaLinhVuc=<?php echo $row_rslinhvuc1['MaLinhVuc']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rslinhvuc1 = mysql_fetch_assoc($rslinhvuc1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listlinhvuc2->Prepare();
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
        <a class="KT_additem_op_link" href="admincp1.php?mod=form_linhvuc&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>

</body>
</html>
<?php
mysql_free_result($rslinhvuc1);
?>
