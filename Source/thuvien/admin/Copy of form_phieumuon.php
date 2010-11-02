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

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("TenPhieuMuon", true, "text", "", "", "", "Vui lòng nhập tên phiếu mượn !");
$formValidation->addField("NgayHetHanThe", true, "text", "", "", "", "Vui lòng chọn ngày hết hạn thẻ !");
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

mysql_select_db($database_conn_project, $conn_project);
$query_rs_thanhvien = "SELECT MaThanhVien, TenThanhVien, Username FROM thanhvien WHERE Active = 1";
$rs_thanhvien = mysql_query($query_rs_thanhvien, $conn_project) or die(mysql_error());
$row_rs_thanhvien = mysql_fetch_assoc($rs_thanhvien);
$totalRows_rs_thanhvien = mysql_num_rows($rs_thanhvien);

mysql_select_db($database_conn_project, $conn_project);
$query_Recordset1 = "SELECT Username, MaThanhVien FROM thanhvien ORDER BY Username";
$Recordset1 = mysql_query($query_Recordset1, $conn_project) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

// Make an insert transaction instance
$ins_phieumuon = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_phieumuon);
// Register triggers
$ins_phieumuon->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_phieumuon->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_phieumuon->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_phieumuon->setTable("phieumuon");
$ins_phieumuon->addColumn("TenPhieuMuon", "STRING_TYPE", "POST", "TenPhieuMuon");
$ins_phieumuon->addColumn("MaThanhVien", "NUMERIC_TYPE", "POST", "MaThanhVien");
$ins_phieumuon->addColumn("NgayHetHanThe", "STRING_TYPE", "POST", "NgayHetHanThe");
$ins_phieumuon->addColumn("NgayLapThe", "DATE_TYPE", "VALUE", "{NOW_DT}");
$ins_phieumuon->setPrimaryKey("MaPhieuMuon", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_phieumuon = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_phieumuon);
// Register triggers
$upd_phieumuon->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_phieumuon->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_phieumuon->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_phieumuon->setTable("phieumuon");
$upd_phieumuon->addColumn("TenPhieuMuon", "STRING_TYPE", "POST", "TenPhieuMuon");
$upd_phieumuon->addColumn("MaThanhVien", "NUMERIC_TYPE", "POST", "MaThanhVien");
$upd_phieumuon->addColumn("NgayHetHanThe", "STRING_TYPE", "POST", "NgayHetHanThe");
$upd_phieumuon->addColumn("NgayLapThe", "DATE_TYPE", "CURRVAL", "");
$upd_phieumuon->setPrimaryKey("MaPhieuMuon", "NUMERIC_TYPE", "GET", "MaPhieuMuon");

// Make an instance of the transaction object
$del_phieumuon = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_phieumuon);
// Register triggers
$del_phieumuon->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_phieumuon->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_phieumuon->setTable("phieumuon");
$del_phieumuon->setPrimaryKey("MaPhieuMuon", "NUMERIC_TYPE", "GET", "MaPhieuMuon");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsphieumuon = $tNGs->getRecordset("phieumuon");
$row_rsphieumuon = mysql_fetch_assoc($rsphieumuon);
$totalRows_rsphieumuon = mysql_num_rows($rsphieumuon);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
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
<script type="text/javascript" src="../includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="../includes/resources/calendar.js"></script>
</head>

<body>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['MaPhieuMuon'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Phiếu Mượn</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsphieumuon > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenPhieuMuon_<?php echo $cnt1; ?>">Tên Phiếu Mượn:</label></td>
            <td><input type="text" name="TenPhieuMuon_<?php echo $cnt1; ?>" id="TenPhieuMuon_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsphieumuon['TenPhieuMuon']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("TenPhieuMuon");?> <?php echo $tNGs->displayFieldError("phieumuon", "TenPhieuMuon", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaThanhVien_<?php echo $cnt1; ?>">Thành Viên:</label></td>
            <td><select name="MaThanhVien_<?php echo $cnt1; ?>" id="MaThanhVien_<?php echo $cnt1; ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
              <?php 
do {  
?>
              <option value="<?php echo $row_rs_thanhvien['MaThanhVien']?>"<?php if (!(strcmp($row_rs_thanhvien['MaThanhVien'], $row_rsphieumuon['MaThanhVien']))) {echo "SELECTED";} ?>><?php echo $row_rs_thanhvien['Username']?></option>
              <?php
} while ($row_rs_thanhvien = mysql_fetch_assoc($rs_thanhvien));
  $rows = mysql_num_rows($rs_thanhvien);
  if($rows > 0) {
      mysql_data_seek($rs_thanhvien, 0);
	  $row_rs_thanhvien = mysql_fetch_assoc($rs_thanhvien);
  }
?>
            </select>
                <?php echo $tNGs->displayFieldError("phieumuon", "MaThanhVien", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="NgayHetHanThe_<?php echo $cnt1; ?>">Ngày hết hạn thẻ:</label></td>
            <td><input name="NgayHetHanThe_<?php echo $cnt1; ?>" id="NgayHetHanThe_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsphieumuon['NgayHetHanThe']); ?>" size="32" maxlength="100" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                <?php echo $tNGs->displayFieldHint("NgayHetHanThe");?> <?php echo $tNGs->displayFieldError("phieumuon", "NgayHetHanThe", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th">Ngày lập thẻ:</td>
            <td><?php echo KT_formatDate($row_rsphieumuon['NgayLapThe']); ?></td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_phieumuon_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsphieumuon['kt_pk_phieumuon']); ?>" />
        <?php } while ($row_rsphieumuon = mysql_fetch_assoc($rsphieumuon)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaPhieuMuon'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaPhieuMuon')" />
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
mysql_free_result($rs_thanhvien);

mysql_free_result($Recordset1);
?>
