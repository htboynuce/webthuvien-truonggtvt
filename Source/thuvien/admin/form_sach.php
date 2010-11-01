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
$formValidation->addField("TenSach", true, "text", "", "", "", "Vui lòng nhập tên sách");
$formValidation->addField("MaLinhVuc", true, "numeric", "", "", "", "Vui lòng chọn lĩnh vực !");
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
$query_rs_linhvuc = "SELECT MaLinhVuc, TenLinhVuc FROM linhvuc";
$rs_linhvuc = mysql_query($query_rs_linhvuc, $conn_project) or die(mysql_error());
$row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc);
$totalRows_rs_linhvuc = mysql_num_rows($rs_linhvuc);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_tacgia = "SELECT MaTacGia, TenTacGia FROM tacgia";
$rs_tacgia = mysql_query($query_rs_tacgia, $conn_project) or die(mysql_error());
$row_rs_tacgia = mysql_fetch_assoc($rs_tacgia);
$totalRows_rs_tacgia = mysql_num_rows($rs_tacgia);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_nhomsach = "SELECT MaNhomSach, TenNhomSach, MaLinhVuc FROM nhomsach";
$rs_nhomsach = mysql_query($query_rs_nhomsach, $conn_project) or die(mysql_error());
$row_rs_nhomsach = mysql_fetch_assoc($rs_nhomsach);
$totalRows_rs_nhomsach = mysql_num_rows($rs_nhomsach);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_nhaxuatban = "SELECT MaNhaXuatBan, TenNhaXuatBan FROM nhaxuatban";
$rs_nhaxuatban = mysql_query($query_rs_nhaxuatban, $conn_project) or die(mysql_error());
$row_rs_nhaxuatban = mysql_fetch_assoc($rs_nhaxuatban);
$totalRows_rs_nhaxuatban = mysql_num_rows($rs_nhaxuatban);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_ngonngu = "SELECT MaNgonNguSach, TenNgonNguSach FROM ngonngusach";
$rs_ngonngu = mysql_query($query_rs_ngonngu, $conn_project) or die(mysql_error());
$row_rs_ngonngu = mysql_fetch_assoc($rs_ngonngu);
$totalRows_rs_ngonngu = mysql_num_rows($rs_ngonngu);

mysql_select_db($database_conn_project, $conn_project);
$query_rs_phanloaisach = "SELECT MaPhanLoaiSach, TenPhanLoaiSach FROM phanloaisach";
$rs_phanloaisach = mysql_query($query_rs_phanloaisach, $conn_project) or die(mysql_error());
$row_rs_phanloaisach = mysql_fetch_assoc($rs_phanloaisach);
$totalRows_rs_phanloaisach = mysql_num_rows($rs_phanloaisach);

// Make an insert transaction instance
$ins_sach = new tNG_multipleInsert($conn_conn_project);
$tNGs->addTransaction($ins_sach);
// Register triggers
$ins_sach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_sach->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_sach->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_sach->setTable("sach");
$ins_sach->addColumn("TenSach", "STRING_TYPE", "POST", "TenSach");
$ins_sach->addColumn("SoTrang", "STRING_TYPE", "POST", "SoTrang");
$ins_sach->addColumn("MaLinhVuc", "NUMERIC_TYPE", "POST", "MaLinhVuc");
$ins_sach->addColumn("MaNhom", "NUMERIC_TYPE", "POST", "MaNhom");
$ins_sach->addColumn("cosachmoi", "CHECKBOX_1_0_TYPE", "POST", "cosachmoi", "0");
$ins_sach->addColumn("MaTacGia", "NUMERIC_TYPE", "POST", "MaTacGia");
$ins_sach->addColumn("GiaTien", "STRING_TYPE", "POST", "GiaTien");
$ins_sach->addColumn("NamXuatBan", "STRING_TYPE", "POST", "NamXuatBan");
$ins_sach->addColumn("MaNhaXuatBan", "NUMERIC_TYPE", "POST", "MaNhaXuatBan");
$ins_sach->addColumn("LanXuatBan", "STRING_TYPE", "POST", "LanXuatBan");
$ins_sach->addColumn("GhiChu", "STRING_TYPE", "POST", "GhiChu");
$ins_sach->addColumn("MaNgonNgu", "NUMERIC_TYPE", "POST", "MaNgonNgu");
$ins_sach->addColumn("Visible", "CHECKBOX_1_0_TYPE", "POST", "Visible", "0");
$ins_sach->addColumn("SoLuongNap", "STRING_TYPE", "POST", "SoLuongNap");
$ins_sach->addColumn("SoSachSuDungDuoc", "STRING_TYPE", "POST", "SoSachSuDungDuoc");
$ins_sach->addColumn("NgayCapNhat", "DATE_TYPE", "VALUE", "{NOW_DT}");
$ins_sach->setPrimaryKey("MasSach", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_sach = new tNG_multipleUpdate($conn_conn_project);
$tNGs->addTransaction($upd_sach);
// Register triggers
$upd_sach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_sach->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_sach->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_sach->setTable("sach");
$upd_sach->addColumn("TenSach", "STRING_TYPE", "POST", "TenSach");
$upd_sach->addColumn("SoTrang", "STRING_TYPE", "POST", "SoTrang");
$upd_sach->addColumn("MaLinhVuc", "NUMERIC_TYPE", "POST", "MaLinhVuc");
$upd_sach->addColumn("MaNhom", "NUMERIC_TYPE", "POST", "MaNhom");
$upd_sach->addColumn("cosachmoi", "CHECKBOX_1_0_TYPE", "POST", "cosachmoi");
$upd_sach->addColumn("MaTacGia", "NUMERIC_TYPE", "POST", "MaTacGia");
$upd_sach->addColumn("GiaTien", "STRING_TYPE", "POST", "GiaTien");
$upd_sach->addColumn("NamXuatBan", "STRING_TYPE", "POST", "NamXuatBan");
$upd_sach->addColumn("MaNhaXuatBan", "NUMERIC_TYPE", "POST", "MaNhaXuatBan");
$upd_sach->addColumn("LanXuatBan", "STRING_TYPE", "POST", "LanXuatBan");
$upd_sach->addColumn("GhiChu", "STRING_TYPE", "POST", "GhiChu");
$upd_sach->addColumn("MaNgonNgu", "NUMERIC_TYPE", "POST", "MaNgonNgu");
$upd_sach->addColumn("Visible", "CHECKBOX_1_0_TYPE", "POST", "Visible");
$upd_sach->addColumn("SoLuongNap", "STRING_TYPE", "POST", "SoLuongNap");
$upd_sach->addColumn("SoSachSuDungDuoc", "STRING_TYPE", "POST", "SoSachSuDungDuoc");
$upd_sach->addColumn("NgayCapNhat", "DATE_TYPE", "CURRVAL", "");
$upd_sach->setPrimaryKey("MasSach", "NUMERIC_TYPE", "GET", "MasSach");

// Make an instance of the transaction object
$del_sach = new tNG_multipleDelete($conn_conn_project);
$tNGs->addTransaction($del_sach);
// Register triggers
$del_sach->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_sach->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_sach->setTable("sach");
$del_sach->setPrimaryKey("MasSach", "NUMERIC_TYPE", "GET", "MasSach");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rssach = $tNGs->getRecordset("sach");
$row_rssach = mysql_fetch_assoc($rssach);
$totalRows_rssach = mysql_num_rows($rssach);
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
<script type="text/javascript" src="../includes/wdg/classes/JSRecordset.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/DependentDropdown.js"></script>
<?php
//begin JSRecordset
$jsObject_rs_nhomsach = new WDG_JsRecordset("rs_nhomsach");
echo $jsObject_rs_nhomsach->getOutput();
//end JSRecordset
?>
</head>

<body>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['MasSach'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Sách </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rssach > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenSach_<?php echo $cnt1; ?>">Tên sách:</label></td>
            <td><input type="text" name="TenSach_<?php echo $cnt1; ?>" id="TenSach_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssach['TenSach']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("TenSach");?> <?php echo $tNGs->displayFieldError("sach", "TenSach", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="SoTrang_<?php echo $cnt1; ?>">Số Trang:</label></td>
            <td><input type="text" name="SoTrang_<?php echo $cnt1; ?>" id="SoTrang_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssach['SoTrang']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("SoTrang");?> <?php echo $tNGs->displayFieldError("sach", "SoTrang", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaLinhVuc_<?php echo $cnt1; ?>">Lĩnh Vực:</label></td>
            <td><select name="MaLinhVuc_<?php echo $cnt1; ?>" id="MaLinhVuc_<?php echo $cnt1; ?>">
                <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                <?php 
do {  
?>
                <option value="<?php echo $row_rs_linhvuc['MaLinhVuc']?>"<?php if (!(strcmp($row_rs_linhvuc['MaLinhVuc'], $row_rssach['MaLinhVuc']))) {echo "SELECTED";} ?>><?php echo $row_rs_linhvuc['TenLinhVuc']?></option>
                <?php
} while ($row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc));
  $rows = mysql_num_rows($rs_linhvuc);
  if($rows > 0) {
      mysql_data_seek($rs_linhvuc, 0);
	  $row_rs_linhvuc = mysql_fetch_assoc($rs_linhvuc);
  }
?>
              </select>
                <?php echo $tNGs->displayFieldError("sach", "MaLinhVuc", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaNhom_<?php echo $cnt1; ?>">Nhóm sách:</label></td>
            <td><select name="MaNhom_<?php echo $cnt1; ?>" id="MaNhom_<?php echo $cnt1; ?>" wdg:subtype="DependentDropdown" wdg:type="widget" wdg:recordset="rs_nhomsach" wdg:displayfield="TenNhomSach" wdg:valuefield="MaNhomSach" wdg:fkey="MaLinhVuc" wdg:triggerobject="MaLinhVuc_<?php echo $cnt1; ?>" wdg:selected="<?php echo $row_rssach['MaNhom'] ?>">
                <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
              </select>
                <?php echo $tNGs->displayFieldError("sach", "MaNhom", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cosachmoi_<?php echo $cnt1; ?>">Cờ Sách Mới</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rssach['cosachmoi']),"1"))) {echo "checked";} ?> type="checkbox" name="cosachmoi_<?php echo $cnt1; ?>" id="cosachmoi_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("sach", "cosachmoi", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaTacGia_<?php echo $cnt1; ?>">Tác Giả:</label></td>
            <td><select name="MaTacGia_<?php echo $cnt1; ?>" id="MaTacGia_<?php echo $cnt1; ?>">
                <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                <?php 
do {  
?>
                <option value="<?php echo $row_rs_tacgia['MaTacGia']?>"<?php if (!(strcmp($row_rs_tacgia['MaTacGia'], $row_rssach['MaTacGia']))) {echo "SELECTED";} ?>><?php echo $row_rs_tacgia['TenTacGia']?></option>
                <?php
} while ($row_rs_tacgia = mysql_fetch_assoc($rs_tacgia));
  $rows = mysql_num_rows($rs_tacgia);
  if($rows > 0) {
      mysql_data_seek($rs_tacgia, 0);
	  $row_rs_tacgia = mysql_fetch_assoc($rs_tacgia);
  }
?>
              </select>
                <?php echo $tNGs->displayFieldError("sach", "MaTacGia", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="GiaTien_<?php echo $cnt1; ?>">Giá Tiền:</label></td>
            <td><input type="text" name="GiaTien_<?php echo $cnt1; ?>" id="GiaTien_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssach['GiaTien']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("GiaTien");?> <?php echo $tNGs->displayFieldError("sach", "GiaTien", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="NamXuatBan_<?php echo $cnt1; ?>">Năm Xuất Bản:</label></td>
            <td><input type="text" name="NamXuatBan_<?php echo $cnt1; ?>" id="NamXuatBan_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssach['NamXuatBan']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("NamXuatBan");?> <?php echo $tNGs->displayFieldError("sach", "NamXuatBan", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaNhaXuatBan_<?php echo $cnt1; ?>">Nhà Xuất Bản:</label></td>
            <td><select name="MaNhaXuatBan_<?php echo $cnt1; ?>" id="MaNhaXuatBan_<?php echo $cnt1; ?>">
                <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                <?php 
do {  
?>
                <option value="<?php echo $row_rs_nhaxuatban['MaNhaXuatBan']?>"<?php if (!(strcmp($row_rs_nhaxuatban['MaNhaXuatBan'], $row_rssach['MaNhaXuatBan']))) {echo "SELECTED";} ?>><?php echo $row_rs_nhaxuatban['TenNhaXuatBan']?></option>
                <?php
} while ($row_rs_nhaxuatban = mysql_fetch_assoc($rs_nhaxuatban));
  $rows = mysql_num_rows($rs_nhaxuatban);
  if($rows > 0) {
      mysql_data_seek($rs_nhaxuatban, 0);
	  $row_rs_nhaxuatban = mysql_fetch_assoc($rs_nhaxuatban);
  }
?>
              </select>
                <?php echo $tNGs->displayFieldError("sach", "MaNhaXuatBan", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="LanXuatBan_<?php echo $cnt1; ?>">Lần Xuất Bản:</label></td>
            <td><input type="text" name="LanXuatBan_<?php echo $cnt1; ?>" id="LanXuatBan_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssach['LanXuatBan']); ?>" size="32" maxlength="45" />
                <?php echo $tNGs->displayFieldHint("LanXuatBan");?> <?php echo $tNGs->displayFieldError("sach", "LanXuatBan", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="GhiChu_<?php echo $cnt1; ?>">Ghi Chú:</label></td>
            <td><textarea name="GhiChu_<?php echo $cnt1; ?>" id="GhiChu_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rssach['GhiChu']); ?></textarea>
                <?php echo $tNGs->displayFieldHint("GhiChu");?> <?php echo $tNGs->displayFieldError("sach", "GhiChu", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="MaNgonNgu_<?php echo $cnt1; ?>">Ngôn ngữ:</label></td>
            <td><select name="MaNgonNgu_<?php echo $cnt1; ?>" id="MaNgonNgu_<?php echo $cnt1; ?>">
                <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                <?php 
do {  
?>
                <option value="<?php echo $row_rs_ngonngu['MaNgonNguSach']?>"<?php if (!(strcmp($row_rs_ngonngu['MaNgonNguSach'], $row_rssach['MaNgonNgu']))) {echo "SELECTED";} ?>><?php echo $row_rs_ngonngu['TenNgonNguSach']?></option>
                <?php
} while ($row_rs_ngonngu = mysql_fetch_assoc($rs_ngonngu));
  $rows = mysql_num_rows($rs_ngonngu);
  if($rows > 0) {
      mysql_data_seek($rs_ngonngu, 0);
	  $row_rs_ngonngu = mysql_fetch_assoc($rs_ngonngu);
  }
?>
              </select>
                <?php echo $tNGs->displayFieldError("sach", "MaNgonNgu", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Visible_<?php echo $cnt1; ?>">Visible:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rssach['Visible']),"1"))) {echo "checked";} ?> type="checkbox" name="Visible_<?php echo $cnt1; ?>" id="Visible_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("sach", "Visible", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="SoLuongNap_<?php echo $cnt1; ?>">Số lượng nhập </label></td>
            <td><input type="text" name="SoLuongNap_<?php echo $cnt1; ?>" id="SoLuongNap_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssach['SoLuongNap']); ?>" size="32" />
                <?php echo $tNGs->displayFieldHint("SoLuongNap");?> <?php echo $tNGs->displayFieldError("sach", "SoLuongNap", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="SoSachSuDungDuoc_<?php echo $cnt1; ?>">SoSachSuDungDuoc:</label></td>
            <td><input type="text" name="SoSachSuDungDuoc_<?php echo $cnt1; ?>" id="SoSachSuDungDuoc_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssach['SoSachSuDungDuoc']); ?>" size="32" />
                <?php echo $tNGs->displayFieldHint("SoSachSuDungDuoc");?> <?php echo $tNGs->displayFieldError("sach", "SoSachSuDungDuoc", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th">Ngày cập nhật :</td>
            <td><?php echo KT_escapeAttribute($row_rssach['NgayCapNhat']); ?></td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_sach_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rssach['kt_pk_sach']); ?>" />
        <?php } while ($row_rssach = mysql_fetch_assoc($rssach)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['MasSach'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'MasSach')" />
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
<?php
	echo $tNGs->getErrorMsg();
?></body>
</html>
<?php
mysql_free_result($rs_linhvuc);

mysql_free_result($rs_tacgia);

mysql_free_result($rs_nhomsach);

mysql_free_result($rs_nhaxuatban);

mysql_free_result($rs_ngonngu);

mysql_free_result($rs_phanloaisach);
?>
