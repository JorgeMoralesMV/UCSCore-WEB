<?PHP
if(isset($_GET['id']) && $_GET['categoria']){
    $cat_ID = $_GET['id'];
    $categoria = $_GET['categoria'];
    $titulo = "Noticias en la categoria $categoria";
}else{
}	
$pagina->agregarConsulta("SELECT * FROM sn_noticias order by not_ID desc");
$pagina->ejecutar();
while($rowNot=$pagina->fetchResultado()){
	echo "<table class='themain' align='center' cellpadding='2' cellspacing='0' width='54%'><tbody><tr>
  <td>
<table width='100%' class='themain' border='0' align='center' cellpadding='1' cellspacing='1'>
    <tr>
          <td colspan='2' align='center' valign='top' class='topp2'><strong>$rowNot[notTitulo]</strong></td>
      </tr>";
	echo "
	<tr class='trhover'>
	  <td width='52' rowspan='3' align='center' valign='center'><img src='images/announcement2.gif' alt='' width='20' height='20' border='0'></td>
	  </tr>
	  	<tr class='trhover'>
	  <td align='left' valign='center'>".nl2br (substr(($rowNot['notTexto']),0,100))."...</td>
	  </tr>
	<tr class='trhover'>
	  <td align='left' valign='center'><a href=\"index.php?page_id=viewnews&id=".$rowNot['not_ID']."\">Read more...</a></td>
	  </tr>
    </table>
</table></br>";
}
?>
<div align='center' class="pagination"><?php echo 'Paginas '.$pagina->fetchNavegacion(); ?></div>