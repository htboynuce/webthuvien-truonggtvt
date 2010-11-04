<?php require_once('Connections/conn_project.php'); ?>
<?php
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
$query_rs_lienketwebsite = "SELECT MaLienhe, TenWebsite, Link FROM lienhewebsite WHERE Visible = 1 ORDER BY TenWebsite ASC";
$rs_lienketwebsite = mysql_query($query_rs_lienketwebsite, $conn_project) or die(mysql_error());
$row_rs_lienketwebsite = mysql_fetch_assoc($rs_lienketwebsite);
$totalRows_rs_lienketwebsite = mysql_num_rows($rs_lienketwebsite);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="lienhewebsite">
<div id="lienhewebsite_top">LIÊN HỆ WEBSITE KHÁC</div>
<div id="lienhewebsite_cen">
   <script language="javascript">
   function ClickToUrl()
   {
      var http=document.formURL.lienket.value;
	  if(http != "")
	  window.open(document.formURL.lienket.value);
	  
   }
   </script>
<form name="formURL" id="form">
  <select name="lienket" id="jumpMenu" onchange="ClickToUrl()">
    <?php
do {  
?>
    <option value="<?php echo $row_rs_lienketwebsite['Link']?>"><?php echo $row_rs_lienketwebsite['TenWebsite']?></option>
    <?php
} while ($row_rs_lienketwebsite = mysql_fetch_assoc($rs_lienketwebsite));
  $rows = mysql_num_rows($rs_lienketwebsite);
  if($rows > 0) {
      mysql_data_seek($rs_lienketwebsite, 0);
	  $row_rs_lienketwebsite = mysql_fetch_assoc($rs_lienketwebsite);
  }
?>
  </select>
</form>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($rs_lienketwebsite);
?>
