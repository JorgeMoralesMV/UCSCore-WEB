<?PHP
$sql1=mysql_query("SELECT * FROM `clan`");
//cambiar nombre de la tabla de busqueda
        $i = 0;
        while($row = mysql_fetch_array($sql1)){ 
		$ClanId = $row['ClanId'];
		$LastUpdateTime = $row['LastUpdateTime'];
		
		$data = $row["Data"];
		$dataObj = json_decode($row["Data"], true);
		
		$clans1[] = array(
			"ClanId" => $row['ClanId'],
			"LastUpdateTime" => $row['LastUpdateTime'],
			"data" => $data,
			"dataObj" => $dataObj,
		);
	}
    foreach (@(array) $clans1 as $clan1) {
	$clanname = $clan1['dataObj']['alliance_name'];
	$i = $i+1;
	}
	echo"<div class='panel panel-primary'>
  <div class='panel-heading'>
    <h3 class='panel-title'>Ranking Players</h3>
  </div>
  <div class='panel-body'>"; 
  
// comprobamos que se haya iniciado la sesión
if(isset($_POST["Search"])){
	$Search = $_POST["Search"];
	
$sql=mysql_query("SELECT * FROM clan WHERE ClanId='".$clanname."' LIKE '%".$_POST['Search']."%'") or die ('Database name is not available!');//cambiar nombre de la tabla de busqueda
        while($row = mysql_fetch_array($sql)){ 
		$ClanId = $row['ClanId'];
		$LastUpdateTime = $row['LastUpdateTime'];
		
		$data = $row["Data"];
		$dataObj = json_decode($row["Data"], true);
	
		$clans[] = array(
			"ClanId" => $row['ClanId'],
			"LastUpdateTime" => $row['LastUpdateTime'],
			"data" => $data,
			"dataObj" => $dataObj,
		);
	}
    foreach (@(array) $clans as $clan) {
	$clanname = $clan['dataObj']['alliance_name'];
	$sc = $clan['dataObj']['score'];
	$reqsc = $clan['dataObj']['required_score'];
	$desc = $clan['dataObj']['description'];
	$war_frec = $clan['dataObj']['war_frequency'];
	$wowars = $clan['dataObj']['won_wars'];
	$lowars = $clan['dataObj']['lost_wars'];
	$drwars = $clan['dataObj']['draw_wars'];
	$alliance_typ = $clan['dataObj']['alliance_type'];
	$alliorigin = $clan['dataObj']['alliance_origin'];
	$alliexp = $clan['dataObj']['alliance_experience'];
	$allilvl = $clan['dataObj']['alliance_level'];
	$golds = $clan['dataObj']['members'];

echo "
<table width='700' height='203' border='0' align='center' cellpadding='1' cellspacing='1' class='themain'>
  <tr>
    <td colspan='2' class='topp2'>Player: ".$clanname."</td>
  </tr>
  <tr class='trhover'>
    <td width='164' height='129' rowspan='4'></td>
    <td width='529'></td>
  </tr>
  <tr class='trhover'>
    <td></td>
  </tr>
  <tr class='trhover'>
    <td></td>
  </tr>
  <tr class='trhover'>
    <td height='43'><a href='index.php?page_id=guild&id=".$clan["ClanId"]."'>Go to profile</a></td>
  </tr>
  <tr class='trhover'></tr>
</table>
";//cambiar los nombres de los campos de busqueda
                }
    }else {
		"No existe";
?>
<table class="themain" align="center" cellpadding="2" cellspacing="0" width="10%">
<table width="700" class="themain" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td colspan="2" class="topp2">Search Clans</td>
  </tr>
  <tr class='trhover'>
    <td align='center' valign='center' width="137">Clan Name :</td>
    <form name="form1" method="post" action="index.php?page_id=searchClan">
    <td align='left' valign='center' width="408">    <input name="Search" type="text" id="Search">
  <input type="submit" value="Search"/></td>
  </form>
  </tr>
  <tr class='trhover'>
    <td align='center' valign='center' colspan="2">Nothing to search for a specific user, you must put your Player ID</td>
  </tr>
</table>
</table>
<?PHP
}
?>
</div>
</div>
