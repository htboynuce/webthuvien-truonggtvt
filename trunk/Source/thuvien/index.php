<?php
// Require the MXI classes
require_once ('includes/mxi/MXI.php');

// Include Multiple Static Pages
$mxiObj = new MXI_Includes("mod");
$mxiObj->IncludeStatic("sach_tooltip", "sach_tooltip.php", "", "", "");
$mxiObj->IncludeStatic("chitiet_sach", "chitiet_sach.php", "", "", "");
$mxiObj->IncludeStatic("tapchi_tooltip", "tapchi_tooltip.php", "", "", "");
$mxiObj->IncludeStatic("luanvan_tooltip", "luanvantotnghiep_tooltip.php", "", "", "");
$mxiObj->IncludeStatic("search", "ketquatimkiem_layout.php", "", "", "");
$mxiObj->IncludeStatic("user_cnthongtin", "user_capnhatthongtin.php", "", "", "");
$mxiObj->IncludeStatic("capnhatthongtinthanhcong", "user_capnhatthongtin_thanhcong.php", "", "", "");
$mxiObj->IncludeStatic("quenmatkhau", "forgot_password.php", "", "", "");
$mxiObj->IncludeStatic("gioithieu", "gioithieu.php", "", "", "");
$mxiObj->IncludeStatic("", "index_default.php", "", "", "");
$mxiObj->IncludeStatic("thongtinmuontrasach", "thongtinmuontrasach.php", "", "", "");
$mxiObj->IncludeStatic("lienhe", "lienhe.php", "", "", "");
// End Include Multiple Static Pages
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $mxiObj->getTitle(); ?></title>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_nbGroup(event, grpName) { //v6.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])? args[i+1] : img.MM_up);
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    nbArr = document[grpName];
    if (nbArr)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
      nbArr[nbArr.length] = img;
  } }
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<meta name="keywords" content="<?php echo $mxiObj->getKeywords(); ?>" />
<meta name="description" content="<?php echo $mxiObj->getDescription(); ?>" />
<base href="<?php echo mxi_getBaseURL(); ?>" />
<link href="css/theme1.css" rel="stylesheet" type="text/css" />
</head>

<body onload=" goforit();MM_preloadImages('images/Page 1_r9_c6.jpg','images/gioithieu.jpg','images/Page 1_r9_c21.jpg','images/Page 1_r9_c26.jpg','images/Page 1_r9_c31.jpg','images/Page 1_r9_c39.jpg')" >
<script type="text/javascript" src="javascript/dongho.js"></script>



<div id="homespace">

  <div id="bannerflash">
    <div id="logo_truong"><img src="images/logotruong.jpg" width="707" height="150" /></div>
    <div id="hinhflash">
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','200','height','130','src','images/flashbanner','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','images/flashbanner' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="200" height="130">
        <param name="movie" value="images/flashbanner.swf" />
        <param name="quality" value="high" />
        <embed src="images/flashbanner.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="200" height="130"></embed>
      </object></noscript>
      </div>
  </div>
  <div id="menuchinh">
  <div class="vienmenu"></div>
      <?php
  mxi_includes_start("menuchinh.php");
  require(basename("menuchinh.php"));
  mxi_includes_end();
?>  
</div>
  <div id="bannerwelcome">
    <div id="dongho"><span id="clock"></span></div>
    <div id="dongchu">
      
  </div>
  </div>
<div id="cen">
  <div id="cen_left">
	<?php
  mxi_includes_start("form_search.php");
  require(basename("form_search.php"));
  mxi_includes_end();
?>
   <div id="cen_left1">
      <img src="images/bds9.gif" /><br/><br/>
      <img src="images/bannercntt.jpg" /><br/><br/>
      <img src="images/dtda.jpg" /><br/><br/>
      <img src="images/xnk122.jpg" /><br/><br/>
      <img src="images/toeiconline.jpg" />
      

   </div>
   <div class="clear"></div>
  </div>
    <div id="cen_cen">
    
	<?php
  $incFileName = $mxiObj->getCurrentInclude();
  if ($incFileName !== null)  {
    mxi_includes_start($incFileName);
    require(basename($incFileName)); // require the page content
    mxi_includes_end();
}











?>
 </div>   
     <div id="cen_right">
     
	<?php
  mxi_includes_start("user_login.php");
  require(basename("user_login.php"));
  mxi_includes_end();
?>
 <?php
  mxi_includes_start("user_welcome.php");
  require(basename("user_welcome.php"));
  mxi_includes_end();
?>
<div id="cen_right1">
   <img src="images/tuyensinh.jpg" /><br/><br/> 
</div>

<?php
  mxi_includes_start("sachmoi.php");
  require(basename("sachmoi.php"));
  mxi_includes_end();
?>
<div id="cen_right2"><img src="images/hinhtrenlienhe.jpg" /></div>
<?php
  mxi_includes_start("lienhewebsite.php");
  require(basename("lienhewebsite.php"));
  mxi_includes_end();
?>
</div>
  
  </div>
  <div class="clear"></div>
  <div id="menubottom"></div>
  <div id="footer">
    <div align="center"><br/>Bản quyền thuộc nhóm web trường Đại Học Giao Thông Vận Tải TP HCM
      <br />
    Số 2 đường D3, Văn Thánh Bắc,phường 25,quận Bình Thạnh<br />
Email: phuongnho.thanh@gmail.com<br />
Sđt: 01658250466</div>
  </div>
  
</div>
</body>
</html>
