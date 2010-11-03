<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
//-->
</script>
<link href="trantri.css" rel="stylesheet" type="text/css" />
</head>

<body onload="MM_preloadImages('images/trangchu1.jpg','images/lienhe1.jpg','images/giaotrinh1.jpg','images/tapchi1.jpg','images/luanvan1.jpg','images/gioithieu1.jpg')">
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><a href="index.php" target="_top" onclick="MM_nbGroup('down','group1','Trangchu','',1)" onmouseover="MM_nbGroup('over','Trangchu','images/trangchu1.jpg','',1)" onmouseout="MM_nbGroup('out')"><img src="images/trangchu.jpg" alt="" name="Trangchu" border="0" id="Trangchu" onload="" /></a></td>
    <td><a href="javascript:;" target="_top" onclick="MM_nbGroup('down','group1','cach1','',1)" onmouseover="MM_nbGroup('over','cach1','','',1)" onmouseout="MM_nbGroup('out')"><img src="images/cach.jpg" alt="" name="cach1" border="0" id="cach1" onload="" /></a></td>
    <td><a href="index.php?mod=gioithieu" target="_top" onclick="MM_nbGroup('down','group1','Gioithieu','',1)" onmouseover="MM_nbGroup('over','Gioithieu','images/gioithieu1.jpg','',1)" onmouseout="MM_nbGroup('out')"><img src="images/gioithieu.jpg" alt="" name="Gioithieu" border="0" id="Gioithieu" onload="" /></a></td>
    <td><a href="javascript:;" target="_top" onclick="MM_nbGroup('down','group1','cach2','',1)" onmouseover="MM_nbGroup('over','cach2','','',1)" onmouseout="MM_nbGroup('out')"><img src="images/cach.jpg" alt="" name="cach2" border="0" id="cach2" onload="" /></a></td>
    <td><a href="index.php?mod=lienhe" target="_top" onclick="MM_nbGroup('down','group1','lienhe','',1)" onmouseover="MM_nbGroup('over','lienhe','images/lienhe1.jpg','',1)" onmouseout="MM_nbGroup('out')"><img src="images/lienhe.jpg" alt="" name="lienhe" border="0" id="lienhe" onload="" /></a></td>
    <td><a href="javascript:;" target="_top" onclick="MM_nbGroup('down','group1','cach3','',1)" onmouseover="MM_nbGroup('over','cach3','','',1)" onmouseout="MM_nbGroup('out')"><img src="images/cach.jpg" alt="" name="cach3" border="0" id="cach3" onload="" /></a></td>
    <td><a href="index.php?mod=sach_tooltip" target="_top" onClick="MM_nbGroup('down','group1','giaotrinh','',1)" onMouseOver="MM_nbGroup('over','giaotrinh','images/giaotrinh1.jpg','',1)" onMouseOut="MM_nbGroup('out')"><img name="giaotrinh" src="images/giaotrinh.jpg" border="0" alt="" onload="" /></a></td>
    <td><a href="javascript:;" target="_top" onclick="MM_nbGroup('down','group1','cach4','',1)" onmouseover="MM_nbGroup('over','cach4','','',1)" onmouseout="MM_nbGroup('out')"><img src="images/cach.jpg" alt="" name="cach4" border="0" id="cach4" onload="" /></a></td>
    <td><a href="index.php?mod=tapchi_tooltip" target="_top" onclick="MM_nbGroup('down','group1','tapchi','',1)" onmouseover="MM_nbGroup('over','tapchi','images/tapchi1.jpg','',1)" onmouseout="MM_nbGroup('out')"><img src="images/tapchi.jpg" alt="" name="tapchi" border="0" id="tapchi" onload="" /></a></td>
    <td><a href="javascript:;" target="_top" onclick="MM_nbGroup('down','group1','cach5','',1)" onmouseover="MM_nbGroup('over','cach5','','',1)" onmouseout="MM_nbGroup('out')"><img src="images/cach.jpg" alt="" name="cach5" border="0" id="cach5" onload="" /></a></td>
    <td><a href="index.php?mod=luanvan_tooltip" target="_top" onclick="MM_nbGroup('down','group1','luanvan','',1)" onmouseover="MM_nbGroup('over','luanvan','images/luanvan1.jpg','',1)" onmouseout="MM_nbGroup('out')"><img src="images/luanvan.jpg" alt="" name="luanvan" border="0" id="luanvan" onload="" /></a></td>
  </tr>
</table>
</body>
</html>
