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
$tfi_listtacgia1 = new TFI_TableFilter($conn_conn_project, "tfi_listtacgia1");
$tfi_listtacgia1->addColumn("tacgia.MaTacGia", "NUMERIC_TYPE", "MaTacGia", "=");
$tfi_listtacgia1->addColumn("tacgia.TenTacGia", "STRING_TYPE", "TenTacGia", "%");
$tfi_listtacgia1->Execute();

// Sorter
$tso_listtacgia1 = new TSO_TableSorter("rstacgia1", "tso_listtacgia1");
$tso_listtacgia1->addColumn("tacgia.MaTacGia");
$tso_listtacgia1->addColumn("tacgia.TenTacGia");
$tso_listtacgia1->setDefault("tacgia.TenTacGia");
$tso_listtacgia1->Execute();

// Navigation
$nav_listtacgia1 = new NAV_Regular("nav_listtacgia1", "rstacgia1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rstacgia1 = $_SESSION['max_rows_nav_listtacgia1'];
$pageNum_rstacgia1 = 0;
if (isset($_GET['pageNum_rstacgia1'])) {
  $pageNum_rstacgia1 = $_GET['pageNum_rstacgia1'];
}
$startRow_rstacgia1 = $pageNum_rstacgia1 * $maxRows_rstacgia1;

// Defining List Recordset variable
$NXTFilter_rstacgia1 = "1=1";
if (isset($_SESSION['filter_tfi_listtacgia1'])) {
  $NXTFilter_rstacgia1 = $_SESSION['filter_tfi_listtacgia1'];
}
// Defining List Recordset variable
$NXTSort_rstacgia1 = "tacgia.TenTacGia";
if (isset($_SESSION['sorter_tso_listtacgia1'])) {
  $NXTSort_rstacgia1 = $_SESSION['sorter_tso_listtacgia1'];
}
mysql_select_db($database_conn_project, $conn_project);

$query_rstacgia1 = "SELECT tacgia.MaTacGia, tacgia.TenTacGia FROM tacgia WHERE {$NXTFilter_rstacgia1} ORDER BY {$NXTSort_rstacgia1}";
$query_limit_rstacgia1 = sprintf("%s LIMIT %d, %d", $query_rstacgia1, $startRow_rstacgia1, $maxRows_rstacgia1);
$rstacgia1 = mysql_query($query_limit_rstacgia1, $conn_project) or die(mysql_error());
$row_rstacgia1 = mysql_fetch_assoc($rstacgia1);

if (isset($_GET['totalRows_rstacgia1'])) {
  $totalRows_rstacgia1 = $_GET['totalRows_rstacgia1'];
} else {
  $all_rstacgia1 = mysql_query($query_rstacgia1);
  $totalRows_rstacgia1 = mysql_num_rows($all_rstacgia1);
}
$totalPages_rstacgia1 = ceil($totalRows_rstacgia1/$maxRows_rstacgia1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listtacgia1->checkBoundries();
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
  .KT_col_MaTacGia {width:140px; overflow:hidden;}
  .KT_col_TenTacGia {width:240px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listtacgia1">
  <h1> Tác Giả
    <?php
  $nav_listtacgia1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listtacgia1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listtacgia1'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listtacgia1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listtacgia1'] == 1) {
?>
                  <a href="<?php echo $tfi_listtacgia1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listtacgia1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="MaTacGia" class="KT_sorter KT_col_MaTacGia <?php echo $tso_listtacgia1->getSortIcon('tacgia.MaTacGia'); ?>"> <a href="<?php echo $tso_listtacgia1->getSortLink('tacgia.MaTacGia'); ?>">Mã Tác Giả</a> </th>
            <th id="TenTacGia" class="KT_sorter KT_col_TenTacGia <?php echo $tso_listtacgia1->getSortIcon('tacgia.TenTacGia'); ?>"> <a href="<?php echo $tso_listtacgia1->getSortLink('tacgia.TenTacGia'); ?>">Tên Tác Giả</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listtacgia1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listtacgia1_MaTacGia" id="tfi_listtacgia1_MaTacGia" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtacgia1_MaTacGia']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listtacgia1_TenTacGia" id="tfi_listtacgia1_TenTacGia" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtacgia1_TenTacGia']); ?>" size="20" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listtacgia1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rstacgia1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="4"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rstacgia1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_tacgia" class="id_checkbox" value="<?php echo $row_rstacgia1['MaTacGia']; ?>" />
                    <input type="hidden" name="MaTacGia" class="id_field" value="<?php echo $row_rstacgia1['MaTacGia']; ?>" />
                </td>
                <td><div class="KT_col_MaTacGia"><?php echo KT_FormatForList($row_rstacgia1['MaTacGia'], 20); ?></div></td>
                <td><div class="KT_col_TenTacGia"><?php echo KT_FormatForList($row_rstacgia1['TenTacGia'], 200); ?></div></td>
                <td><a class="KT_edit_link" href="admincp_form.php?mod=form_tacgia&amp;MaTacGia=<?php echo $row_rstacgia1['MaTacGia']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rstacgia1 = mysql_fetch_assoc($rstacgia1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listtacgia1->Prepare();
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
        <a class="KT_additem_op_link" href="admincp_form.php?mod=form_tacgia&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rstacgia1);
?>
