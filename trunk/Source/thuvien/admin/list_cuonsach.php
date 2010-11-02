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
$tfi_listcuonsach1 = new TFI_TableFilter($conn_conn_project, "tfi_listcuonsach1");
$tfi_listcuonsach1->addColumn("cuonsach.Ma", "NUMERIC_TYPE", "Ma", "=");
$tfi_listcuonsach1->addColumn("cuonsach.MaCuonSach", "NUMERIC_TYPE", "MaCuonSach", "=");
$tfi_listcuonsach1->addColumn("sach.MasSach", "NUMERIC_TYPE", "MaSach", "=");
$tfi_listcuonsach1->Execute();

// Sorter
$tso_listcuonsach1 = new TSO_TableSorter("rscuonsach1", "tso_listcuonsach1");
$tso_listcuonsach1->addColumn("cuonsach.Ma");
$tso_listcuonsach1->addColumn("cuonsach.MaCuonSach");
$tso_listcuonsach1->addColumn("sach.TenSach");
$tso_listcuonsach1->setDefault("cuonsach.Ma");
$tso_listcuonsach1->Execute();

// Navigation
$nav_listcuonsach1 = new NAV_Regular("nav_listcuonsach1", "rscuonsach1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conn_project, $conn_project);
$query_Recordset1 = "SELECT TenSach, MasSach FROM sach ORDER BY TenSach";
$Recordset1 = mysql_query($query_Recordset1, $conn_project) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//NeXTenesio3 Special List Recordset
$maxRows_rscuonsach1 = $_SESSION['max_rows_nav_listcuonsach1'];
$pageNum_rscuonsach1 = 0;
if (isset($_GET['pageNum_rscuonsach1'])) {
  $pageNum_rscuonsach1 = $_GET['pageNum_rscuonsach1'];
}
$startRow_rscuonsach1 = $pageNum_rscuonsach1 * $maxRows_rscuonsach1;

// Defining List Recordset variable
$NXTFilter_rscuonsach1 = "1=1";
if (isset($_SESSION['filter_tfi_listcuonsach1'])) {
  $NXTFilter_rscuonsach1 = $_SESSION['filter_tfi_listcuonsach1'];
}
// Defining List Recordset variable
$NXTSort_rscuonsach1 = "cuonsach.Ma";
if (isset($_SESSION['sorter_tso_listcuonsach1'])) {
  $NXTSort_rscuonsach1 = $_SESSION['sorter_tso_listcuonsach1'];
}
mysql_select_db($database_conn_project, $conn_project);

$query_rscuonsach1 = "SELECT cuonsach.Ma, cuonsach.MaCuonSach, sach.TenSach AS MaSach FROM cuonsach LEFT JOIN sach ON cuonsach.MaSach = sach.MasSach WHERE {$NXTFilter_rscuonsach1} ORDER BY {$NXTSort_rscuonsach1}";
$query_limit_rscuonsach1 = sprintf("%s LIMIT %d, %d", $query_rscuonsach1, $startRow_rscuonsach1, $maxRows_rscuonsach1);
$rscuonsach1 = mysql_query($query_limit_rscuonsach1, $conn_project) or die(mysql_error());
$row_rscuonsach1 = mysql_fetch_assoc($rscuonsach1);

if (isset($_GET['totalRows_rscuonsach1'])) {
  $totalRows_rscuonsach1 = $_GET['totalRows_rscuonsach1'];
} else {
  $all_rscuonsach1 = mysql_query($query_rscuonsach1);
  $totalRows_rscuonsach1 = mysql_num_rows($all_rscuonsach1);
}
$totalPages_rscuonsach1 = ceil($totalRows_rscuonsach1/$maxRows_rscuonsach1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listcuonsach1->checkBoundries();
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
  .KT_col_Ma {width:140px; overflow:hidden;}
  .KT_col_MaCuonSach {width:240px; overflow:hidden;}
  .KT_col_MaSach {width:240px; overflow:hidden;}
</style>

</head>

<body><div class="KT_tng" id="listcuonsach1" align="center">
  <h1> Cuốn sách
    <?php
  $nav_listcuonsach1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listcuonsach1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listcuonsach1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listcuonsach1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listcuonsach1'] == 1) {
?>
                            <a href="<?php echo $tfi_listcuonsach1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listcuonsach1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="Ma" class="KT_sorter KT_col_Ma <?php echo $tso_listcuonsach1->getSortIcon('cuonsach.Ma'); ?>"> <a href="<?php echo $tso_listcuonsach1->getSortLink('cuonsach.Ma'); ?>">Mã</a> </th>
            <th id="MaCuonSach" class="KT_sorter KT_col_MaCuonSach <?php echo $tso_listcuonsach1->getSortIcon('cuonsach.MaCuonSach'); ?>"> <a href="<?php echo $tso_listcuonsach1->getSortLink('cuonsach.MaCuonSach'); ?>">Mã  sách</a> </th>
            <th id="MaSach" class="KT_sorter KT_col_MaSach <?php echo $tso_listcuonsach1->getSortIcon('sach.TenSach'); ?>"> <a href="<?php echo $tso_listcuonsach1->getSortLink('sach.TenSach'); ?>">Tên sách</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listcuonsach1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listcuonsach1_Ma" id="tfi_listcuonsach1_Ma" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcuonsach1_Ma']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listcuonsach1_MaCuonSach" id="tfi_listcuonsach1_MaCuonSach" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcuonsach1_MaCuonSach']); ?>" size="20" maxlength="100" /></td>
            <td><select name="tfi_listcuonsach1_MaSach" id="tfi_listcuonsach1_MaSach">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listcuonsach1_MaSach']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['MasSach']?>"<?php if (!(strcmp($row_Recordset1['MasSach'], @$_SESSION['tfi_listcuonsach1_MaSach']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenSach']?></option>
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
            <td><input type="submit" name="tfi_listcuonsach1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rscuonsach1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rscuonsach1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_cuonsach" class="id_checkbox" value="<?php echo $row_rscuonsach1['MaCuonSach']; ?>" />
                <input type="hidden" name="MaCuonSach" class="id_field" value="<?php echo $row_rscuonsach1['MaCuonSach']; ?>" />
            </td>
            <td><div class="KT_col_Ma"><?php echo KT_FormatForList($row_rscuonsach1['Ma'], 20); ?></div></td>
            <td><div class="KT_col_MaCuonSach"><?php echo KT_FormatForList($row_rscuonsach1['MaCuonSach'], 200); ?></div></td>
            <td><div class="KT_col_MaSach"><?php echo KT_FormatForList($row_rscuonsach1['MaSach'], 200); ?></div></td>
            <td><a class="KT_edit_link" href="admincp1.php?mod=form_cuonsach&amp;MaCuonSach=<?php echo $row_rscuonsach1['MaCuonSach']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rscuonsach1 = mysql_fetch_assoc($rscuonsach1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listcuonsach1->Prepare();
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
        <a class="KT_additem_op_link" href="admincp1.php?mod=form_cuonsach&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>



</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($rscuonsach1);
?>
