<table class="themain" align="center" cellpadding="2" cellspacing="0" width="80%"><tbody><tr>
  <td>
    <table border="0" cellpadding="3" cellspacing="1" width="100%">
      <tbody><tr>
        <td width="7%" align="center" class="topp1">#</td>
        <td class="topp2" align="center">Names of Server</td><td class="topp3" align="center">Status</td>
      </tr>
<?PHP
if ($fp=@fsockopen($ipserver1,'9339',$ERROR_NO,$ERROR_STR,(float)0.5)) 
	{ 
	fclose($fp); 
	$serstats= "<font color='green'>Online</font>"; 
	}
else 
	{ 
	$serstats= "<font color='red'>Offline</font>"; 
	} 
	if ($fp=@fsockopen($ipserver2,'9339',$ERROR_NO,$ERROR_STR,(float)0.5)) 
	{ 
	fclose($fp); 
	$serstats1= "<font color='green'>Online</font>"; 
	}
else 
	{ 
	$serstats1= "<font color='red'>Offline</font>"; 
	} 
	echo "
<tr>
<td class='trhover' align='center'>".@++$count."</td>
<td class='trhover' align='center'>$NameOfServer1:</td>		<td class='trhover' align='center'>$serstats</td>
</tr>
<tr>
<td class='trhover' align='center'>".++$count."</td>
<td class='trhover' align='center'>$NameOfServer2:</td>		<td class='trhover' align='center'>$serstats1</td>
</tr>";
?>
</table>
</table>
<br />
<table class="themain" align="center" cellpadding="2" cellspacing="0" width="80%"><tbody><tr><td>
    <table border="0" cellpadding="3" cellspacing="1" width="100%">
      <tbody><tr>

        <td width="7%" align="center" class="topp1">#</td>
        <td class="topp2" align="center">Statistics of Server</td><td class="topp3" align="center">Status</td>
      </tr>
<?PHP
$date = "'".date("Y-m-d H:m:s")."'"; // getting date
$date1 = "'".date('Y-m-d H:m:s', strtotime('-60 minutes'))."'"; // Calculating online players  Check database time
$accounts = mysql_query("SELECT count(*) FROM player");
$totalacc = mysql_fetch_row($accounts);
$guild = mysql_query("SELECT count(*) FROM clan");
$totalguilds = mysql_fetch_row($guild);
$onlinepl = mysql_query("SELECT count(*) FROM player WHERE LastUpdateTime BETWEEN ".$date1." AND ".$date."");
$online = mysql_result($onlinepl, 0, 0);
$bannedchar = mysql_query("SELECT count(*) FROM player WHERE AccountStatus <> 0");
$bannchar = mysql_fetch_row($bannedchar);
//Administrators > 5 owner
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
$i = 1;
echo "<tr>
<td class='trhover' align='center'>".$i."</td>
<td class='trhover' align='center'>Total Accounts:</td>		<td class='trhover' align='center'>$totalacc[0]</td>
</tr>
<tr>
<td class='trhover' align='center'>".++$i."</td>
<td class='trhover' align='center'>Total Guilds:</td>		<td class='trhover' align='center'>$totalguilds[0]</td>
</tr>
<tr>
<td class='trhover' align='center'>".++$i."</td>
<td class='trhover' align='center'>Accounts Banned:</td>	<td class='trhover' align='center'>$bannchar[0]</td>
</tr>
<tr>
<td class='trhover' align='center'>".++$i."</td>
<td class='trhover' align='center'>Moderators connected:</td>	<td class='trhover' align='center'>$mosonline/<span style='color:#F00;'>$mos</span></td>
</tr>
<tr>
<td class='trhover' align='center'>".++$i."</td>
<td class='trhover' align='center'>Administrators conected:</td>		<td class='trhover' align='center'>$gmsonline/<span style='color:#F00;'>$gms</span></td>
</tr>
<tr>
<td class='trhover' align='center'>".++$i."</td>
<td class='trhover' align='center'>Total Players Online:</td>	<td class='trhover' align='center'>$online /<span style='color:#F00;'>$totalacc[0]</span></td>
</tr>";
?>
</table>
</table>