<?PHP
require('../engine/version/global_functions.php');
require('../engine/version/core.php');
require ('../config.php');
    require_once("../engine/PHPPaging.lib.php");
    $pagina = new PHPPaging;

$core['version'] = crypt_it($engine,'','1'); 
    session_start();
    if(isset($_GET[@logout])){
        session_unset();
    }
    require_once('funciones.php');
	    if(logged()){
			echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="images/script/global.js"></script>
<script type="text/javascript" src="images/script/helptip.js"></script>
<script type="text/javascript" src="http://servimotosmova.hostei.com/corecocweb/version.js"></script>
<link rel="stylesheet" type="text/css" href="images/styles/style.css" />
<script type="text/javascript">
var engine_current_version = \''.$core['version'].'\';
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>COCWeb Admin panel -</title>
</head>
<body>
<table class="themain" align="center" cellpadding="2" cellspacing="0" width="70%"><tbody><tr>
  <td>
<table width="100%" height="292" border="1" align="center">
  <tr>
    <td class="trhover" align="center" height="67" colspan="2"><img src="images/logoc.png"></td>
    <td class="trhover" width="750" height="67" align="right"><br>Version: '. $core['version'] .' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?logout">Logout</a></td>
  </tr>
  <tr>
    <td class="trhover" width="204" valign="top">
	<table class="themain" width="171" border="1">
      <tr>
        <td class="topp2">Menu</td>
        </tr>
      <tr>
        <td class="trhover" ><a href="index.php">Inicio</a></td>
      </tr>
    </table>
	<br />
	<table class="themain" width="171" border="1">
      <tr>
        <td class="topp2">Players Server</td>
        </tr>
      <tr>
        <td class="trhover"><a href="index.php?page_id=showusers">Players</a></td>
      </tr>
    </table>
	<br />
	<table class="themain" width="171" border="1">
      <tr>
        <td class="topp2">Noticias</td>
        </tr>
      <tr>
        <td class="trhover"><a href="index.php?page_id=add-categoria">Add Category</a></td>
        </tr>
      <tr>
        <td class="trhover"><a href="index.php?page_id=add-noticia">Add News</a></td>
        </tr>
    </table>
	<br />
	<p>&nbsp;</p></td>
    <td class="trhover" colspan="2" align="left" valign="top">'; }
    
    if(logged()){
if(empty($_GET['page_id'])) { 
 include("modules/news.php"); 
 } else { 
 if(file_exists("modules/".$_GET['page_id'].".php")) { 
 include("modules/".basename($_GET['page_id']).".php"); 
 } else { 
 ;
 }
 }
		    if(logged()){
       echo '
    	<table border=0 cellpadding=0 cellspacing=0> 
 </table>
 </td>
  </tr>
  <tr>
    <td class="trhover" valign="top">&nbsp;</td>
    <td class="trhover" colspan="2" align="center" valign="top">Copyright © 2014 - 2016. All rights reserved. - By J0RG325</td>
  </tr>
</table>
  </table>
</body>
</html>';}
    }else{
        include("login.php");
        show_form();
    }
?>