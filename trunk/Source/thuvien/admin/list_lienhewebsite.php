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
$tfi_listlienhewebsite1 = new TFI_TableFilter($conn_conn_project, "tfi_listlienhewebsite1");
$tfi_listlienhewebsite1->addColumn("lienhewebsite.MaLienhe", "NUMERIC_TYPE", "MaLienhe", "=");
$tfi_listlienhewebsite1->addColumn("lienhewebsite.TenWebsite", "STRING_TYPE", "TenWebsite", "%");
$tfi_listlienhewebsite1->addColumn("lienhewebsite.Link", "STRING_TYPE", "Link", "%");
$tfi_listlienhewebsite1->addColumn("lienhewebsite.Visible", "NUMERIC_TYPE", "Visible", "=");
$tfi_listlienhewebsite1->Execute();

// Sorter
$tso_listlienhewebsite1 = new TSO_TableSorter("rslienhewebsite1", "tso_listlienhewebsite1");
$tso_listlienhewebsite1->addColumn("lienhewebsite.MaLienhe");
$tso_listlienhewebsite1->addColumn("lienhewebsite.TenWebsite");
$tso_listlienhewebsite1->addColumn("lienhewebsite.Link");
$tso_listlienhewebsite1->addColumn("lienhewebsite.Visible");
$tso_listlienhewebsite1->setDefault("lienhewebsite.TenWebsite");
$tso_listlienhewebsite1->Execute();

// Navigation
$nav_listlienhewebsite1 = new NAV_Regular("nav_listlienhewebsite1", "rslienhewebsite1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rslienhewebsite1 = $_SESSION['max_rows_nav_listlienhewebsite1'];
$pageNum_rslienhewebsite1 = 0;
if (isset($_GET['pageNum_rslienhewebsite1'])) {
  $pageNum_rslienhewebsite1 = $_GET['pageNum_rslienhewebsite1'];
}
$startRow_rslienhewebsite1 = $pageNum_rslienhewebsite1 * $maxRows_rslienhewebsite1;

// Defining List Recordset variable
$NXTFilter_rslienhewebsite1 = "1=1";
if (isset($_SESSION['filter_tfi_listlienhewebsite1'])) {
  $NXTFilter_rslienhewebsite1 = $_SESSION['filter_tfi_listlienhewebsite1'];
}
// Defining List Recordset variable
$NXTSort_rslienhewebsite1 = "lienhewebsite.TenWebsite";
if (isset($_SESSION['sorter_tso_listlienhewebsite1'])) {
  $NXTSort_rslienhewebsite1 = $_SESSION['sorter_tso_listlienhewebsite1'];
}
mysql_select_db($database_conn_project, $conn_project);

$query_rslienhewebsite1 = "SELECT lienhewebsite.MaLienhe, lienhewebsite.TenWebsite, lienhewebsite.Link, lienhewebsite.Visible FROM lienhewebsite WHERE {$NXTFilter_rslienhewebsite1} ORDER BY {$NXTSort_rslienhewebsite1}";
$query_limit_rslienhewebsite1 = sprintf("%s LIMIT %d, %d", $query_rslienhewebsite1, $startRow_rslienhewebsite1, $maxRows_rslienhewebsite1);
$rslienhewebsite1 = mysql_query($query_limit_rslienhewebsite1, $conn_project) or die(mysql_error());
$row_rslienhewebsite1 = mysql_fetch_assoc($rslienhewebsite1);

if (isset($_GET['totalRows_rslienhewebsite1'])) {
  $totalRows_rslienhewebsite1 = $_GET['totalRows_rslienhewebsite1'];
} else {
  $all_rslienhewebsite1 = mysql_query($query_rslienhewebsite1);
  $totalRows_rslienhewebsite1 = mysql_num_rows($all_rslienhewebsite1);
}
$totalPages_rslienhewebsite1 = ceil($totalRows_rslienhewebsite1/$maxRows_rslienhewebsite1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listlienhewebsite1->checkBoundries();
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
  .KT_col_MaLienhe {width:40px; overflow:hidden;}
  .KT_col_TenWebsite {width:340px; overflow:hidden;}
  .KT_col_Link {width:340px; overflow:hidden;}
  .KT_col_Visible {width:40px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listlienhewebsite1">
  <h1> Liên hệ website
    <?php
  $nav_listlienhewebsite1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listlienhewebsite1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listlienhewebsite1'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listlienhewebsite1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listlienhewebsite1'] == 1) {
?>
                  <a href="<?php echo $tfi_listlienhewebsite1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listlienhewebsite1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="MaLienhe" class="KT_sorter KT_col_MaLienhe <?php echo $tso_listlienhewebsite1->getSortIcon('lienhewebsite.MaLienhe'); ?>"> <a href="<?php echo $tso_listlienhewebsite1->getSortLink('lienhewebsite.MaLienhe'); ?>">Mã liên hệ</a> </th>
            <th id="TenWebsite" class="KT_sorter KT_col_TenWebsite <?php echo $tso_listlienhewebsite1->getSortIcon('lienhewebsite.TenWebsite'); ?>"> <a href="<?php echo $tso_listlienhewebsite1->getSortLink('lienhewebsite.TenWebsite'); ?>">Tên website</a> </th>
            <th id="Link" class="KT_sorter KT_col_Link <?php echo $tso_listlienhewebsite1->getSortIcon('lienhewebsite.Link'); ?>"> <a href="<?php echo $tso_listlienhewebsite1->getSortLink('lienhewebsite.Link'); ?>">Link</a> </th>
            <th id="Visible" class="KT_sorter KT_col_Visible <?php echo $tso_listlienhewebsite1->getSortIcon('lienhewebsite.Visible'); ?>"> <a href="<?php echo $tso_listlienhewebsite1->getSortLink('lienhewebsite.Visible'); ?>">Visible</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listlienhewebsite1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listlienhewebsite1_MaLienhe" id="tfi_listlienhewebsite1_MaLienhe" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listlienhewebsite1_MaLienhe']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listlienhewebsite1_TenWebsite" id="tfi_listlienhewebsite1_TenWebsite" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listlienhewebsite1_TenWebsite']); ?>" size="20" maxlength="200" /></td>
              <td><input type="text" name="tfi_listlienhewebsite1_Link" id="tfi_listlienhewebsite1_Link" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listlienhewebsite1_Link']); ?>" size="20" maxlength="200" /></td>
              <td><input type="text" name="tfi_listlienhewebsite1_Visible" id="tfi_listlienhewebsite1_Visible" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listlienhewebsite1_Visible']); ?>" size="20" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listlienhewebsite1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rslienhewebsite1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rslienhewebsite1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_lienhewebsite" class="id_checkbox" value="<?php echo $row_rslienhewebsite1['MaLienhe']; ?>" />
                    <input type="hidden" name="MaLienhe" class="id_field" value="<?php echo $row_rslienhewebsite1['MaLienhe']; ?>" />
                </td>
                <td><div class="KT_col_MaLienhe"><?php echo KT_FormatForList($row_rslienhewebsite1['MaLienhe'], 20); ?></div></td>
                <td><div class="KT_col_TenWebsite"><?php echo KT_FormatForList($row_rslienhewebsite1['TenWebsite'], 200); ?></div></td>
                <td><div class="KT_col_Link"><?php echo KT_FormatForList($row_rslienhewebsite1['Link'], 200); ?></div></td>
                <td><div align="center">
                  <?php 
// Show IF Conditional region4 
if (@$row_rslienhewebsite1['Visible'] == 1) {
?>
                    <img src="tick.png" width="16" height="16" />
                    <?php 
// else Conditional region4
} else { ?>
                    <img src="checkbox_no.png" width="16" height="16" />
                    <?php } 
// endif Conditional region4
?></div></td>
                <td><a class="KT_edit_link" href="admincp_form.php?mod=form_lienhewebsite&amp;MaLienhe=<?php echo $row_rslienhewebsite1['MaLienhe']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rslienhewebsite1 = mysql_fetch_assoc($rslienhewebsite1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listlienhewebsite1->Prepare();
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
        <a class="KT_additem_op_link" href="admincp_form.php?mod=form_lienhewebsite&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rslienhewebsite1);
?>
