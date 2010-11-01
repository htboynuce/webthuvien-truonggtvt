<?php
// Require the MXI classes
require_once ('../includes/mxi/MXI.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="ketquathongke_layout">
   <div id="ketquathongke_layout_top">KẾT QUẢ THỐNG KÊ</div>
   <div id="ketquathongke_layout_cen">
     <?php
  mxi_includes_start("ketquathongke1.php");
  require(basename("ketquathongke1.php"));
  mxi_includes_end();
?>
<?php
  mxi_includes_start("ketquathongke2.php");
  require(basename("ketquathongke2.php"));
  mxi_includes_end();
?>
  <?php
  mxi_includes_start("ketquathongke3.php");
  require(basename("ketquathongke3.php"));
  mxi_includes_end();
?>
  <?php
  mxi_includes_start("ketquathongke4.php");
  require(basename("ketquathongke4.php"));
  mxi_includes_end();
?>
</div>
</div>
</body>

</html>
