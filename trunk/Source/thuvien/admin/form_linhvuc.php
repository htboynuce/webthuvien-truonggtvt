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
$formValidation->addField("TenLinhVuc", true, "text", "", "", "", "Vui lòng nhập tên lĩnh vực sách !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("linhvuc");
  $tblFldObj->addFieldName("TenLinhVuc");
  $tblFldObj->setErrorMsg("Tên lĩnh vực này đã có ! Vui lòng nhập tên khác !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

// Make an insert transaction instance
$ins_linhvuc = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_linhvuc);
// Register triggers
$ins_linhvuc->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_linhvuc->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_linhvuc->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_linhvuc->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_linhvuc->setTable("linhvuc");
$ins_linhvuc->addColumn("TenLinhVuc", "STRING_TYPE", "POST", "TenLinhVuc");
$ins_linhvuc->addColumn("HienLinhVuc", "CHECKBOX_1_0_TYPE", "POST", "HienLinhVuc", "0");
$ins_linhvuc->addColumn("HienMenu", "CHECKBOX_1_0_TYPE", "POST", "HienMenu", "0");
$ins_linhvuc->setPrimaryKey("MaLinhVuc", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_linhvuc = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_linhvuc);
// Register triggers
$upd_linhvuc->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_linhvuc->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_linhvuc->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_linhvuc->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_linhvuc->setTable("linhvuc");
$upd_linhvuc->addColumn("TenLinhVuc", "STRING_TYPE", "POST", "TenLinhVuc");
$upd_linhvuc->addColumn("HienLinhVuc", "CHECKBOX_1_0_TYPE", "POST", "HienLinhVuc");
$upd_linhvuc->addColumn("HienMenu", "CHECKBOX_1_0_TYPE", "POST", "HienMenu");
$upd_linhvuc->setPrimaryKey("MaLinhVuc", "NUMERIC_TYPE", "GET", "MaLinhVuc");

// Make an instance of the transaction object
$del_linhvuc = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_linhvuc);
// Register triggers
$del_linhvuc->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_linhvuc->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_linhvuc->setTable("linhvuc");
$del_linhvuc->setPrimaryKey("MaLinhVuc", "NUMERIC_TYPE", "GET", "MaLinhVuc");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rslinhvuc = $tNGs->getRecordset("linhvuc");
$row_rslinhvuc = mysql_fetch_assoc($rslinhvuc);
$totalRows_rslinhvuc = mysql_num_rows($rslinhvuc);
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
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['MaLinhVuc'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Lĩnh Vực</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rslinhvuc > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenLinhVuc_<?php echo $cnt1; ?>">Tên Lĩnh Vực:</label></td>
            <td><input type="text" name="TenLinhVuc_<?php echo $cnt1; ?>" id="TenLinhVuc_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslinhvuc['TenLinhVuc']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("TenLinhVuc");?> <?php echo $tNGs->displayFieldError("linhvuc", "TenLinhVuc", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="HienLinhVuc_<?php echo $cnt1; ?>">Hiện Lĩnh Vực:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rslinhvuc['HienLinhVuc']),"1"))) {echo "checked";} ?> type="checkbox" name="HienLinhVuc_<?php echo $cnt1; ?>" id="HienLinhVuc_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("linhvuc", "HienLinhVuc", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="HienMenu_<?php echo $cnt1; ?>">Hiện Menu:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rslinhvuc['HienMenu']),"1"))) {echo "checked";} ?> type="checkbox" name="HienMenu_<?php echo $cnt1; ?>" id="HienMenu_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("linhvuc", "HienMenu", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_linhvuc_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rslinhvuc['kt_pk_linhvuc']); ?>" />
        <?php } while ($row_rslinhvuc = mysql_fetch_assoc($rslinhvuc)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaLinhVuc'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaLinhVuc')" />
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
