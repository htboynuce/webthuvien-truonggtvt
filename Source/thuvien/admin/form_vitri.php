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
$formValidation->addField("TenViTri", true, "text", "", "", "", "Vui lòng nhập tên vị trí !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("vitri");
  $tblFldObj->addFieldName("TenViTri");
  $tblFldObj->setErrorMsg("Tên vị trí này đã có ! Vui lòng nhập tên khác !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

// Make an insert transaction instance
$ins_vitri = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_vitri);
// Register triggers
$ins_vitri->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_vitri->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_vitri->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_vitri");
$ins_vitri->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_vitri->setTable("vitri");
$ins_vitri->addColumn("TenViTri", "STRING_TYPE", "POST", "TenViTri");
$ins_vitri->addColumn("Khu", "STRING_TYPE", "POST", "Khu");
$ins_vitri->addColumn("Ke", "STRING_TYPE", "POST", "Ke");
$ins_vitri->addColumn("Ngan", "STRING_TYPE", "POST", "Ngan");
$ins_vitri->setPrimaryKey("MaViTri", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_vitri = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_vitri);
// Register triggers
$upd_vitri->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_vitri->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_vitri->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_vitri");
$upd_vitri->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_vitri->setTable("vitri");
$upd_vitri->addColumn("TenViTri", "STRING_TYPE", "POST", "TenViTri");
$upd_vitri->addColumn("Khu", "STRING_TYPE", "POST", "Khu");
$upd_vitri->addColumn("Ke", "STRING_TYPE", "POST", "Ke");
$upd_vitri->addColumn("Ngan", "STRING_TYPE", "POST", "Ngan");
$upd_vitri->setPrimaryKey("MaViTri", "NUMERIC_TYPE", "GET", "MaViTri");

// Make an instance of the transaction object
$del_vitri = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_vitri);
// Register triggers
$del_vitri->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_vitri->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_vitri");
// Add columns
$del_vitri->setTable("vitri");
$del_vitri->setPrimaryKey("MaViTri", "NUMERIC_TYPE", "GET", "MaViTri");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsvitri = $tNGs->getRecordset("vitri");
$row_rsvitri = mysql_fetch_assoc($rsvitri);
$totalRows_rsvitri = mysql_num_rows($rsvitri);
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
if (@$_GET['MaViTri'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Vị trí</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsvitri > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenViTri_<?php echo $cnt1; ?>">Tên Vị Trí:</label></td>
            <td><input type="text" name="TenViTri_<?php echo $cnt1; ?>" id="TenViTri_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvitri['TenViTri']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("TenViTri");?> <?php echo $tNGs->displayFieldError("vitri", "TenViTri", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Khu_<?php echo $cnt1; ?>">Khu:</label></td>
            <td><input type="text" name="Khu_<?php echo $cnt1; ?>" id="Khu_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvitri['Khu']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("Khu");?> <?php echo $tNGs->displayFieldError("vitri", "Khu", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Ke_<?php echo $cnt1; ?>">Kệ :</label></td>
            <td><input type="text" name="Ke_<?php echo $cnt1; ?>" id="Ke_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvitri['Ke']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("Ke");?> <?php echo $tNGs->displayFieldError("vitri", "Ke", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Ngan_<?php echo $cnt1; ?>">Ngăn:</label></td>
            <td><input type="text" name="Ngan_<?php echo $cnt1; ?>" id="Ngan_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvitri['Ngan']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("Ngan");?> <?php echo $tNGs->displayFieldError("vitri", "Ngan", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_vitri_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsvitri['kt_pk_vitri']); ?>" />
        <?php } while ($row_rsvitri = mysql_fetch_assoc($rsvitri)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaViTri'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaViTri')" />
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
