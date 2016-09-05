<?PHP
    include 'config.php';
	include 'engine/functions.php';
    require('engine/version/global_functions.php');
    require('engine/version/core.php');
    require_once("engine/PHPPaging.lib.php");
    require ("language_config.php"); 
    $pagina = new PHPPaging;

$core['version'] = crypt_it($engine,'','1'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$myservername;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css">   
    <link rel="icon" type="image/x-icon" href="images/ClashFavicon.ico">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#open').click(function(){
		$('#popup').fadeIn('slow');
		$('.popup-overlay').fadeIn('slow');
		$('.popup-overlay').height($(window).height());
		return false;
	});
	
	$('#close').click(function(){
		$('#popup').fadeOut('slow');
		$('.popup-overlay').fadeOut('slow');
		return false;
	});
});
</script>
<style>
#content {
    width: 900px;
    margin: 0px auto;
    padding: 2em 1em;
}

#header {
	background-color: #EBE9EA;
    border: 1px solid #D2D2D2;
    border-radius: 8px 8px 8px 8px;
    margin-bottom: 10px;
    text-align: center;
    width: 900px;
    min-height: 150px;
}

#column-right {
	background-color: #EBE9EA;
    border: 1px solid #D2D2D2;
    border-radius: 8px 8px 8px 8px;
    float: right;
    min-height: 225px;
    margin-bottom: 10px;
    overflow: hidden;
    text-align: center;
    width: 180px;
	padding-top:10px;
}

#central {
	background-color: #EBE9EA;
    border: 1px solid #D2D2D2;
    border-radius: 8px 8px 8px 8px;
    float: left;
    min-height: 225px;
    margin-bottom: 10px;
    margin-right: 10px;
    width: 685px;
	padding:10px;
}

#footer {
	background-color: #EBE9EA;
    border: 1px solid #D2D2D2;
    border-radius: 8px 8px 8px 8px;
    margin-top: 10px;
    text-align: center;
    clear: left;
    width: 900px;
    min-height: 100px;
}

#popup {
	left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 1001;
}

.content-popup {
	margin:0px auto;
	margin-top:120px;
	position:relative;
	padding:10px;
	width:500px;
	min-height:250px;
	border-radius:4px;
	background-color:#FFFFFF;
	box-shadow: 0 2px 5px #666666;
}

.content-popup h2 {
	color:#48484B;
	border-bottom: 1px solid #48484B;
    margin-top: 0;
    padding-bottom: 4px;
}

.popup-overlay {
	left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 999;
	display:none;
	background-color: #777777;
    cursor: pointer;
    opacity: 0.7;
}

.close {
	position: absolute;
    right: 15px;
}
</style>
</head>
<body onLoad="ini();">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/s.png" alt=""  border="0"></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li><a href="index.php?page_id=ranking">Ranking</a></li>
        <li><a href="index.php?page_id=guilds"><?php echo text_menu_guilds; ?></a></li>
        <li><a href="index.php?page_id=downloads"><?php echo text_menu_downloads; ?></a></li>
        <li><a href="index.php?page_id=blacklist"><?php echo text_menu_blacklist; ?></a></li>
        <li><a href="index.php?page_id=statistics"><?php echo text_menu_statistics; ?></a></li>
        <li><a href="index.php?page_id=playersonline"><?php echo text_menu_conected; ?></a></li>
        <li><a href="index.php?page_id=gamemasters"><?php echo text_menu_gamemasters; ?></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
             <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Language<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?lang=en" title="English">English</a></li>
            <li><a href="index.php?lang=es" title="Spanish">Spanish</a></li>
        </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
      <div class="container">
<div class="jumbotron">
<?php
if(empty($_GET['page_id'])) { 
	include("pages_modules/ranking.php"); 
} else {
	switch ($_GET['dir']) {
    case 'ucp':
        $dir = "pages_modules/adminnews/".$_GET['page_id'].".php";
        $file = "pages_modules/adminnews/".basename($_GET['page_id']).".php";
        break;
    default:
		$dir = "pages_modules/".$_GET['page_id'].".php";
		$file = "pages_modules/".basename($_GET['page_id']).".php";
        break;
	}
	if(file_exists($dir)) { 
		include($file); 
	} else { 
		echo '<table border=0 cellpadding=0 cellspacing=0> 
		<tr> 
		<td width=85%>'.text_site_module.'</td> 
		</tr> 
		</table>'; 
	} 
} 
?></p>
</div>
</div>
<div align="center" class="panel-footer">
<?PHP
echo '<b>COCWeb™ Version '. $core['version'] .'</b>'; ?>
</br>
<?php echo text_site_copyrigth; ?> <?=$myservername;?><br />Code with love by JorgeMoralesMV
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="css/bootstrap.min.js"></script>
    <script src="css/custom.js"></script>
  <script type="text/javascript">/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>
  </div>
  </body>
</html>
