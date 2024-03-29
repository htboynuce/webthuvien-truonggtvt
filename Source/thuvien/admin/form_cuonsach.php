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
$formValidation->addField("MaCuonSach", true, "numeric", "", "", "", "Vui lòng nhập mã cuốn sách !");
$formValidation->addField("MaSach", true, "numeric", "", "", "", "Vui lòng chọn tên sách !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("cuonsach");
  $tblFldObj->addFieldName("MaCuonSach");
  $tblFldObj->setErrorMsg("Mã sách này đã có ! Vui lòng nhập mã sách khác !");
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
$query_rs_sach = "SELECT MasSach, TenSach FROM sach";
$rs_sach = mysql_query($query_rs_sach, $conn_project) or die(mysql_error());
$row_rs_sach = mysql_fetch_assoc($rs_sach);
$totalRows_rs_sach = mysql_num_rows($rs_sach);

// Make an insert transaction instance
$ins_cuonsach = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_cuonsach);
// Register triggers
$ins_cuonsach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_cuonsach->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_cuonsach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_cuonsach");
$ins_cuonsach->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_cuonsach->setTable("cuonsach");
$ins_cuonsach->addColumn("MaCuonSach", "STRING_TYPE", "POST", "MaCuonSach");
$ins_cuonsach->addColumn("MaSach", "NUMERIC_TYPE", "POST", "MaSach");
$ins_cuonsach->setPrimaryKey("MaCuonSach", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_cuonsach = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_cuonsach);
// Register triggers
$upd_cuonsach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_cuonsach->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_cuonsach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_cuonsach");
$upd_cuonsach->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_cuonsach->setTable("cuonsach");
$upd_cuonsach->addColumn("MaCuonSach", "STRING_TYPE", "POST", "MaCuonSach");
$upd_cuonsach->addColumn("MaSach", "NUMERIC_TYPE", "POST", "MaSach");
$upd_cuonsach->setPrimaryKey("MaCuonSach", "NUMERIC_TYPE", "GET", "MaCuonSach");

// Make an instance of the transaction object
$del_cuonsach = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_cuonsach);
// Register triggers
$del_cuonsach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_cuonsach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_cuonsach");
// Add columns
$del_cuonsach->setTable("cuonsach");
$del_cuonsach->setPrimaryKey("MaCuonSach", "NUMERIC_TYPE", "GET", "MaCuonSach");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscuonsach = $tNGs->getRecordset("cuonsach");
$row_rscuonsach = mysql_fetch_assoc($rscuonsach);
$totalRows_rscuonsach = mysql_num_rows($rscuonsach);
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
<div class="KT_tng" align="center">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['MaCuonSach'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Cuốn sách</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rscuonsach > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="MaCuonSach_<?php echo $cnt1; ?>">Mã  sách:</label></td>
            <td><input type="text" name="MaCuonSach_<?php echo $cnt1; ?>" id="MaCuonSach_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscuonsach['MaCuonSach']); ?>" size="7" />
                <?php echo $tNGs->displayFieldHint("MaCuonSach");?> <?php echo $tNGs->displayFieldError("cuonsach", "MaCuonSach", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaSach_<?php echo $cnt1; ?>">Tên sách:</label></td>
            <td><select name="MaSach_<?php echo $cnt1; ?>" id="MaSach_<?php echo $cnt1; ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
              <?php 
do {  
?>
              <option value="<?php echo $row_rs_sach['MasSach']?>"<?php if (!(strcmp($row_rs_sach['MasSach'], $row_rscuonsach['MaSach']))) {echo "SELECTED";} ?>><?php echo $row_rs_sach['TenSach']?></option>
              <?php
} while ($row_rs_sach = mysql_fetch_assoc($rs_sach));
  $rows = mysql_num_rows($rs_sach);
  if($rows > 0) {
      mysql_data_seek($rs_sach, 0);
	  $row_rs_sach = mysql_fetch_assoc($rs_sach);
  }
?>
            </select>
                <?php echo $tNGs->displayFieldError("cuonsach", "MaSach", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_cuonsach_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscuonsach['kt_pk_cuonsach']); ?>" />
        <?php } while ($row_rscuonsach = mysql_fetch_assoc($rscuonsach)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaCuonSach'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaCuonSach')" />
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

<?php
	echo $tNGs->getErrorMsg();
?></body>
</html>
<?php
mysql_free_result($rs_sach);
?>
