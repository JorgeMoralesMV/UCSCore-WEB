<?php
// varificamos que el formulario halla sido enviado
if(isset($_POST['buscar']) && $_POST['buscar'] == 'Buscar'){
    $frase = addslashes($_POST['frase']);
    // hacemos la consulta de busqueda	
	$sql=mysql_query("SELECT * FROM player");
    while($row = mysql_fetch_array($sql)){ 
	$playerID = $row['PlayerId'];
		
	$avatar = $row["Avatar"];
	$avatarObj = json_decode($row["Avatar"], true);
	
	$PlayerId = $avatarObj['avatar_name'];		
	$sqlBuscar=mysql_query("SELECT * FROM player WHERE player.PlayerId=".$PlayerId."") or die(mysql_error());
	$totalRows = mysql_num_rows($sqlBuscar);

    // Enviamos un mensaje
    // indicando la cantidad de resultados ($totalRows)
    // para la frase busada ($frase)
    if(!empty($totalRows)){
        echo stripslashes("<p>Su b&uacute;squeda arroj&oacute; <strong>$totalRows</strong> resultados para <strong>$frase</strong></p>");        
        // mostramos los resultados
        while($row = mysql_fetch_array($sqlBuscar)){
        echo "".$playername."";
	    //echo "<p>".substr(strip_tags($codcarrera), 0, 255)."...</p>";
        }
    }
    // si se ha enviado vacio el formulario
    // mostramos un mensaje del tipo Oops...!
    elseif(empty($_POST['frase'])){
        echo "Debe introducir una palabra o frase. <a href='javascript:history.back();'>Reintentar</a>";
    }
    // si no hay resultados
    // otro mensaje del tipo Oops...!
    elseif($totalRows == 0){
        echo stripslashes("Su busqueda no arrojo resultados para <strong>$frase</strong>. <a href='javascript:history.back();'>Reintentar</a>");
    }
		}
}
?>