<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo text_playersonline_status_title; ?></h3>
  </div>
  <div class="panel-body">
  <table class='themain' align="center" cellpadding='2' cellspacing='0' width='54%'>
  <thead>
    <tr>
<?PHP
$date = "'".date("Y-m-d H:m:s")."'"; // getting date
$date1 = "'".date('Y-m-d H:m:s', strtotime('-60 minutes'))."'"; // Calculating online players  Check database time
$accounts = mysql_query("SELECT count(*) FROM player");
$totalacc = mysql_fetch_row($accounts);
$gm = mysql_query("SELECT * FROM player WHERE AccountPrivileges='5'");
$gms = mysql_num_rows($gm);
$gmon = mysql_fetch_array($gm);
$gmonline = mysql_query("SELECT * FROM player WHERE AccountPrivileges = 5 AND LastUpdateTime BETWEEN ".$date1." AND ".$date."");
$gmsonline = mysql_num_rows($gmonline);
//Moderators 5 <
$mo = mysql_query("SELECT * FROM player WHERE AccountPrivileges > 0 AND AccountPrivileges < 5");
$mos = mysql_num_rows($mo);
$moon = mysql_fetch_array($mo);
$moonline = mysql_query("SELECT * FROM player WHERE AccountPrivileges > 0 AND AccountPrivileges < 5 AND LastUpdateTime BETWEEN ".$date1." AND ".$date."");
$mosonline = mysql_num_rows($moonline);
$load = substr(100 * $online / 150, 0, 5);
?>
      <th width='202' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_administrators; ?></strong></th>
      <th width='230' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_gamemasters; ?></strong></th>
      <th width='190' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_players; ?></strong></th>
       </thead>
  <tbody>
    <tr>
	  <td align='center' valign='center'><?=$gmsonline;?>/<span style='color:#F00;'><?=$gms;?></span></td>
      <td align='center' valign='center'><?=$mosonline;?>/<span style='color:#F00;'><?=$mos;?></span></td>
      <td align='center' valign='center'><?=$online;?>/<span style='color:#F00;'><?=$totalacc[0];?></span></td>
	  </tr>
  </tbody>
</table> 
</div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo text_playersonline_online_title; ?></h3>
  </div>
  <div class="panel-body">
<table class='table table-striped table-hover' align="center" cellpadding='2' cellspacing='0' width='54%'>
<thead>
    <tr>
      <th width='42' align='center' valign='top' class='topp2'><strong>#</strong></th>
      <th width='69' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_lague; ?></strong></th>
      <th width='60' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_level; ?></strong></th>
      <th width='91' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_name; ?></strong></th>
      <th width='109' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_experience; ?></strong></th>
	  <th width='54' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_status; ?></strong></th>
      <th width='130' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_accountprivileges; ?></strong></th>
      <th width='85' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_gems; ?></strong></th>
      <th width='146' align='center' valign='top' class='topp2'><strong><?php echo text_playersonline_trophies; ?></strong></th>
      </tr>
       </thead>
  <tbody>
<?PHP	
$pagina->agregarConsulta("SELECT * FROM `player` WHERE LastUpdateTime BETWEEN ".$date1." AND ".$date."");
$pagina->ejecutar();
        $i = 0;
		while($row=$pagina->fetchResultado()){		
		
		$playerID = $row['PlayerId'];
		$AccountStatus = $row['AccountStatus'];
		$AccountPrivileges = $row['AccountPrivileges'];
		$LastUpdateTime = $row['LastUpdateTime'];
		
		$avatar = $row["Avatar"];
		$avatarObj = json_decode($row["Avatar"], true);
		
		$players[] = array(
			"PlayerId" => $row['PlayerId'],
			"AccountStatus" => $row['AccountStatus'],
			"AccountPrivileges" => $row['AccountPrivileges'],
			"LastUpdateTime" => $row['LastUpdateTime'],
			"avatar" => $avatar,
			"avatarObj" => $avatarObj,
		);
	}
	foreach (@(array) $players as $player) {
	$playername = $player['avatarObj']['avatar_name'];
	$th = $player['avatarObj']['townhall_level'] + 1;
	$sc = $player['avatarObj']['score'];
	$ava_level = $player['avatarObj']['avatar_level'];
	$gems = $player['avatarObj']['current_gems'];
	$exp = $player['avatarObj']['experience'];
	$i = $i+1;
	{
  echo $val;
}
//Score
$lt=array(0,400,500,600,800,1000,1200,1400,1600,1800,2000,2200,2400,2600,2800,3000,3200,3500,3800,4100,4400,4700,5000,9999);
$lt2=array(399,499,599,799,999,1199,1399,1599,1799,1999,2199,2399,2599,2799,2999,3199,3499,3799,4099,4399,4699,4999,99999);

$legend = count($lt);
for ($x = 0; $x < $legend; $x++)
{
    if (($player ['avatarObj']['score'] >= $lt[$x]) && ($player ['avatarObj']['score'] < $lt2[$x]))
    {
        $y = $x;
        $sx = '<img src="images/'.$y.'.png" alt="10" width="42" height="42"><br>';
    }
}
//AccountPrivileges
if($player["AccountPrivileges"] == 0){ $player["AccountPrivileges"] ='Player';
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
	echo"
    <tr>
      <td align='center'><div id='caja'>".$i."</div></td>
	  <td align='center' valign='bottom'>".$sx."</td>
	  <td align='center'><div id='cajalvl'>".$ava_level."</div></td>
	  <td align='center' valign='bottom'><a href='index.php?page_id=profile&id=".$player['PlayerId']."'>".$playername."</a></br>".$alliance_id."</td>
	  <td align='center' valign='bottom'>".$exp."</td>
	  <td align='center' valign='bottom'>".$player["AccountStatus"]."</td>
	  <td align='center' valign='bottom'>".$player["AccountPrivileges"]."</td>
	  <td align='center'><div id='gems'>".$gems."<span class='badgegems'></span></div></td>
	  <td align='center'><div id='trophy'>".$sc."<span class='badgetrophy'></span></div></td>
    </tr>";
	}
?>
  </tbody>
</table> 
</div>
</div>
<br />
<div align='center' class="pagination"><?php echo 'Paginas '.$pagina->fetchNavegacion(); ?></div>