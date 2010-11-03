<?php require_once('Connections/conn_project.php'); ?><?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make unified connection variable
$conn_conn_project = new KT_connection($conn_project, $database_conn_project);

//start Trigger_CheckPasswords trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckPasswords(&$tNG) {
  $myThrowError = new tNG_ThrowError($tNG);
  $myThrowError->setErrorMsg("Could not create account.");
  $myThrowError->setField("Pass");
  $myThrowError->setFieldErrorMsg("The two passwords do not match.");
  return $myThrowError->Execute();
}
//end Trigger_CheckPasswords trigger

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("Pass", true, "text", "", "", "", "Vui lòng nhập pass !");
$formValidation->addField("Email", true, "text", "email", "", "", "Vui lòng nhập đúng định dạng email !");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckOldPassword trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckOldPassword(&$tNG) {
  return Trigger_UpdatePassword_CheckOldPassword($tNG);
}
//end Trigger_CheckOldPassword trigger

// Make an update transaction instance
$upd_thanhvien = new tNG_update($conn_conn_project);
$tNGs->addTransaction($upd_thanhvien);
// Register triggers
$upd_thanhvien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_thanhvien->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_thanhvien->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php?mod=user_capnhatthongtin_thanhcong");
$upd_thanhvien->registerConditionalTrigger("{POST.Pass} != {POST.re_Pass}", "BEFORE", "Trigger_CheckPasswords", 50);
$upd_thanhvien->registerTrigger("BEFORE", "Trigger_CheckOldPassword", 60);
// Add columns
$upd_thanhvien->setTable("thanhvien");
$upd_thanhvien->addColumn("Pass", "STRING_TYPE", "POST", "Pass");
$upd_thanhvien->addColumn("Email", "STRING_TYPE", "POST", "Email");
$upd_thanhvien->addColumn("SoDienThoai", "STRING_TYPE", "POST", "SoDienThoai");
$upd_thanhvien->setPrimaryKey("MaThanhVien", "NUMERIC_TYPE", "SESSION", "kt_login_id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsthanhvien = $tNGs->getRecordset("thanhvien");
$row_rsthanhvien = mysql_fetch_assoc($rsthanhvien);
$totalRows_rsthanhvien = mysql_num_rows($rsthanhvien);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="includes/common/js/base.js" type="text/javascript"></script><script src="includes/common/js/utility.js" type="text/javascript"></script><script src="includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="index.php?mod=capnhatthongtinthanhcong" method="post" name="form1" id="form1">
<div id="capnhatthongtin">
<div id="capnhatthongtin_top">CẬP NHẬT THÔNG TIN CÁ NHÂN</div>
<div id="capnhatthongtin_cen">
  <table width="560"  cellpadding="2" cellspacing="0">
    <tr>
      <td class="KT_th"><label for="old_Pass">Old Pass:</label></td>
      <td><input type="password" name="old_Pass" id="old_Pass" value="" size="32" />
          <?php echo $tNGs->displayFieldError("thanhvien", "old_Pass"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="Pass">New Pass:</label></td>
      <td><input type="password" name="Pass" id="Pass" value="" size="32" />
          <?php echo $tNGs->displayFieldHint("Pass");?> <?php echo $tNGs->displayFieldError("thanhvien", "Pass"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="re_Pass">Re-type Pass:</label></td>
      <td><input type="password" name="re_Pass" id="re_Pass" value="" size="32" />      </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="Email">Email:</label></td>
      <td><input type="text" name="Email" id="Email" value="<?php echo KT_escapeAttribute($row_rsthanhvien['Email']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("Email");?> <?php echo $tNGs->displayFieldError("thanhvien", "Email"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="SoDienThoai">Số Điện Thoại:</label></td>
      <td><input type="text" name="SoDienThoai" id="SoDienThoai" value="<?php echo KT_escapeAttribute($row_rsthanhvien['SoDienThoai']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("SoDienThoai");?> <?php echo $tNGs->displayFieldError("thanhvien", "SoDienThoai"); ?> </td>
    </tr>
    
      <td colspan="2"><input name="KT_Update1" type="submit" class="capnhat" id="KT_Update1" value="Cập nhật" />      </td>
    
  </table>
  </div>
  </div>
</form>
<p>&nbsp;</p>

</body>
</html>
