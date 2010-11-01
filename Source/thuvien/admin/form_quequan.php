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
$formValidation->addField("TenQueQuan", true, "text", "", "", "", "Vui lòng nhập tên quê quán !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("quequan");
  $tblFldObj->addFieldName("TenQueQuan");
  $tblFldObj->setErrorMsg("Tên quê quán này đã có ! Vui lòng nhập tên khác !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

// Make an insert transaction instance
$ins_quequan = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_quequan);
// Register triggers
$ins_quequan->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_quequan->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_quequan->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_quequan->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_quequan->setTable("quequan");
$ins_quequan->addColumn("TenQueQuan", "STRING_TYPE", "POST", "TenQueQuan");
$ins_quequan->setPrimaryKey("ID_quequan", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_quequan = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_quequan);
// Register triggers
$upd_quequan->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_quequan->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_quequan->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_quequan->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_quequan->setTable("quequan");
$upd_quequan->addColumn("TenQueQuan", "STRING_TYPE", "POST", "TenQueQuan");
$upd_quequan->setPrimaryKey("ID_quequan", "NUMERIC_TYPE", "GET", "ID_quequan");

// Make an instance of the transaction object
$del_quequan = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_quequan);
// Register triggers
$del_quequan->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_quequan->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_quequan->setTable("quequan");
$del_quequan->setPrimaryKey("ID_quequan", "NUMERIC_TYPE", "GET", "ID_quequan");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsquequan = $tNGs->getRecordset("quequan");
$row_rsquequan = mysql_fetch_assoc($rsquequan);
$totalRows_rsquequan = mysql_num_rows($rsquequan);
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
if (@$_GET['ID_quequan'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Quê Quán</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsquequan > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenQueQuan_<?php echo $cnt1; ?>">Tên Quê Quán:</label></td>
            <td><input type="text" name="TenQueQuan_<?php echo $cnt1; ?>" id="TenQueQuan_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsquequan['TenQueQuan']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("TenQueQuan");?> <?php echo $tNGs->displayFieldError("quequan", "TenQueQuan", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_quequan_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsquequan['kt_pk_quequan']); ?>" />
        <?php } while ($row_rsquequan = mysql_fetch_assoc($rsquequan)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_quequan'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_quequan')" />
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
