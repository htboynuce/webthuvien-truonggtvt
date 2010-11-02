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
$formValidation->addField("MaPhieuMuon", false, "numeric", "int", "", "", "Please enter a valid value.");
$formValidation->addField("MaLinhVuc", true, "numeric", "", "", "", "Vui lòng chọn lĩnh vực sách !");
$formValidation->addField("MaNhom", true, "numeric", "", "", "", "Vui lòng chọn nhóm sách !");
$formValidation->addField("MaSach", true, "numeric", "", "", "", "Vui lòng chọn tên sách !");
$formValidation->addField("MaCuonSach", true, "numeric", "", "", "", "Vui lòng chọn mã sách !");
$formValidation->addField("NgayHetHan", true, "date", "", "", "", "Vui lòng chọn ngày hết hạn !");
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
$query_rs_phieumuon = "SELECT MaPhieuMuon, TenPhieuMuon FROM phieumuon";
$rs_phieumuon = mysql_query($query_rs_phieumuon, $conn_project) or die(mysql_error());
$row_rs_phieumuon = mysql_fetch_assoc($rs_phieumuon);
$totalRows_rs_phieumuon = mysql_num_rows($rs_phieumuon);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_linhvuc = "SELECT MaLinhVuc, TenLinhVuc FROM linhvuc";
$rs_linhvuc = mysql_query($query_rs_linhvuc, $conn_project) or die(mysql_error());
$row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc);
$totalRows_rs_linhvuc = mysql_num_rows($rs_linhvuc);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_nhomsach = "SELECT MaNhomSach, TenNhomSach, MaLinhVuc FROM nhomsach";
$rs_nhomsach = mysql_query($query_rs_nhomsach, $conn_project) or die(mysql_error());
$row_rs_nhomsach = mysql_fetch_assoc($rs_nhomsach);
$totalRows_rs_nhomsach = mysql_num_rows($rs_nhomsach);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_sach = "SELECT MasSach, MaNhom, TenSach FROM sach";
$rs_sach = mysql_query($query_rs_sach, $conn_project) or die(mysql_error());
$row_rs_sach = mysql_fetch_assoc($rs_sach);
$totalRows_rs_sach = mysql_num_rows($rs_sach);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_cuonsach = "SELECT Ma, MaCuonSach, MaSach FROM cuonsach";
$rs_cuonsach = mysql_query($query_rs_cuonsach, $conn_project) or die(mysql_error());
$row_rs_cuonsach = mysql_fetch_assoc($rs_cuonsach);
$totalRows_rs_cuonsach = mysql_num_rows($rs_cuonsach);

$NxTMasterId_rsphieumuon1 = "-1";
if (isset($_GET['NxT_MaPhieuMuon'])) {
  $NxTMasterId_rsphieumuon1 = $_GET['NxT_MaPhieuMuon'];
}
mysql_select_db($database_conn_project, $conn_project);
$query_rsphieumuon1 = sprintf("SELECT MaPhieuMuon, TenPhieuMuon FROM phieumuon WHERE MaPhieuMuon = %s", GetSQLValueString($NxTMasterId_rsphieumuon1, "int"));
$rsphieumuon1 = mysql_query($query_rsphieumuon1, $conn_project) or die(mysql_error());
$row_rsphieumuon1 = mysql_fetch_assoc($rsphieumuon1);
$totalRows_rsphieumuon1 = mysql_num_rows($rsphieumuon1);

// Make an insert transaction instance
$ins_chitietphieumuon = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_chitietphieumuon);
// Register triggers
$ins_chitietphieumuon->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_chitietphieumuon->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_chitietphieumuon->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_chitietphieumuon");
// Add columns
$ins_chitietphieumuon->setTable("chitietphieumuon");
$ins_chitietphieumuon->addColumn("MaPhieuMuon", "NUMERIC_TYPE", "GET", "NxT_MaPhieuMuon");
$ins_chitietphieumuon->addColumn("MaLinhVuc", "NUMERIC_TYPE", "POST", "MaLinhVuc");
$ins_chitietphieumuon->addColumn("MaNhom", "NUMERIC_TYPE", "POST", "MaNhom");
$ins_chitietphieumuon->addColumn("MaSach", "NUMERIC_TYPE", "POST", "MaSach");
$ins_chitietphieumuon->addColumn("MaCuonSach", "NUMERIC_TYPE", "POST", "MaCuonSach");
$ins_chitietphieumuon->addColumn("NgayMuon", "DATE_TYPE", "VALUE", "{NOW_DT}");
$ins_chitietphieumuon->addColumn("NgayHetHan", "DATE_TYPE", "POST", "NgayHetHan");
$ins_chitietphieumuon->addColumn("NgayTra", "DATE_TYPE", "POST", "NgayTra");
$ins_chitietphieumuon->addColumn("TienPhat", "STRING_TYPE", "POST", "TienPhat");
$ins_chitietphieumuon->addColumn("LyDoPhat", "STRING_TYPE", "POST", "LyDoPhat");
$ins_chitietphieumuon->addColumn("TinhTrang", "CHECKBOX_1_0_TYPE", "POST", "TinhTrang", "0");
$ins_chitietphieumuon->setPrimaryKey("MaChiTietPhieuMuon", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_chitietphieumuon = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_chitietphieumuon);
// Register triggers
$upd_chitietphieumuon->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_chitietphieumuon->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_chitietphieumuon->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_chitietphieumuon");
// Add columns
$upd_chitietphieumuon->setTable("chitietphieumuon");
$upd_chitietphieumuon->addColumn("MaLinhVuc", "NUMERIC_TYPE", "POST", "MaLinhVuc");
$upd_chitietphieumuon->addColumn("MaNhom", "NUMERIC_TYPE", "POST", "MaNhom");
$upd_chitietphieumuon->addColumn("MaSach", "NUMERIC_TYPE", "POST", "MaSach");
$upd_chitietphieumuon->addColumn("MaCuonSach", "NUMERIC_TYPE", "POST", "MaCuonSach");
$upd_chitietphieumuon->addColumn("NgayMuon", "DATE_TYPE", "CURRVAL", "");
$upd_chitietphieumuon->addColumn("NgayHetHan", "DATE_TYPE", "POST", "NgayHetHan");
$upd_chitietphieumuon->addColumn("NgayTra", "DATE_TYPE", "POST", "NgayTra");
$upd_chitietphieumuon->addColumn("TienPhat", "STRING_TYPE", "POST", "TienPhat");
$upd_chitietphieumuon->addColumn("LyDoPhat", "STRING_TYPE", "POST", "LyDoPhat");
$upd_chitietphieumuon->addColumn("TinhTrang", "CHECKBOX_1_0_TYPE", "POST", "TinhTrang");
$upd_chitietphieumuon->setPrimaryKey("MaChiTietPhieuMuon", "NUMERIC_TYPE", "GET", "MaChiTietPhieuMuon");

// Make an instance of the transaction object
$del_chitietphieumuon = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_chitietphieumuon);
// Register triggers
$del_chitietphieumuon->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_chitietphieumuon->registerTrigger("END", "Trigger_Default_Redirect", 99, "admincp1.php?mod=list_chitietphieumuon");
// Add columns
$del_chitietphieumuon->setTable("chitietphieumuon");
$del_chitietphieumuon->setPrimaryKey("MaChiTietPhieuMuon", "NUMERIC_TYPE", "GET", "MaChiTietPhieuMuon");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rschitietphieumuon = $tNGs->getRecordset("chitietphieumuon");
$row_rschitietphieumuon = mysql_fetch_assoc($rschitietphieumuon);
$totalRows_rschitietphieumuon = mysql_num_rows($rschitietphieumuon);
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
<script type="text/javascript" src="../includes/wdg/classes/JSRecordset.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/DependentDropdown.js"></script>
<?php
//begin JSRecordset
$jsObject_rs_nhomsach = new WDG_JsRecordset("rs_nhomsach");
echo $jsObject_rs_nhomsach->getOutput();
//end JSRecordset
?>
<?php
//begin JSRecordset
$jsObject_rs_sach = new WDG_JsRecordset("rs_sach");
echo $jsObject_rs_sach->getOutput();
//end JSRecordset
?>
<?php
//begin JSRecordset
$jsObject_rs_cuonsach = new WDG_JsRecordset("rs_cuonsach");
echo $jsObject_rs_cuonsach->getOutput();
//end JSRecordset
?>
</head>

<body>
<div class="KT_tng" align="center">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['MaChiTietPhieuMuon'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Chi Tiết Phiếu Mượn</h1>
  <div class="KT_tngform">
    <?php 
// Show IF Conditional region5 
if (isset($_GET['NxT_MaPhieuMuon'])) {
?>
      <div>
<?php 
// Show IF Conditional region4 
if (!isset($_GET['MaChiTietPhieuMuon'])) {
?>
          Insert
  <?php 
// else Conditional region4
} else { ?>
          Update
  <?php } 
// endif Conditional region4
?>
        records for: <b><?php echo $row_rsphieumuon1['TenPhieuMuon']; ?></b></div>
      <?php } 
// endif Conditional region5
?><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rschitietphieumuon > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
<tr>
            <td class="KT_th"><label for="MaLinhVuc_<?php echo $cnt1; ?>">Lĩnh Vực:</label></td>
            <td><select name="MaLinhVuc_<?php echo $cnt1; ?>" id="MaLinhVuc_<?php echo $cnt1; ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
              <?php 
do {  
?>
              <option value="<?php echo $row_rs_linhvuc['MaLinhVuc']?>"<?php if (!(strcmp($row_rs_linhvuc['MaLinhVuc'], $row_rschitietphieumuon['MaLinhVuc']))) {echo "SELECTED";} ?>><?php echo $row_rs_linhvuc['TenLinhVuc']?></option>
              <?php
} while ($row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc));
  $rows = mysql_num_rows($rs_linhvuc);
  if($rows > 0) {
      mysql_data_seek($rs_linhvuc, 0);
	  $row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc);
  }
?>
            </select>
                <?php echo $tNGs->displayFieldError("chitietphieumuon", "MaLinhVuc", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaNhom_<?php echo $cnt1; ?>">Nhóm:</label></td>
            <td><select name="MaNhom_<?php echo $cnt1; ?>" id="MaNhom_<?php echo $cnt1; ?>" wdg:subtype="DependentDropdown" wdg:type="widget" wdg:recordset="rs_nhomsach" wdg:displayfield="TenNhomSach" wdg:valuefield="MaNhomSach" wdg:fkey="MaLinhVuc" wdg:triggerobject="MaLinhVuc_<?php echo $cnt1; ?>" wdg:selected="<?php echo $row_rschitietphieumuon['MaLinhVuc'] ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            </select>
                <?php echo $tNGs->displayFieldError("chitietphieumuon", "MaNhom", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaSach_<?php echo $cnt1; ?>">Sách:</label></td>
            <td><select name="MaSach_<?php echo $cnt1; ?>" id="MaSach_<?php echo $cnt1; ?>" wdg:subtype="DependentDropdown" wdg:type="widget" wdg:recordset="rs_sach" wdg:displayfield="TenSach" wdg:valuefield="MasSach" wdg:fkey="MaNhom" wdg:triggerobject="MaNhom_<?php echo $cnt1; ?>" wdg:selected="<?php echo $row_rschitietphieumuon['MaSach'] ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            </select>
                <?php echo $tNGs->displayFieldError("chitietphieumuon", "MaSach", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaCuonSach_<?php echo $cnt1; ?>">Mã Cuốn Sách:</label></td>
            <td><select name="MaCuonSach_<?php echo $cnt1; ?>" id="MaCuonSach_<?php echo $cnt1; ?>" wdg:subtype="DependentDropdown" wdg:type="widget" wdg:recordset="rs_cuonsach" wdg:displayfield="MaCuonSach" wdg:valuefield="Ma" wdg:fkey="MaSach" wdg:triggerobject="MaSach_<?php echo $cnt1; ?>" wdg:selected="<?php echo $row_rschitietphieumuon['MaCuonSach'] ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            </select>
                <?php echo $tNGs->displayFieldError("chitietphieumuon", "MaCuonSach", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th">Ngày Mượn:</td>
            <td><?php echo KT_formatDate($row_rschitietphieumuon['NgayMuon']); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="NgayHetHan_<?php echo $cnt1; ?>">Ngày Hết Hạn:</label></td>
            <td><input name="NgayHetHan_<?php echo $cnt1; ?>" id="NgayHetHan_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rschitietphieumuon['NgayHetHan']); ?>" size="10" maxlength="100" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                <?php echo $tNGs->displayFieldHint("NgayHetHan");?> <?php echo $tNGs->displayFieldError("chitietphieumuon", "NgayHetHan", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="NgayTra_<?php echo $cnt1; ?>">Ngày Trả:</label></td>
            <td><input name="NgayTra_<?php echo $cnt1; ?>" id="NgayTra_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rschitietphieumuon['NgayTra']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                <?php echo $tNGs->displayFieldHint("NgayTra");?> <?php echo $tNGs->displayFieldError("chitietphieumuon", "NgayTra", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="TienPhat_<?php echo $cnt1; ?>">Tiền phạt:</label></td>
            <td><input type="text" name="TienPhat_<?php echo $cnt1; ?>" id="TienPhat_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rschitietphieumuon['TienPhat']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("TienPhat");?> <?php echo $tNGs->displayFieldError("chitietphieumuon", "TienPhat", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="LyDoPhat_<?php echo $cnt1; ?>">Lý do phạt:</label></td>
            <td><textarea name="LyDoPhat_<?php echo $cnt1; ?>" id="LyDoPhat_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rschitietphieumuon['LyDoPhat']); ?></textarea>
                <?php echo $tNGs->displayFieldHint("LyDoPhat");?> <?php echo $tNGs->displayFieldError("chitietphieumuon", "LyDoPhat", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="TinhTrang_<?php echo $cnt1; ?>">Tình trạng:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rschitietphieumuon['TinhTrang']),"1"))) {echo "checked";} ?> type="checkbox" name="TinhTrang_<?php echo $cnt1; ?>" id="TinhTrang_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("chitietphieumuon", "TinhTrang", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_chitietphieumuon_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rschitietphieumuon['kt_pk_chitietphieumuon']); ?>" />
        <?php } while ($row_rschitietphieumuon = mysql_fetch_assoc($rschitietphieumuon)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MaChiTietPhieuMuon'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MaChiTietPhieuMuon')" />
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
<?php
mysql_free_result($rs_phieumuon);

mysql_free_result($rs_linhvuc);

mysql_free_result($rs_nhomsach);

mysql_free_result($rs_sach);

mysql_free_result($rs_cuonsach);

mysql_free_result($rsphieumuon1);
?>
