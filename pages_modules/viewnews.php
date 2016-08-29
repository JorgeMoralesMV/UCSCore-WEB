<?PHP
$sql=mysql_query("SELECT * FROM sn_noticias WHERE not_ID=".$_GET['id']."");
        while($row = mysql_fetch_array($sql)){ 
		$not_ID = $row['not_ID'];
		$notTitulo = $row['notTitulo'];
		$notTexto = $row['notTexto'];
		$notCategoriaID = $row['notCategoriaID'];
		}
		echo"
        <table class='themain' align='center' cellpadding='2' cellspacing='0' width='54%'><tbody><tr>
  <td>
<table width='100%' class='themain' border='0' align='center' cellpadding='1' cellspacing='1'>
    <tr>
          <td colspan='2' align='center' valign='top' class='topp2'><strong>".$notTitulo."</strong></td>
      </tr>
    <tr class='trhover'>
	  <td width='34' align='center' valign='center'><img src='images/announcement.gif' alt='' width='25' height='25' border='0'></td>
      <td width='593' align='left' valign='center'>".$notTexto."</td>
      </tr>
    </table>
</table>";
?>