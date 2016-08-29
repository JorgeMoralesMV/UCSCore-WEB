<?php
if(isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar'){
if(!empty($_POST['catCategoria'])){
$catCategoria = $_POST['catCategoria'];
$sqlInsertCat = mysql_query("INSERT INTO sn_categorias (catCategoria)
VALUES ('$catCategoria')")
or die(mysql_error());
echo "<table class='themain' align='center' cellpadding='2' cellspacing='0' width='54%'><tbody><tr>
  <td>
<table width='100%' class='themain' border='0' align='center' cellpadding='1' cellspacing='1'>
    <tr>
		<td align='center' valign='top' class='topp2'><strong>Message</strong></td>
      </tr>
    <tr class='trhover'>
	  <td align='center' valign='center'>Category successfully added!</td>
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
		<td align='center' valign='top' class='topp2'><strong>New Category</strong></td>
      </tr>
    <tr class='trhover'>
	  <td align='center' valign='center'><form name="categoria" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<br />
<input type="text" name="catCategoria" />
<input type="submit" name="enviar" value="Enviar" />
</p>
</form></td>
      </tr>
    </table>
</table>