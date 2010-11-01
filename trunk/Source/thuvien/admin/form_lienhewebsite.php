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
$formValidation->addField("TenWebsite", true, "text", "", "", "", "Vui lòng nhập tên website !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("lienhewebsite");
  $tblFldObj->addFieldName("TenWebsite");
  $tblFldObj->setErrorMsg("Tên website này đã có ! Vui lòng nhập tên khác !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

//start Trigger_CheckUnique1 trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique1(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("lienhewebsite");
  $tblFldObj->addFieldName("Link");
  $tblFldObj->setErrorMsg("Địa chỉ link này đã có ! Vui lòng nhập địa chỉ link khác !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique1 trigger

// Make an insert transaction instance
$ins_lienhewebsite = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_lienhewebsite);
// Register triggers
$ins_lienhewebsite->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_lienhewebsite->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_lienhewebsite->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_lienhewebsite->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
$ins_lienhewebsite->registerTrigger("BEFORE", "Trigger_CheckUnique1", 30);
// Add columns
$ins_lienhewebsite->setTable("lienhewebsite");
$ins_lienhewebsite->addColumn("TenWebsite", "STRING_TYPE", "POST", "TenWebsite");
$ins_lienhewebsite->addColumn("Kieumo", "STRING_TYPE", "POST", "Kieumo");
$ins_lienhewebsite->addColumn("Link", "STRING_TYPE", "POST", "Link");
$ins_lienhewebsite->addColumn("Visible", "CHECKBOX_1_0_TYPE", "POST", "Visible", "0");
$ins_lienhewebsite->setPrimaryKey("MaLienhe", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_lienhewebsite = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_lienhewebsite);
// Register triggers
$upd_lienhewebsite->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_lienhewebsite->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_lienhewebsite->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_lienhewebsite->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
$upd_lienhewebsite->registerTrigger("BEFORE", "Trigger_CheckUnique1", 30);
// Add columns
$upd_lienhewebsite->setTable("lienhewebsite");
$upd_lienhewebsite->addColumn("TenWebsite", "STRING_TYPE", "POST", "TenWebsite");
$upd_lienhewebsite->addColumn("Kieumo", "STRING_TYPE", "POST", "Kieumo");
$upd_lienhewebsite->addColumn("Link", "STRING_TYPE", "POST", "Link");
$upd_lienhewebsite->addColumn("Visible", "CHECKBOX_1_0_TYPE", "POST", "Visible");
$upd_lienhewebsite->setPrimaryKey("MaLienhe", "NUMERIC_TYPE", "GET", "MaLienhe");

// Make an instance of the transaction object
$del_lienhewebsite = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_lienhewebsite);
// Register triggers
$del_lienhewebsite->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_lienhewebsite->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_lienhewebsite->setTable("lienhewebsite");
$del_lienhewebsite->setPrimaryKey("MaLienhe", "NUMERIC_TYPE", "GET", "MaLienhe");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rslienhewebsite = $tNGs->getRecordset("lienhewebsite");
$row_rslienhewebsite = mysql_fetch_assoc($rslienhewebsite);
$totalRows_rslienhewebsite = mysql_num_rows($rslienhewebsite);
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
if (@$_GET['MaLienhe'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Liên hệ website</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rslienhewebsite > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenWebsite_<?php echo $cnt1; ?>">Tên website:</label></td>
            <td><input type="text" name="TenWebsite_<?php echo $cnt1; ?>" id="TenWebsite_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslienhewebsite['TenWebsite']); ?>" size="32" maxlength="200" />
                <?php echo $tNGs->displayFieldHint("TenWebsite");?> <?php echo $tNGs->displayFieldError("lienhewebsite", "TenWebsite", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Kieumo_<?php echo $cnt1; ?>">Kiểu mở:</label></td>
            <td><select name="Kieumo_<?php echo $cnt1; ?>" id="Kieumo_<?php echo $cnt1; ?>">
                <option value="_blank" <?php if (!(strcmp("_blank", KT_escapeAttribute($row_rslienhewebsite['Kieumo'])))) {echo "SELECTED";} ?>>_blank</option>
                <option value="_self" <?php if (!(strcmp("_self", KT_escapeAttribute($row_rslienhewebsite['Kieumo'])))) {echo "SELECTED";} ?>>_self</option>
              </select>
                <?php echo $tNGs->displayFieldError("lienhewebsite", "Kieumo", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Link_<?php echo $cnt1; ?>">Link:</label></td>
            <td><input type="text" name="Link_<?php echo $cnt1; ?>" id="Link_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslienhewebsite['Link']); ?>" size="32" maxlength="200" />
                <?php echo $tNGs->displayFieldHint("Link");?> <?php echo $tNGs->displayFieldError("lienhewebsite", "Link", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Visible_<?php echo $cnt1; ?>">Visible:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rslienhewebsite['Visible']),"1"))) {echo "checked";} ?> type="checkbox" name="Visible_<?php echo $cnt1; ?>" id="Visible_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("lienhewebsite", "Visible", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_lienhewebsite_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rslienhewebsite['kt_pk_lienhewebsite']); ?>" />
        <?php } while ($row_rslienhewebsite = mysql_fetch_assoc($rslienhewebsite)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaLienhe'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaLienhe')" />
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
