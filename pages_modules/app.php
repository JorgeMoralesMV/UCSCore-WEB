<?php
# Funcion para buscar en Google con Json
function buscar($aQue){
$aUrl = "http://ajax.googleapis.com/ajax/services/search/web";
 
 		$avatar = $row["Avatar"];
		$avatarObj = json_decode($row["Avatar"], true);
		$obj = json_decode($row["Avatar"], true); // Decodificamos el Json
$results = $obj->responseData->results; // Entramos al array de los resultados
# Hacemos un bucle para obtener los 4 resultados que muestra
for ($i=0; $i<sizeof($results); $i++) {
	$tmp = $results[$i]; 
	$tmpHTML.= "<a href=\"".$tmp->url."\">".$tmp->title."</a>";
	$tmpHTML.= "<br />".$tmp->content."<br/>";
	$tmpHTML.= "<i>".$tmp->url."</i><br /><br />";
}
echo utf8_decode($tmpHTML); // Imprimimos los 4 resultados y le correjimos los acentos con utf8
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>JSON con PHP</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="search">
<form method="get" action="">
Buscador JSON 
<input type="text" id="q" name="q" value="<?php if(isset($_GET['q'])){ echo $_GET['q']; }?>" /> 
<input type="submit" id="bt" name="bt" value="Buscar" />
</form>
</div>
<div id="results">
<?php
if($_GET['q'])
{
buscar($_GET['q']);
}
?>
</div>
</body>
</html>
