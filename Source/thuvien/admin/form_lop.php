<?php require_once('../Connections/conn_project.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_conn_project = new KT_connection($conn_project, $database_conn_project);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("TenLop", true, "text", "", "", "", "Vui lòng nhập tên lớp !");
$formValidation->addField("MaKhoa", true, "numeric", "", "", "", "Vui lòng chọn khoa !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("lop");
  $tblFldObj->addFieldName("TenLop");
  $tblFldObj->setErrorMsg("Tên lớp này đã có ! Vui lòng nhập tên khác !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

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

mysql_select_db($database_conn_project, $conn_project);
$query_rs_khoa = "SELECT MaKhoa, TenKhoa FROM khoa";
$rs_khoa = mysql_query($query_rs_khoa, $conn_project) or die(mysql_error());
$row_rs_khoa = mysql_fetch_assoc($rs_khoa);
$totalRows_rs_khoa = mysql_num_rows($rs_khoa);

// Make an insert transaction instance
$ins_lop = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_lop);
// Register triggers
$ins_lop->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_lop->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_lop->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_lop->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_lop->setTable("lop");
$ins_lop->addColumn("TenLop", "STRING_TYPE", "POST", "TenLop");
$ins_lop->addColumn("MaKhoa", "NUMERIC_TYPE", "POST", "MaKhoa");
$ins_lop->setPrimaryKey("MaLop", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_lop = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_lop);
// Register triggers
$upd_lop->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_lop->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_lop->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_lop->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_lop->setTable("lop");
$upd_lop->addColumn("TenLop", "STRING_TYPE", "POST", "TenLop");
$upd_lop->addColumn("MaKhoa", "NUMERIC_TYPE", "POST", "MaKhoa");
$upd_lop->setPrimaryKey("MaLop", "NUMERIC_TYPE", "GET", "MaLop");

// Make an instance of the transaction object
$del_lop = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_lop);
// Register triggers
$del_lop->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_lop->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_lop->setTable("lop");
$del_lop->setPrimaryKey("MaLop", "NUMERIC_TYPE", "GET", "MaLop");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rslop = $tNGs->getRecordset("lop");
$row_rslop = mysql_fetch_assoc($rslop);
$totalRows_rslop = mysql_num_rows($rslop);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['MaLop'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Lớp </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rslop > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenLop_<?php echo $cnt1; ?>">Tên Lớp:</label></td>
            <td><input type="text" name="TenLop_<?php echo $cnt1; ?>" id="TenLop_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslop['TenLop']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("TenLop");?> <?php echo $tNGs->displayFieldError("lop", "TenLop", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaKhoa_<?php echo $cnt1; ?>">Khoa:</label></td>
            <td><select name="MaKhoa_<?php echo $cnt1; ?>" id="MaKhoa_<?php echo $cnt1; ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
              <?php 
do {  
?>
              <option value="<?php echo $row_rs_khoa['MaKhoa']?>"<?php if (!(strcmp($row_rs_khoa['MaKhoa'], $row_rslop['MaKhoa']))) {echo "SELECTED";} ?>><?php echo $row_rs_khoa['TenKhoa']?></option>
              <?php
} while ($row_rs_khoa = mysql_fetch_assoc($rs_khoa));
  $rows = mysql_num_rows($rs_khoa);
  if($rows > 0) {
      mysql_data_seek($rs_khoa, 0);
	  $row_rs_khoa = mysql_fetch_assoc($rs_khoa);
  }
?>
            </select>
                <?php echo $tNGs->displayFieldError("lop", "MaKhoa", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_lop_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rslop['kt_pk_lop']); ?>" />
        <?php } while ($row_rslop = mysql_fetch_assoc($rslop)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaLop'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaLop')" />
            </div>
            <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
            <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
            <?php }
      // endif Conditional region1
      ?>
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rs_khoa);
?>
