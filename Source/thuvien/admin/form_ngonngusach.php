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
$formValidation->addField("TenNgonNguSach", true, "text", "", "", "", "Vui lòng nhập tên ngôn ngữ sách !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("ngonngusach");
  $tblFldObj->addFieldName("TenNgonNguSach");
  $tblFldObj->setErrorMsg("Tên ngôn ngữ sách này đã có ! Vui lòng nhập tên khác !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

// Make an insert transaction instance
$ins_ngonngusach = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_ngonngusach);
// Register triggers
$ins_ngonngusach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_ngonngusach->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_ngonngusach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_ngonngusach");
$ins_ngonngusach->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_ngonngusach->setTable("ngonngusach");
$ins_ngonngusach->addColumn("TenNgonNguSach", "STRING_TYPE", "POST", "TenNgonNguSach");
$ins_ngonngusach->setPrimaryKey("MaNgonNguSach", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_ngonngusach = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_ngonngusach);
// Register triggers
$upd_ngonngusach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_ngonngusach->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_ngonngusach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_ngonngusach");
$upd_ngonngusach->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_ngonngusach->setTable("ngonngusach");
$upd_ngonngusach->addColumn("TenNgonNguSach", "STRING_TYPE", "POST", "TenNgonNguSach");
$upd_ngonngusach->setPrimaryKey("MaNgonNguSach", "NUMERIC_TYPE", "GET", "MaNgonNguSach");

// Make an instance of the transaction object
$del_ngonngusach = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_ngonngusach);
// Register triggers
$del_ngonngusach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_ngonngusach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_ngonngusach");
// Add columns
$del_ngonngusach->setTable("ngonngusach");
$del_ngonngusach->setPrimaryKey("MaNgonNguSach", "NUMERIC_TYPE", "GET", "MaNgonNguSach");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsngonngusach = $tNGs->getRecordset("ngonngusach");
$row_rsngonngusach = mysql_fetch_assoc($rsngonngusach);
$totalRows_rsngonngusach = mysql_num_rows($rsngonngusach);
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
<div class="KT_tng" align="center">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['MaNgonNguSach'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Ngôn Ngữ Sách</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsngonngusach > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenNgonNguSach_<?php echo $cnt1; ?>">Tên Ngôn Ngữ Sách:</label></td>
            <td><input type="text" name="TenNgonNguSach_<?php echo $cnt1; ?>" id="TenNgonNguSach_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsngonngusach['TenNgonNguSach']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("TenNgonNguSach");?> <?php echo $tNGs->displayFieldError("ngonngusach", "TenNgonNguSach", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_ngonngusach_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsngonngusach['kt_pk_ngonngusach']); ?>" />
        <?php } while ($row_rsngonngusach = mysql_fetch_assoc($rsngonngusach)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaNgonNguSach'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaNgonNguSach')" />
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

</body>
</html>
