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
$tfi_listlop1 = new TFI_TableFilter($conn_conn_project, "tfi_listlop1");
$tfi_listlop1->addColumn("lop.MaLop", "NUMERIC_TYPE", "MaLop", "=");
$tfi_listlop1->addColumn("lop.TenLop", "STRING_TYPE", "TenLop", "%");
$tfi_listlop1->addColumn("khoa.MaKhoa", "NUMERIC_TYPE", "MaKhoa", "=");
$tfi_listlop1->Execute();

// Sorter
$tso_listlop1 = new TSO_TableSorter("rslop1", "tso_listlop1");
$tso_listlop1->addColumn("lop.MaLop");
$tso_listlop1->addColumn("lop.TenLop");
$tso_listlop1->addColumn("khoa.TenKhoa");
$tso_listlop1->setDefault("lop.TenLop");
$tso_listlop1->Execute();

// Navigation
$nav_listlop1 = new NAV_Regular("nav_listlop1", "rslop1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conn_project, $conn_project);
$query_Recordset1 = "SELECT TenKhoa, MaKhoa FROM khoa ORDER BY TenKhoa";
$Recordset1 = mysql_query($query_Recordset1, $conn_project) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//NeXTenesio3 Special List Recordset
$maxRows_rslop1 = $_SESSION['max_rows_nav_listlop1'];
$pageNum_rslop1 = 0;
if (isset($_GET['pageNum_rslop1'])) {
  $pageNum_rslop1 = $_GET['pageNum_rslop1'];
}
$startRow_rslop1 = $pageNum_rslop1 * $maxRows_rslop1;

// Defining List Recordset variable
$NXTFilter_rslop1 = "1=1";
if (isset($_SESSION['filter_tfi_listlop1'])) {
  $NXTFilter_rslop1 = $_SESSION['filter_tfi_listlop1'];
}
// Defining List Recordset variable
$NXTSort_rslop1 = "lop.TenLop";
if (isset($_SESSION['sorter_tso_listlop1'])) {
  $NXTSort_rslop1 = $_SESSION['sorter_tso_listlop1'];
}
mysql_select_db($database_conn_project, $conn_project);

$query_rslop1 = "SELECT lop.MaLop, lop.TenLop, khoa.TenKhoa AS MaKhoa FROM lop LEFT JOIN khoa ON lop.MaKhoa = khoa.MaKhoa WHERE {$NXTFilter_rslop1} ORDER BY {$NXTSort_rslop1}";
$query_limit_rslop1 = sprintf("%s LIMIT %d, %d", $query_rslop1, $startRow_rslop1, $maxRows_rslop1);
$rslop1 = mysql_query($query_limit_rslop1, $conn_project) or die(mysql_error());
$row_rslop1 = mysql_fetch_assoc($rslop1);

if (isset($_GET['totalRows_rslop1'])) {
  $totalRows_rslop1 = $_GET['totalRows_rslop1'];
} else {
  $all_rslop1 = mysql_query($query_rslop1);
  $totalRows_rslop1 = mysql_num_rows($all_rslop1);
}
$totalPages_rslop1 = ceil($totalRows_rslop1/$maxRows_rslop1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listlop1->checkBoundries();
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
  .KT_col_MaLop {width:140px; overflow:hidden;}
  .KT_col_TenLop {width:240px; overflow:hidden;}
  .KT_col_MaKhoa {width:240px; overflow:hidden;}
</style>

</head>

<body>
<div class="KT_tng" id="listlop1">
  <h1> Lớp
    <?php
  $nav_listlop1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listlop1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listlop1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listlop1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listlop1'] == 1) {
?>
                            <a href="<?php echo $tfi_listlop1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listlop1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="MaLop" class="KT_sorter KT_col_MaLop <?php echo $tso_listlop1->getSortIcon('lop.MaLop'); ?>"> <a href="<?php echo $tso_listlop1->getSortLink('lop.MaLop'); ?>">Mã Lớp</a> </th>
            <th id="TenLop" class="KT_sorter KT_col_TenLop <?php echo $tso_listlop1->getSortIcon('lop.TenLop'); ?>"> <a href="<?php echo $tso_listlop1->getSortLink('lop.TenLop'); ?>">Tên Lớp</a> </th>
            <th id="MaKhoa" class="KT_sorter KT_col_MaKhoa <?php echo $tso_listlop1->getSortIcon('khoa.TenKhoa'); ?>"> <a href="<?php echo $tso_listlop1->getSortLink('khoa.TenKhoa'); ?>">Khoa</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listlop1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listlop1_MaLop" id="tfi_listlop1_MaLop" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listlop1_MaLop']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listlop1_TenLop" id="tfi_listlop1_TenLop" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listlop1_TenLop']); ?>" size="20" maxlength="45" /></td>
            <td><select name="tfi_listlop1_MaKhoa" id="tfi_listlop1_MaKhoa">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listlop1_MaKhoa']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['MaKhoa']?>"<?php if (!(strcmp($row_Recordset1['MaKhoa'], @$_SESSION['tfi_listlop1_MaKhoa']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenKhoa']?></option>
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
            <td><input type="submit" name="tfi_listlop1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rslop1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rslop1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_lop" class="id_checkbox" value="<?php echo $row_rslop1['MaLop']; ?>" />
                <input type="hidden" name="MaLop" class="id_field" value="<?php echo $row_rslop1['MaLop']; ?>" />
            </td>
            <td><div class="KT_col_MaLop"><?php echo KT_FormatForList($row_rslop1['MaLop'], 20); ?></div></td>
            <td><div class="KT_col_TenLop"><?php echo KT_FormatForList($row_rslop1['TenLop'], 200); ?></div></td>
            <td><div class="KT_col_MaKhoa"><?php echo KT_FormatForList($row_rslop1['MaKhoa'], 20); ?></div></td>
            <td><a class="KT_edit_link" href="admincp_form.php?mod=form_lop&amp;MaLop=<?php echo $row_rslop1['MaLop']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rslop1 = mysql_fetch_assoc($rslop1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listlop1->Prepare();
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
        <a class="KT_additem_op_link" href="admincp_form.php?mod=form_lop&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>

</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($rslop1);
?>
