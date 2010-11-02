<?php
// Require the MXI classes
require_once ('../includes/mxi/MXI.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="ketquathongke_docgia">
    <div id="ketquathongke_docgia_top">KẾT QUẢ THỐNG KÊ ĐỘC GIẢ</div>
    <div id="ketquathongke_docgia_layout_cen">
      <?php
  mxi_includes_start("ketquathongke_docgia.php");
  require(basename("ketquathongke_docgia.php"));
  mxi_includes_end();
?>
<?php
  mxi_includes_start("ketquathongke_docgia_all.php");
  require(basename("ketquathongke_docgia_all.php"));
  mxi_includes_end();
?>
</div>
    
   
</div>
</body>
</html>

