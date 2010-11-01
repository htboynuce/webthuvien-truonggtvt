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
$formValidation->addField("TenTacGia", true, "text", "", "", "", "Vui lòng nhập tên tác giả !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("tacgia");
  $tblFldObj->addFieldName("TenTacGia");
  $tblFldObj->setErrorMsg("Tên tác gải này đã có ! Vui lòng nhập tên tác giả khác !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

// Make an insert transaction instance
$ins_tacgia = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_tacgia);
// Register triggers
$ins_tacgia->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_tacgia->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_tacgia->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_tacgia->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_tacgia->setTable("tacgia");
$ins_tacgia->addColumn("TenTacGia", "STRING_TYPE", "POST", "TenTacGia");
$ins_tacgia->setPrimaryKey("MaTacGia", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_tacgia = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_tacgia);
// Register triggers
$upd_tacgia->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_tacgia->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_tacgia->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_tacgia->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_tacgia->setTable("tacgia");
$upd_tacgia->addColumn("TenTacGia", "STRING_TYPE", "POST", "TenTacGia");
$upd_tacgia->setPrimaryKey("MaTacGia", "NUMERIC_TYPE", "GET", "MaTacGia");

// Make an instance of the transaction object
$del_tacgia = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_tacgia);
// Register triggers
$del_tacgia->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_tacgia->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_tacgia->setTable("tacgia");
$del_tacgia->setPrimaryKey("MaTacGia", "NUMERIC_TYPE", "GET", "MaTacGia");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstacgia = $tNGs->getRecordset("tacgia");
$row_rstacgia = mysql_fetch_assoc($rstacgia);
$totalRows_rstacgia = mysql_num_rows($rstacgia);
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
if (@$_GET['MaTacGia'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Tác Giả </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rstacgia > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenTacGia_<?php echo $cnt1; ?>">Tên Tác Giả:</label></td>
            <td><input type="text" name="TenTacGia_<?php echo $cnt1; ?>" id="TenTacGia_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstacgia['TenTacGia']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("TenTacGia");?> <?php echo $tNGs->displayFieldError("tacgia", "TenTacGia", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_tacgia_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstacgia['kt_pk_tacgia']); ?>" />
        <?php } while ($row_rstacgia = mysql_fetch_assoc($rstacgia)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaTacGia'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaTacGia')" />
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
