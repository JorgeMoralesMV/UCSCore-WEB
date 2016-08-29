<?PHP
if(isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar'){
// comprobamos que el formulario no envie campos vacios
if(!empty($_POST['notTitulo']) && !empty($_POST['notTexto']) && !empty($_POST['notCategoriaID'])){  
        $notTitulo = $_POST['notTitulo'];
        $notTexto = $_POST['notTexto'];
        $notCategoriaID = $_POST['notCategoriaID'];
        $sqlInsertNot = mysql_query("INSERT INTO sn_noticias
                                     (notTitulo, notTexto, notCategoriaID)
                                     VALUES ('$notTitulo', '$notTexto', '$notCategoriaID')")
or die(mysql_error());
        echo "<table class='themain' align='center' cellpadding='2' cellspacing='0' width='54%'><tbody><tr>
  <td>
<table width='100%' class='themain' border='0' align='center' cellpadding='1' cellspacing='1'>
    <tr>
		<td align='center' valign='top' class='topp2'><strong>Message</strong></td>
      </tr>
    <tr class='trhover'>
	  <td align='center' valign='center'>News saved successfully!</td>
      </tr>
    </table>
</table></br>";
    }else{
        echo "<table class='themain' align='center' cellpadding='2' cellspacing='0' width='54%'><tbody><tr>
  <td>
<table width='100%' class='themain' border='0' align='center' cellpadding='1' cellspacing='1'>
    <tr>
		<td align='center' valign='top' class='topp2'><strong>ERROR</strong></td>
      </tr>
    <tr class='trhover'>
	  <td align='center' valign='center'>You must fill out the form</td>
      </tr>
    </table>
</table></br>";
    }
	}
?>
<table class='themain' align='center' cellpadding='2' cellspacing='0' width='54%'><tbody><tr>
  <td>
<table width='100%' class='themain' border='0' align='center' cellpadding='1' cellspacing='1'>
    <tr>
		<td align='center' valign='top' class='topp2'><strong>New Announcement</strong></td>
      </tr>
    <tr class='trhover'>
	  <td align='center' valign='center'><form name="noticia" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
    T&iacute;tulo de la Noticia<br />
    <input type="text" name="notTitulo" size="50" />
    </p>
    <p>
    Texto de la Noticia<br />
    <textarea name="notTexto" rows="20" cols="80"></textarea>
    </p>
    <p>
    Categor&iacute;a<br />
    <select name="notCategoriaID">
        <option value="">Escoger de la Lista</option>
    <?php
    // asignamos una categoria a la noticia
    // mediante un select
    $sqlQueryCat = mysql_query("SELECT * FROM sn_categorias")
                                or die(mysql_error);
    // creamos un bucle while
    // que nos muestre todas las categorias
    // que tenemos guardadas en la BD
    while($rowCat = mysql_fetch_array($sqlQueryCat)){
        echo "<option value='$rowCat[cat_ID]'>$rowCat[catCategoria] - $rowCat[cat_ID]</option>";
    }
    ?>
    </select>
    </p>
    <p>
    <input type="submit" name="enviar" value="Enviar" />
    </p>
</form></td>
      </tr>
    </table>
</table>