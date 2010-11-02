<?php
// Require the MXI classes
require_once ('../includes/mxi/MXI.php');

// Include Multiple Static Pages
$mxiObj = new MXI_Includes("mod");
$mxiObj->IncludeStatic("", "admin_default.php", "", "", "");
$mxiObj->IncludeStatic("list_sachthuthu", "list_sach.php", "", "", "");
$mxiObj->IncludeStatic("list_phieumuonthuthu", "list_phieumuon.php", "", "", "");
$mxiObj->IncludeStatic("list_chitietphieumuon", "list_chitietphieumuon.php", "", "", "");
$mxiObj->IncludeStatic("list_thanhvien", "list_thanhvien.php", "", "", "");
$mxiObj->IncludeStatic("list_quequan", "list_quequan.php", "", "", "");
$mxiObj->IncludeStatic("list_khoa", "list_khoa.php", "", "", "");
$mxiObj->IncludeStatic("list_lop", "list_lop.php", "", "", "");
$mxiObj->IncludeStatic("form_thongke", "form_thongke.php", "", "", "");
$mxiObj->IncludeStatic("thongke", "thongke_layout.php", "", "", "");
$mxiObj->IncludeStatic("form_thongkedocgia", "form_thongkedocgia.php", "", "", "");
$mxiObj->IncludeStatic("thongkedocgia", "ketquathongkedocgia_layout.php", "", "", "");
// End Include Multiple Static Pages
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $mxiObj->getTitle(); ?></title>
<link href="../css/theme1.css" rel="stylesheet" type="text/css" />
<meta name="keywords" content="<?php echo $mxiObj->getKeywords(); ?>" />
<meta name="description" content="<?php echo $mxiObj->getDescription(); ?>" />
<base href="<?php echo mxi_getBaseURL(); ?>" />
</head>

<body>
<div id="admincp">
  <div id="banner">
    <?php
  mxi_includes_start("admin_header.php");
  require(basename("admin_header.php"));
  mxi_includes_end();
?>
  </div>
  <div id="menu">
    <?php
  mxi_includes_start("admin_menuthuthu.php");
  require(basename("admin_menuthuthu.php"));
  mxi_includes_end();
?>
   menu 
  </div>
  <div id="content">
    <?php
  $incFileName = $mxiObj->getCurrentInclude();
  if ($incFileName !== null)  {
    mxi_includes_start($incFileName);
    require(basename($incFileName)); // require the page content
    mxi_includes_end();
}










?></div>
  <div id="footer">
    <?php
  mxi_includes_start("admin_footer.php");
  require(basename("admin_footer.php"));
  mxi_includes_end();
?>
  </div>
</div>
</body>
</html>
