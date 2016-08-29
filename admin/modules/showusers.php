<table class='themain' align="center" cellpadding='2' cellspacing='0' width='10%'><tbody><tr><td>
<table width='800' class='themain' border='0' align='center' cellpadding='1' cellspacing='1'>
    <tr>
      <td width='23' align='center' valign='top' class='topp2'><strong>#</strong></td>
      <td width='128' align='center' valign='top' class='topp2'><strong>Name</strong></td>
      <td width='87' align='center' valign='top' class='topp2'><strong>Name</strong></td>
      <td width='60' align='center' valign='top' class='topp2'><strong>Townhall</strong></td>
      <td width='115' align='center' valign='top' class='topp2'><strong>Guild</strong></td>
      <td width='58' align='center' valign='top' class='topp2'><strong>Level</strong></td>
	  <td width='53' align='center' valign='top' class='topp2'><strong>Status</strong></td>
      <td width='125' align='center' valign='top' class='topp2'><strong>Privileges</strong></td>
      <td width='68' align='center' valign='top' class='topp2'><strong>Trophies</strong></td>
      <td width='87' align='center' valign='top' class='topp2'><strong>Gems</strong></td>
      </tr>
<?PHP
$pagina->agregarConsulta("SELECT * FROM `player`");
$pagina->ejecutar();
        $i = 0;
		while($row=$pagina->fetchResultado()){
			
		$playerID = $row['PlayerId'];
		$AccountStatus = $row['AccountStatus'];
		$AccountPrivileges = $row['AccountPrivileges'];
		$LastUpdateTime = $row['LastUpdateTime'];
		
		$avatar = $row["Avatar"];
		$avatarObj = json_decode($row["Avatar"], true);
		
		$ClanId = $avatarObj['alliance_id'];		
		$playerClan=mysql_query("SELECT clan.ClanId, clan.LastUpdateTime, clan.Data FROM clan WHERE clan.ClanId=" . $ClanId."");
        while($playerClanRow = mysql_fetch_array($playerClan)){ 
		
		$clanData = json_decode($playerClanRow['Data'], true);
		$playerclan = $playerClanRow['Data'];
		}
		
		$players[] = array(
			"PlayerId" => $row['PlayerId'],
			"AccountStatus" => $row['AccountStatus'],
			"AccountPrivileges" => $row['AccountPrivileges'],
			"LastUpdateTime" => $row['LastUpdateTime'],
			"avatar" => $avatar,
			"avatarObj" => $avatarObj,
			"playerclan" => $playerclan,
			"clanID" => $clanData['alliance_id'],
			"alliance_name" => $clanData['alliance_name']

		);
	
	}

foreach($players as $player){
	$playername = $player['avatarObj']['avatar_name'];
	$th = $player['avatarObj']['townhall_level'] + 1;
	$sc = $player['avatarObj']['score'];
	$ava_level = $player['avatarObj']['avatar_level'];
	$gems = $player['avatarObj']['current_gems'];
	$alliance_id = $player['avatarObj']['alliance_id'];
	$exp = $player['avatarObj']['experience'];
	$i = $i+1;
//score
$lt=array(0,400,500,600,800,1000,1200,1400,1600,1800,2000,2200,2400,2600,2800,3000,3200,3500,3800,4100,4400,4700,5000,9999);
$lt2=array(399,499,599,799,999,1199,1399,1599,1799,1999,2199,2399,2599,2799,2999,3199,3499,3799,4099,4399,4699,4999,99999);

$legend = count($lt);
for ($x = 0; $x < $legend; $x++)
{
    if (($player ['avatarObj']['score'] >= $lt[$x]) && ($player ['avatarObj']['score'] < $lt2[$x]))
    {
        $y = $x;
        $sx = '<img src="../images/'.$y.'.png" alt="10" width="22" height="19"><br>';
    }
}
//AccountPrivileges
if($player["AccountPrivileges"] == 0){ $player["AccountPrivileges"] ='Normal';
}
if($player["AccountPrivileges"] == 1){ $player["AccountPrivileges"] ='<font color="red"><b>Moderator</b></font>';
}
if($player["AccountPrivileges"] == 2){ $player["AccountPrivileges"] ='<font color="red"><b>High Moderator</b></font>';
}
if($player["AccountPrivileges"] == 3){ $player["AccountPrivileges"] ='<font color="red"><b>Undefined</b></font>';
}
if($player["AccountPrivileges"] == 4){ $player["AccountPrivileges"] ='<font color="red"><b>Administrator</b></font>';
}
if($player["AccountPrivileges"] == 5){ $player["AccountPrivileges"] ='<font color="red"><b>Owner</b></font>';
}
//AccountStatus
if($player["AccountStatus"] == 0){ $player["AccountStatus"] ='Normal';
}
if($player["AccountStatus"] <> 0){ $player["AccountStatus"] ='<font color="red">Banned</font>';
}
//Clan or not?
if($alliance_id == 0){ $alliance_id ='N/A';
}
if($alliance_id <> 0){ $alliance_id ='<a href="../index.php?page_id=guild&id='.$alliance_id.'">'.$player["alliance_name"].'</a>';
}
echo "<tr class='trhover'>
      <td align='center' valign='center'>".$i."</td>
      <td align='center' valign='center'>".$player["PlayerId"]."</td>
      <td align='center' valign='center'><a href='../index.php?page_id=profile&id=".$player["PlayerId"]."'>".$playername."</a></td>
      <td align='center' valign='center'>".$th."</td>
	  <td align='center' valign='center'>".$alliance_id."</td>
	  <td align='center' valign='center'>".$ava_level."</td>
	  <td align='center' valign='center'>".$player["AccountStatus"]."</td>
	  <td align='center' valign='center'>".$player["AccountPrivileges"]."</td>
	  <td align='center' valign='center'>".$sx."".$sc."</td>
	  <td align='center' valign='center'>".$gems."</td>
	  </tr>";
}
?>
</table>
    </table>
<br />
<div align='center' class="pagination"><?php echo 'Paginas '.$pagina->fetchNavegacion(); ?></div>