<?php require_once('Connections/conn_project.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make unified connection variable
$conn_conn_project = new KT_connection($conn_project, $database_conn_project);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("kt_login_user", true, "text", "", "", "", "");
$formValidation->addField("kt_login_password", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make a login transaction instance
$loginTransaction = new tNG_login($conn_conn_project);
$tNGs->addTransaction($loginTransaction);
// Register triggers
$loginTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "kt_login1");
$loginTransaction->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$loginTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
// Add columns
$loginTransaction->addColumn("kt_login_user", "STRING_TYPE", "POST", "kt_login_user");
$loginTransaction->addColumn("kt_login_password", "STRING_TYPE", "POST", "kt_login_password");
$loginTransaction->addColumn("kt_login_rememberme", "CHECKBOX_1_0_TYPE", "POST", "kt_login_rememberme", "0");
// End of login transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	echo $tNGs->getLoginMsg();
?>
<form method="post" id="form1" class="KT_tngformerror" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
  <?php 
// Show IF Conditional region1 
if (@$_SESSION['kt_login_id'] == "") {
?>
    <div id="thanhvien">
      <div id="thanhvien_top">THÀNH VIÊN</div>
      <div id="thanhvien_cen">
        <label for="kt_login_user">Username:</label>
        <div class="div_texbox">
          <input type="text" name="kt_login_user" class="username" id="kt_login_user" value="<?php echo KT_escapeAttribute($row_rscustom['kt_login_user']); ?>" size="20" />
          <?php echo $tNGs->displayFieldHint("kt_login_user");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_user"); ?> </div>
        <label for="kt_login_password">Password:</label>
        <div class="div_texbox">
          <input type="password" name="kt_login_password" class="password" id="kt_login_password" value="" size="20" />
          <?php echo $tNGs->displayFieldHint("kt_login_password");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_password"); ?> </div>
        <label for="kt_login_rememberme"></label>
        <div class="div_texbox">
          <input  <?php if (!(strcmp(KT_escapeAttribute($row_rscustom['kt_login_rememberme']),"1"))) {echo "checked";} ?> type="checkbox" name="kt_login_rememberme" id="kt_login_rememberme" value="1" />
          <?php echo $tNGs->displayFieldError("custom", "kt_login_rememberme"); ?> Nhớ thông tin </div>
        <div class="div_texbox">
          <input name="kt_login1" type="submit" class="button" id="kt_login1" value="Đăng nhập" />
          <br />
        <a href="index.php?mod=quenmatkhau">Quên mật khẩu</a> </div>
      </div>
      <div id="thanhvien_bottom"></div>
    </div>
    <?php } 
// endif Conditional region1
?></form>

</body>
</html>
