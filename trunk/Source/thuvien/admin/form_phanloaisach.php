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
$formValidation->addField("TenPhanLoaiSach", true, "text", "", "", "", "Vui lòng nhập tên phân loại sách !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("phanloaisach");
  $tblFldObj->addFieldName("TenPhanLoaiSach");
  $tblFldObj->setErrorMsg("Tên phân loại sách đã có ! Vui lòng nhập tên khác !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

// Make an insert transaction instance
$ins_phanloaisach = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_phanloaisach);
// Register triggers
$ins_phanloaisach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_phanloaisach->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_phanloaisach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_phanloaisach");
$ins_phanloaisach->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_phanloaisach->setTable("phanloaisach");
$ins_phanloaisach->addColumn("TenPhanLoaiSach", "STRING_TYPE", "POST", "TenPhanLoaiSach");
$ins_phanloaisach->addColumn("Visible", "CHECKBOX_1_0_TYPE", "POST", "Visible", "0");
$ins_phanloaisach->setPrimaryKey("MaPhanLoaiSach", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_phanloaisach = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_phanloaisach);
// Register triggers
$upd_phanloaisach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_phanloaisach->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_phanloaisach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_phanloaisach");
$upd_phanloaisach->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_phanloaisach->setTable("phanloaisach");
$upd_phanloaisach->addColumn("TenPhanLoaiSach", "STRING_TYPE", "POST", "TenPhanLoaiSach");
$upd_phanloaisach->addColumn("Visible", "CHECKBOX_1_0_TYPE", "POST", "Visible");
$upd_phanloaisach->setPrimaryKey("MaPhanLoaiSach", "NUMERIC_TYPE", "GET", "MaPhanLoaiSach");

// Make an instance of the transaction object
$del_phanloaisach = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_phanloaisach);
// Register triggers
$del_phanloaisach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_phanloaisach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_phanloaisach");
// Add columns
$del_phanloaisach->setTable("phanloaisach");
$del_phanloaisach->setPrimaryKey("MaPhanLoaiSach", "NUMERIC_TYPE", "GET", "MaPhanLoaiSach");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsphanloaisach = $tNGs->getRecordset("phanloaisach");
$row_rsphanloaisach = mysql_fetch_assoc($rsphanloaisach);
$totalRows_rsphanloaisach = mysql_num_rows($rsphanloaisach);
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
if (@$_GET['MaPhanLoaiSach'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Phân loại sách</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsphanloaisach > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenPhanLoaiSach_<?php echo $cnt1; ?>">Tên phân loại sách:</label></td>
            <td><input type="text" name="TenPhanLoaiSach_<?php echo $cnt1; ?>" id="TenPhanLoaiSach_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsphanloaisach['TenPhanLoaiSach']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("TenPhanLoaiSach");?> <?php echo $tNGs->displayFieldError("phanloaisach", "TenPhanLoaiSach", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Visible_<?php echo $cnt1; ?>">Hiện:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsphanloaisach['Visible']),"1"))) {echo "checked";} ?> type="checkbox" name="Visible_<?php echo $cnt1; ?>" id="Visible_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("phanloaisach", "Visible", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_phanloaisach_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsphanloaisach['kt_pk_phanloaisach']); ?>" />
        <?php } while ($row_rsphanloaisach = mysql_fetch_assoc($rsphanloaisach)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaPhanLoaiSach'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaPhanLoaiSach')" />
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
