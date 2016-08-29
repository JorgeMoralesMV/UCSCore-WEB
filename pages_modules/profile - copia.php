<?PHP
$sql=mysql_query("SELECT * FROM player WHERE PlayerId=".$_GET['id']."");
        while($row = mysql_fetch_array($sql)){ 
		$playerID = $row['PlayerId'];
		$AccountStatus = $row['AccountStatus'];
		$AccountPrivileges = $row['AccountPrivileges'];
		$LastUpdateTime = $row['LastUpdateTime'];
		
		$avatar = $row["Avatar"];
		$avatarObj = json_decode($row["Avatar"], true);
		$gameobjects = $row["GameObjects"];
		$gameobjectsObj = json_decode($row["GameObjects"], true);
		
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
			"gameobjects" => $gameobjects,
			"playerclan" => @$playerclan,
			"clanID" => @$clanData['alliance_id'],
			"alliance_name" => @$clanData['alliance_name'],
			"description" => @$clanData['description']

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

    $avatar2 = $row["Avatar"];
	$avatarObj2 = json_decode($row["Avatar"], true);

		$global_id[] = array(
			"avatar2" => $avatar2,
			"avatarObj2" => $avatarObj2,

		);
	}
foreach($global_id as $player2){
	$golds = $player2['3000001']['value'];
	
//townhall
if($th == 1){ $th ='<img src="images/townhall/'.$th.'.png" alt="1" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 2){ $th ='<img src="images/townhall/'.$th.'.png" alt="2" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 3){ $th ='<img src="images/townhall/'.$th.'.png" alt="3" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 4){ $th ='<img src="images/townhall/'.$th.'.png" alt="4" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 5){ $th ='<img src="images/townhall/'.$th.'.png" alt="5" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 6){ $th ='<img src="images/townhall/'.$th.'.png" alt="6" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 7){ $th ='<img src="images/townhall/'.$th.'.png" alt="7" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 8){ $th ='<img src="images/townhall/'.$th.'.png" alt="8" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 9){ $th ='<img src="images/townhall/'.$th.'.png" alt="9" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 10){ $th ='<img src="images/townhall/'.$th.'.png" alt="10" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
//score
$lt=array(0,400,500,600,800,1000,1200,1400,1600,1800,2000,2200,2400,2600,2800,3000,3200,3500,3800,4100,4400,4700,5000,9999);
$lt2=array(399,499,599,799,999,1199,1399,1599,1799,1999,2199,2399,2599,2799,2999,3199,3499,3799,4099,4399,4699,4999,99999);

$legend = count($lt);
for ($x = 0; $x < $legend; $x++)
{
    if (($player ['avatarObj']['score'] >= $lt[$x]) && ($player ['avatarObj']['score'] < $lt2[$x]))
    {
        $y = $x;
        $sx = '<img src="images/'.$y.'.png" alt="10" width="22" height="19">';
    }
}
//AccountPrivileges
if($player["AccountPrivileges"] == 0){ $player["AccountPrivileges"] =''.text_profile_accountprivileges_player.'';
}
if($player["AccountPrivileges"] == 1){ $player["AccountPrivileges"] =''.text_profile_accountprivileges_moderator.'';
}
if($player["AccountPrivileges"] == 2){ $player["AccountPrivileges"] =''.text_profile_accountprivileges_highmoderator.'';
}
if($player["AccountPrivileges"] == 3){ $player["AccountPrivileges"] =''.text_profile_accountprivileges_undefined.'';
}
if($player["AccountPrivileges"] == 4){ $player["AccountPrivileges"] =''.text_profile_accountprivileges_administrator.'';
}
if($player["AccountPrivileges"] == 5){ $player["AccountPrivileges"] =''.text_profile_accountprivileges_owner.'';
}
//AccountStatus
if($player["AccountStatus"] == 0){ $player["AccountStatus"] =''.text_profile_accountstatus_normal.'';
}
if($player["AccountStatus"] <> 0){ $player["AccountStatus"] =''.text_profile_accountstatus_banned.'';
}
//Clan or not?
if($alliance_id == 0){ $alliance_id =''.text_profile_no_clan.'';
}
if($alliance_id <> 0){ $alliance_id ='<a href="index.php?page_id=guild&id='.$alliance_id.'">'.$player["alliance_name"].'</a> - '.substr($player["description"], 0, 15).'...'.'';
}
echo '
<table class="themain" align="center" cellpadding="2" cellspacing="0" width="10%"><tbody><tr>
	  <td>
	<table width="700" class="themain" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr class="trhover">
    <td height="26" colspan="3" class="topp2"><b>Profile - <font color="white"><b>'.$player["AccountPrivileges"].'</b> - <b>'.$playername.'</b></font></b></td>
  </tr>
  <tr class="trhover">
    <td width="174" rowspan="8" align="center">'.$th.'</td>
  </tr>
  <tr class="trhover">
    <td width="124"><b>'.text_profile_name.'</b></td>
    <td>'.$playername.'</td>
  </tr>
  <tr class="trhover">
    <td>'.text_profile_level.'</td>
    <td>'.$ava_level.'</td>
    </tr>
  <tr class="trhover">
    <td>'.text_profile_experience.'</td>
    <td>'.$exp.'</td>
    </tr>
  <tr class="trhover">
    <td>'.text_profile_trophies.'</td>
    <td>'.$sx.' '.$sc.'</td>
    </tr>
  <tr class="trhover">
    <td>'.text_profile_gams.'</td>
    <td>'.$gems.' - '.$golds.'</td>
    </tr>
  <tr class="trhover">
    <td>'.text_profile_clan.'</td>
    <td>'.$alliance_id.'</td>
  </tr>
  <tr class="trhover">
    <td>'.text_profile_latestupdate.'</td>
    <td><i>'.$player["LastUpdateTime"].'</i></td>
    </tr>
  <tr class="trhover">
    <td width="174" align="center">'.$player["AccountStatus"].'</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  </table></table>
<br>
<table class="themain" align="center" cellpadding="2" cellspacing="0" width="10%"><tbody><tr>
	  <td>
	<table width="700" class="themain" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td class="topp2">Buildings</td>
  </tr>
  <tr class="trhover">
    <td><textarea class="styled" readonly="" name="gameObject">' . prettyPrint($player['gameobjects']) . '</textarea></td>
  </tr>
</table></table>'; ?>
<br/>
<table class="themain" align="center" cellpadding="2" cellspacing="0" width="48%"><tbody><tr>
  <td>
<table class="themain" border="0" align="center" cellpadding="1" cellspacing="1" width="100%">
  <tr>
    <td align="center" valign="top" class="topp2">Signature</td>
  </tr>
	<?PHP echo '
  <tr class="trhover">
    <td align="center" valign="center"><br />
	<img src="/signature.php?id='.$player["PlayerId"].'" alt="" width="430" height="110" border="0"><br /><br />
	<input type="text" size="50" readonly="" value="'.$site.'/signature.php?id='.$player["PlayerId"].'"><br /><br /></td>
    </tr>';
	}
?>
</table>
</table>