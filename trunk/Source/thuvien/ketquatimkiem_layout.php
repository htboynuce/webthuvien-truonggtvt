<?php
// Require the MXI classes
require_once ('includes/mxi/MXI.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="ketquatimkiemlayout">
  <div id="ketquatimkiemlayout_top">KẾT QUẢ TÌM KIẾM</div>
  <div id="ketquatimkiemlayout_cen">
    <?php
  mxi_includes_start("ketquatimkiem1khoa.php");
  require(basename("ketquatimkiem1khoa.php"));
  mxi_includes_end();
?>
  <?php
  mxi_includes_start("ketquatimkiem2khoa.php");
  require(basename("ketquatimkiem2khoa.php"));
  mxi_includes_end();
?>
  <?php
  mxi_includes_start("ketquatimkiem3khoa.php");
  require(basename("ketquatimkiem3khoa.php"));
  mxi_includes_end();
?>
</div>
</div>
</body>
</html>
