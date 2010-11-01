<?php require_once('../Connections/conn_project.php'); ?>
<?php
//MX Widgets3 include
require_once('../includes/wdg/WDG.php');

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
$formValidation->addField("TenThanhVien", true, "text", "", "", "", "Vui lòng nhập tên thành viên !");
$formValidation->addField("Username", true, "text", "", "", "", "Vui lòng nhập username !");
$formValidation->addField("Pass", true, "text", "", "", "", "Vui lòng nhập pass !");
$formValidation->addField("Email", true, "text", "email", "", "", "Vui lòng nhập đúng định dạng email !");
$tNGs->prepareValidation($formValidation);
// End trigger

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

//start Trigger_CheckOldPassword trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckOldPassword(&$tNG) {
  return Trigger_UpdatePassword_CheckOldPassword($tNG);
}
//end Trigger_CheckOldPassword trigger

mysql_select_db($database_conn_project, $conn_project);
$query_rs_khoa = "SELECT MaKhoa, TenKhoa FROM khoa";
$rs_khoa = mysql_query($query_rs_khoa, $conn_project) or die(mysql_error());
$row_rs_khoa = mysql_fetch_assoc($rs_khoa);
$totalRows_rs_khoa = mysql_num_rows($rs_khoa);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_khoa1 = "SELECT MaKhoa, TenKhoa FROM khoa";
$rs_khoa1 = mysql_query($query_rs_khoa1, $conn_project) or die(mysql_error());
$row_rs_khoa1 = mysql_fetch_assoc($rs_khoa1);
$totalRows_rs_khoa1 = mysql_num_rows($rs_khoa1);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_lop = "SELECT MaLop, TenLop, MaKhoa FROM lop";
$rs_lop = mysql_query($query_rs_lop, $conn_project) or die(mysql_error());
$row_rs_lop = mysql_fetch_assoc($rs_lop);
$totalRows_rs_lop = mysql_num_rows($rs_lop);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_lop1 = "SELECT MaLop, TenLop, MaKhoa FROM lop";
$rs_lop1 = mysql_query($query_rs_lop1, $conn_project) or die(mysql_error());
$row_rs_lop1 = mysql_fetch_assoc($rs_lop1);
$totalRows_rs_lop1 = mysql_num_rows($rs_lop1);

// Make an insert transaction instance
$ins_thanhvien = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_thanhvien);
// Register triggers
$ins_thanhvien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_thanhvien->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_thanhvien->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_thanhvien->registerConditionalTrigger("{POST.Pass} != {POST.re_Pass}", "BEFORE", "Trigger_CheckPasswords", 50);
// Add columns
$ins_thanhvien->setTable("thanhvien");
$ins_thanhvien->addColumn("TenThanhVien", "STRING_TYPE", "POST", "TenThanhVien");
$ins_thanhvien->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$ins_thanhvien->addColumn("NgaySinh", "DATE_TYPE", "POST", "NgaySinh");
$ins_thanhvien->addColumn("Username", "STRING_TYPE", "POST", "Username");
$ins_thanhvien->addColumn("Pass", "STRING_TYPE", "POST", "Pass");
$ins_thanhvien->addColumn("MaKhoa", "NUMERIC_TYPE", "POST", "MaKhoa");
$ins_thanhvien->addColumn("MaLop", "NUMERIC_TYPE", "POST", "MaLop");
$ins_thanhvien->addColumn("QueQuan", "STRING_TYPE", "POST", "QueQuan");
$ins_thanhvien->addColumn("NgayLapThe", "DATE_TYPE", "VALUE", "{NOW_DT}");
$ins_thanhvien->addColumn("Email", "STRING_TYPE", "POST", "Email");
$ins_thanhvien->addColumn("SoDienThoai", "STRING_TYPE", "POST", "SoDienThoai");
$ins_thanhvien->addColumn("Active", "CHECKBOX_1_0_TYPE", "POST", "Active", "0");
$ins_thanhvien->setPrimaryKey("MaThanhVien", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_thanhvien = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_thanhvien);
// Register triggers
$upd_thanhvien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_thanhvien->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_thanhvien->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_thanhvien->registerConditionalTrigger("{POST.Pass} != {POST.re_Pass}", "BEFORE", "Trigger_CheckPasswords", 50);
$upd_thanhvien->registerTrigger("BEFORE", "Trigger_CheckOldPassword", 60);
// Add columns
$upd_thanhvien->setTable("thanhvien");
$upd_thanhvien->addColumn("TenThanhVien", "STRING_TYPE", "POST", "TenThanhVien");
$upd_thanhvien->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$upd_thanhvien->addColumn("NgaySinh", "DATE_TYPE", "POST", "NgaySinh");
$upd_thanhvien->addColumn("Username", "STRING_TYPE", "POST", "Username");
$upd_thanhvien->addColumn("Pass", "STRING_TYPE", "POST", "Pass");
$upd_thanhvien->addColumn("MaKhoa", "NUMERIC_TYPE", "POST", "MaKhoa");
$upd_thanhvien->addColumn("MaLop", "NUMERIC_TYPE", "POST", "MaLop");
$upd_thanhvien->addColumn("QueQuan", "STRING_TYPE", "POST", "QueQuan");
$upd_thanhvien->addColumn("NgayLapThe", "DATE_TYPE", "CURRVAL", "");
$upd_thanhvien->addColumn("Email", "STRING_TYPE", "POST", "Email");
$upd_thanhvien->addColumn("SoDienThoai", "STRING_TYPE", "POST", "SoDienThoai");
$upd_thanhvien->addColumn("Active", "CHECKBOX_1_0_TYPE", "POST", "Active");
$upd_thanhvien->setPrimaryKey("MaThanhVien", "NUMERIC_TYPE", "GET", "MaThanhVien");

// Make an instance of the transaction object
$del_thanhvien = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_thanhvien);
// Register triggers
$del_thanhvien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_thanhvien->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_thanhvien->setTable("thanhvien");
$del_thanhvien->setPrimaryKey("MaThanhVien", "NUMERIC_TYPE", "GET", "MaThanhVien");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsthanhvien = $tNGs->getRecordset("thanhvien");
$row_rsthanhvien = mysql_fetch_assoc($rsthanhvien);
$totalRows_rsthanhvien = mysql_num_rows($rsthanhvien);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?><script src="../includes/nxt/scripts/form.js" type="text/javascript"></script><script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
<script type="text/javascript" src="../includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="../includes/resources/calendar.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/JSRecordset.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/DependentDropdown.js"></script>
<?php
//begin JSRecordset
$jsObject_rs_lop = new WDG_JsRecordset("rs_lop");
echo $jsObject_rs_lop->getOutput();
//end JSRecordset
?>
</head>

<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['MaThanhVien'] == "") {
?>
    <?php echo NXT_getResource("Insert_FH"); ?>
    <?php 
// else Conditional region1
} else { ?>
    <?php echo NXT_getResource("Update_FH"); ?>
    <?php } 
// endif Conditional region1
?>
    Thành Viên</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rsthanhvien > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td class="KT_th"><label for="TenThanhVien_<?php echo $cnt1; ?>">Tên Thành Viên:</label></td>
          <td><input type="text" name="TenThanhVien_<?php echo $cnt1; ?>" id="TenThanhVien_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthanhvien['TenThanhVien']); ?>" size="32" maxlength="70" />
              <?php echo $tNGs->displayFieldHint("TenThanhVien");?> <?php echo $tNGs->displayFieldError("thanhvien", "TenThanhVien", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="GioiTinh_<?php echo $cnt1; ?>_1">Giới Tính:</label></td>
          <td><div>
            <input <?php if (!(strcmp(KT_escapeAttribute($row_rsthanhvien['GioiTinh']),"Nam"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_1" value="Nam" />
            <label for="GioiTinh_<?php echo $cnt1; ?>_1">Nam</label>
          </div>
              <div>
                <input <?php if (!(strcmp(KT_escapeAttribute($row_rsthanhvien['GioiTinh']),"Nữ "))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_2" value="N&#7919; " />
                <label for="GioiTinh_<?php echo $cnt1; ?>_2">Nữ</label>
              </div>
            <?php echo $tNGs->displayFieldError("thanhvien", "GioiTinh", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="NgaySinh_<?php echo $cnt1; ?>">Ngày Sinh:</label></td>
          <td><input name="NgaySinh_<?php echo $cnt1; ?>" id="NgaySinh_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rsthanhvien['NgaySinh']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
              <?php echo $tNGs->displayFieldHint("NgaySinh");?> <?php echo $tNGs->displayFieldError("thanhvien", "NgaySinh", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="Username_<?php echo $cnt1; ?>">Số CMND:</label></td>
          <td><input type="text" name="Username_<?php echo $cnt1; ?>" id="Username_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthanhvien['Username']); ?>" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldHint("Username");?> <?php echo $tNGs->displayFieldError("thanhvien", "Username", $cnt1); ?> </td>
        </tr>
        <?php 
// Show IF Conditional show_old_Pass_on_update_only 
if (@$_GET['MaThanhVien'] != "") {
?>
        <tr>
          <td class="KT_th"><label for="old_Pass_<?php echo $cnt1; ?>">Old Pass:</label></td>
          <td><input type="password" name="old_Pass_<?php echo $cnt1; ?>" id="old_Pass_<?php echo $cnt1; ?>" value="" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldError("thanhvien", "old_Pass", $cnt1); ?> </td>
        </tr>
        <?php } 
// endif Conditional show_old_Pass_on_update_only
?>
        <tr>
          <td class="KT_th"><label for="Pass_<?php echo $cnt1; ?>">Pass:</label></td>
          <td><input type="password" name="Pass_<?php echo $cnt1; ?>" id="Pass_<?php echo $cnt1; ?>" value="" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldHint("Pass");?> <?php echo $tNGs->displayFieldError("thanhvien", "Pass", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="re_Pass_<?php echo $cnt1; ?>">Re-type Pass:</label></td>
          <td><input type="password" name="re_Pass_<?php echo $cnt1; ?>" id="re_Pass_<?php echo $cnt1; ?>" value="" size="32" maxlength="45" />
          </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="MaKhoa_<?php echo $cnt1; ?>">Khoa:</label></td>
          <td><select name="MaKhoa_<?php echo $cnt1; ?>" id="MaKhoa_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_rs_khoa['MaKhoa']?>"<?php if (!(strcmp($row_rs_khoa['MaKhoa'], $row_rsthanhvien['MaKhoa']))) {echo "SELECTED";} ?>><?php echo $row_rs_khoa['TenKhoa']?></option>
            <?php
} while ($row_rs_khoa = mysql_fetch_assoc($rs_khoa));
  $rows = mysql_num_rows($rs_khoa);
  if($rows > 0) {
      mysql_data_seek($rs_khoa, 0);
	  $row_rs_khoa = mysql_fetch_assoc($rs_khoa);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("thanhvien", "MaKhoa", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="MaLop_<?php echo $cnt1; ?>">Lớp :</label></td>
          <td><select name="MaLop_<?php echo $cnt1; ?>" id="MaLop_<?php echo $cnt1; ?>" wdg:subtype="DependentDropdown" wdg:type="widget" wdg:recordset="rs_lop" wdg:displayfield="TenLop" wdg:valuefield="MaLop" wdg:fkey="MaKhoa" wdg:triggerobject="MaKhoa_<?php echo $cnt1; ?>" wdg:selected="<?php echo $row_rsthanhvien['MaLop'] ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
          </select>
              <?php echo $tNGs->displayFieldError("thanhvien", "MaLop", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="QueQuan_<?php echo $cnt1; ?>">Quê Quán:</label></td>
          <td><input type="text" name="QueQuan_<?php echo $cnt1; ?>" id="QueQuan_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthanhvien['QueQuan']); ?>" size="32" maxlength="250" />
              <?php echo $tNGs->displayFieldHint("QueQuan");?> <?php echo $tNGs->displayFieldError("thanhvien", "QueQuan", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th">Ngày Lập Thẻ:</td>
          <td><?php echo KT_formatDate($row_rsthanhvien['NgayLapThe']); ?></td>
        </tr>
        <tr>
          <td class="KT_th"><label for="Email_<?php echo $cnt1; ?>">Email:</label></td>
          <td><input type="text" name="Email_<?php echo $cnt1; ?>" id="Email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthanhvien['Email']); ?>" size="32" maxlength="100" />
              <?php echo $tNGs->displayFieldHint("Email");?> <?php echo $tNGs->displayFieldError("thanhvien", "Email", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="SoDienThoai_<?php echo $cnt1; ?>">Số Điện Thoại:</label></td>
          <td><input type="text" name="SoDienThoai_<?php echo $cnt1; ?>" id="SoDienThoai_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthanhvien['SoDienThoai']); ?>" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldHint("SoDienThoai");?> <?php echo $tNGs->displayFieldError("thanhvien", "SoDienThoai", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="Active_<?php echo $cnt1; ?>">Active:</label></td>
          <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsthanhvien['Active']),"1"))) {echo "checked";} ?> type="checkbox" name="Active_<?php echo $cnt1; ?>" id="Active_<?php echo $cnt1; ?>" value="1" />
              <?php echo $tNGs->displayFieldError("thanhvien", "Active", $cnt1); ?> </td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_thanhvien_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsthanhvien['kt_pk_thanhvien']); ?>" />
      <?php } while ($row_rsthanhvien = mysql_fetch_assoc($rsthanhvien)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaThanhVien'] == "") {
      ?>
          <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
          <?php 
      // else Conditional region1
      } else { ?>
          <div class="KT_operations">
            <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaThanhVien')" />
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
<?php
mysql_free_result($rs_khoa);

mysql_free_result($rs_khoa1);

mysql_free_result($rs_lop);

mysql_free_result($rs_lop1);
?>
