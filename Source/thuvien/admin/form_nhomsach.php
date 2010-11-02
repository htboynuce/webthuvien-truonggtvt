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
$formValidation->addField("TenNhomSach", true, "text", "", "", "", "Vui lòng nhập tên nhóm sách !");
$formValidation->addField("MaLinhVuc", true, "numeric", "", "", "", "Vui lòng chọn lĩnh vực !");
$formValidation->addField("MaViTri", true, "numeric", "", "", "", "Vui lòng chọn vị trí !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("nhomsach");
  $tblFldObj->addFieldName("TenNhomSach");
  $tblFldObj->setErrorMsg("Tên nhóm sách đã có ! Vui lòng nhập tên khác !");
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
$query_rs_linhvuc = "SELECT MaLinhVuc, TenLinhVuc FROM linhvuc";
$rs_linhvuc = mysql_query($query_rs_linhvuc, $conn_project) or die(mysql_error());
$row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc);
$totalRows_rs_linhvuc = mysql_num_rows($rs_linhvuc);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_vitri = "SELECT MaViTri, TenViTri FROM vitri";
$rs_vitri = mysql_query($query_rs_vitri, $conn_project) or die(mysql_error());
$row_rs_vitri = mysql_fetch_assoc($rs_vitri);
$totalRows_rs_vitri = mysql_num_rows($rs_vitri);

// Make an insert transaction instance
$ins_nhomsach = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_nhomsach);
// Register triggers
$ins_nhomsach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_nhomsach->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_nhomsach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_nhomsach");
$ins_nhomsach->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_nhomsach->setTable("nhomsach");
$ins_nhomsach->addColumn("TenNhomSach", "STRING_TYPE", "POST", "TenNhomSach");
$ins_nhomsach->addColumn("MaLinhVuc", "NUMERIC_TYPE", "POST", "MaLinhVuc");
$ins_nhomsach->addColumn("MaViTri", "NUMERIC_TYPE", "POST", "MaViTri");
$ins_nhomsach->addColumn("HienMenu1", "CHECKBOX_1_0_TYPE", "POST", "HienMenu1", "0");
$ins_nhomsach->setPrimaryKey("MaNhomSach", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_nhomsach = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_nhomsach);
// Register triggers
$upd_nhomsach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_nhomsach->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_nhomsach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_nhomsach");
$upd_nhomsach->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_nhomsach->setTable("nhomsach");
$upd_nhomsach->addColumn("TenNhomSach", "STRING_TYPE", "POST", "TenNhomSach");
$upd_nhomsach->addColumn("MaLinhVuc", "NUMERIC_TYPE", "POST", "MaLinhVuc");
$upd_nhomsach->addColumn("MaViTri", "NUMERIC_TYPE", "POST", "MaViTri");
$upd_nhomsach->addColumn("HienMenu1", "CHECKBOX_1_0_TYPE", "POST", "HienMenu1");
$upd_nhomsach->setPrimaryKey("MaNhomSach", "NUMERIC_TYPE", "GET", "MaNhomSach");

// Make an instance of the transaction object
$del_nhomsach = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_nhomsach);
// Register triggers
$del_nhomsach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_nhomsach->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_nhomsach");
// Add columns
$del_nhomsach->setTable("nhomsach");
$del_nhomsach->setPrimaryKey("MaNhomSach", "NUMERIC_TYPE", "GET", "MaNhomSach");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsnhomsach = $tNGs->getRecordset("nhomsach");
$row_rsnhomsach = mysql_fetch_assoc($rsnhomsach);
$totalRows_rsnhomsach = mysql_num_rows($rsnhomsach);
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
if (@$_GET['MaNhomSach'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Nhóm sách</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsnhomsach > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenNhomSach_<?php echo $cnt1; ?>">Tên nhóm sách:</label></td>
            <td><input type="text" name="TenNhomSach_<?php echo $cnt1; ?>" id="TenNhomSach_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnhomsach['TenNhomSach']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("TenNhomSach");?> <?php echo $tNGs->displayFieldError("nhomsach", "TenNhomSach", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaLinhVuc_<?php echo $cnt1; ?>">Lĩnh Vực:</label></td>
            <td><select name="MaLinhVuc_<?php echo $cnt1; ?>" id="MaLinhVuc_<?php echo $cnt1; ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
              <?php 
do {  
?>
              <option value="<?php echo $row_rs_linhvuc['MaLinhVuc']?>"<?php if (!(strcmp($row_rs_linhvuc['MaLinhVuc'], $row_rsnhomsach['MaLinhVuc']))) {echo "SELECTED";} ?>><?php echo $row_rs_linhvuc['TenLinhVuc']?></option>
              <?php
} while ($row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc));
  $rows = mysql_num_rows($rs_linhvuc);
  if($rows > 0) {
      mysql_data_seek($rs_linhvuc, 0);
	  $row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc);
  }
?>
            </select>
                <?php echo $tNGs->displayFieldError("nhomsach", "MaLinhVuc", $cnt1); ?> </td>
          </tr>
          
          <tr>
            <td class="KT_th"><label for="MaViTri_<?php echo $cnt1; ?>">Vị Trí:</label></td>
            <td><select name="MaViTri_<?php echo $cnt1; ?>" id="MaViTri_<?php echo $cnt1; ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
              <?php 
do {  
?>
              <option value="<?php echo $row_rs_vitri['MaViTri']?>"<?php if (!(strcmp($row_rs_vitri['MaViTri'], $row_rsnhomsach['MaViTri']))) {echo "SELECTED";} ?>><?php echo $row_rs_vitri['TenViTri']?></option>
              <?php
} while ($row_rs_vitri = mysql_fetch_assoc($rs_vitri));
  $rows = mysql_num_rows($rs_vitri);
  if($rows > 0) {
      mysql_data_seek($rs_vitri, 0);
	  $row_rs_vitri = mysql_fetch_assoc($rs_vitri);
  }
?>
            </select>
                <?php echo $tNGs->displayFieldError("nhomsach", "MaViTri", $cnt1); ?> </td>
          </tr>
          
          <tr>
            <td class="KT_th"><label for="HienMenu1_<?php echo $cnt1; ?>">Hiện Menu:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsnhomsach['HienMenu1']),"1"))) {echo "checked";} ?> type="checkbox" name="HienMenu1_<?php echo $cnt1; ?>" id="HienMenu1_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("nhomsach", "HienMenu1", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_nhomsach_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsnhomsach['kt_pk_nhomsach']); ?>" />
        <?php } while ($row_rsnhomsach = mysql_fetch_assoc($rsnhomsach)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaNhomSach'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaNhomSach')" />
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
?>
</body>
</html>
<?php
mysql_free_result($rs_linhvuc);

mysql_free_result($rs_vitri);
?>
