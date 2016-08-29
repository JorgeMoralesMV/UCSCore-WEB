<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Black List</h3>
  </div>
  <div class="panel-body">
 <table class='table table-striped table-hover' align='center' cellpadding='2' cellspacing='0' width='54%'>
<thead>
    <tr>
      <th width='53' align='center' valign='top' class='topp2'><strong>#</strong></th>
      <th width='426' align='center' valign='top' class='topp2'><strong>Liga</strong></th>
      <th width='321' align='center' valign='top' class='topp2'>Nivel</th>
      <th width='321' align='center' valign='top' class='topp2'>Name</th>
      <th width='321' align='center' valign='top' class='topp2'><strong>Level</strong></th>
	  <th width='321' align='center' valign='top' class='topp2'><strong>LatestUpdate</strong></th>
      <th width='146' align='center' valign='top' class='topp2'><strong><?php echo text_ranking_trophies; ?></strong></th>
    </tr>
       </thead>
  <tbody>
<?PHP
$sql=mysql_query("SELECT * FROM `player` WHERE AccountStatus <> 0");
//cambiar nombre de la tabla de busqueda
        $i = 0;
        while($row = mysql_fetch_array($sql)){ 
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
	echo"
    <tr>
	  <td align='center'><div id='caja'>".$i."</div></td>
	  <td align='center' valign='bottom'>".$sx."</td>
	  <td align='center'><div id='cajalvl'>".$ava_level."</div></td>
      <td align='center'><a href='index.php?page_id=profile&id=".$player["PlayerId"]."'>".$playername."</a></td>
      <td align='center'>".$player["AccountPrivileges"]."</td>
	  <td align='center'>".$player["LastUpdateTime"]."</td>
	  <td align='center'><div id='trophy'>".$sc."<span class='badgetrophy'></span></div></td>
    </tr>";
	}
?>
  </tbody>
</table> 
</div>
</div>