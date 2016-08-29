<?PHP
include('config.php');
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
		
		$players[] = array(
			"PlayerId" => $row['PlayerId'],
			"AccountStatus" => $row['AccountStatus'],
			"AccountPrivileges" => $row['AccountPrivileges'],
			"LastUpdateTime" => $row['LastUpdateTime'],
			"avatar" => $avatar,
			"avatarObj" => $avatarObj,
			"gameobjects" => $gameobjects,
		);
	}
foreach($players as $player){
	$playername = $player['avatarObj']['avatar_name'];
	$th = $player['avatarObj']['townhall_level'] + 1;
	$sc = $player['avatarObj']['score'];
	$ava_level = $player['avatarObj']['avatar_level'];
	$gems = $player['avatarObj']['current_gems'];
	$exp = $player['avatarObj']['experience'];
}
//AccountPrivileges
if($player["AccountPrivileges"] == 0){ $player["AccountPrivileges"] ='Player';
}
if($player["AccountPrivileges"] == 1){ $player["AccountPrivileges"] ='Moderator';
}
if($player["AccountPrivileges"] == 2){ $player["AccountPrivileges"] ='High Moderator';
}
if($player["AccountPrivileges"] == 3){ $player["AccountPrivileges"] ='Undefined';
}
if($player["AccountPrivileges"] == 4){ $player["AccountPrivileges"] ='Administrator';
}
if($player["AccountPrivileges"] == 5){ $player["AccountPrivileges"] ='Owner';
}
//AccountStatus
if($player["AccountStatus"] == 0){ $player["AccountStatus"] ='Normal';
}
if($player["AccountStatus"] <> 0){ $player["AccountStatus"] ='Banned';
}   
     
    $font = "images/sc.ttf";
    $backgroundimage = "images/signature.jpg"; //background image type have to be jpg/jpeg .    

    header("Content-Type: image/png");
    $im = imagecreatefromjpeg($backgroundimage);
    $color = imagecolorallocatealpha($im, 255, 255, 255, 100);
    $text_colour = imagecolorallocate( $im, 245, 213, 10);
    $text_colour2 = imagecolorallocate( $im, 255, 255, 255);
    $line_colour = imagecolorallocate( $im,  245, 213, 10);
    $grey = imagecolorallocate($im, 128, 128, 128);
    $black = imagecolorallocate($im, 0, 0, 0);
    $white = imagecolorallocate($im, 255, 255, 255);
    $wizardblue = imagecolorallocate($im, 91, 99, 103);
    
    $adminrenk = imagecolorallocate($im, 0, 255, 0);
    $adminrenk = imagecolorallocate($im, 255, 0, 0);
    
	//Line yellow
    imagettftext( $im, 13, 0, 228, 142, $black, $font, 'Latest Update:' .$LastUpdateTime);
    imagettftext( $im, 13, 0, 226, 140, $text_colour, $font, 'Latest Update:' .$LastUpdateTime);
	//Line yellow

    imagettftext( $im, 12, 0, 28, 18, $black, $font, $playername);
    imagettftext( $im, 12, 0, 30, 20, $text_colour2, $font, $playername);

    imagettftext( $im, 12, 0, 328, 18, $black, $font, $myservername);
    imagettftext( $im, 12, 0, 330, 20, $text_colour2, $font, $myservername);

    imagettftext( $im, 12, 0, 328, 40, $black, $font, $site);
    imagettftext( $im, 12, 0, 330, 42, $text_colour2, $font, $site);
    
    imagettftext( $im, 12, 0, 32, 62, $black, $font, 'Townhall: '.$th);
    imagettftext( $im, 12, 0, 30, 60, $adminrenk, $font, 'Townhall: '.$th);

    imagettftext( $im, 12, 0, 32, 82, $black, $font, 'Experience: '.$exp);
    imagettftext( $im, 12, 0, 30, 80, $adminrenk, $font, 'Experience: '.$exp);
	
	imagettftext( $im, 12, 0, 32, 100, $black, $font, 'Level: '.$ava_level);
    imagettftext( $im, 12, 0, 30, 98, $adminrenk, $font, 'Level: '.$ava_level);
    
	imagettftext( $im, 12, 0, 32, 120, $black, $font, 'Trophies: '.$sc);
    imagettftext( $im, 12, 0, 30, 118, $adminrenk, $font, 'Trophies: '.$sc);

	imagettftext( $im, 12, 0, 32, 140, $black, $font, 'Gems: '.$gems);
    imagettftext( $im, 12, 0, 30, 138, $adminrenk, $font, 'Gems: '.$gems);
	
    //imagefilledrectangle($im, 478, 70, 636, 100, $wizardblue);
    imagettftext( $im, 12, 0, 385, 72, $white, $font, 'Privileges: '.$player["AccountPrivileges"]);
    imagettftext( $im, 12, 0, 382, 73, $adminrenk, $font, 'Privileges: '.$player["AccountPrivileges"]);
	
	imagettftext( $im, 12, 0, 355, 92, $white, $font, 'Account Status: '.$player["AccountStatus"]);
    imagettftext( $im, 12, 0, 352, 93, $adminrenk, $font, 'Account Status: '.$player["AccountStatus"]);
    
    imagesetthickness ( $im, 5 );
    imageline( $im, 30, 147, 642, 147, $black );
    imageline( $im, 30, 145, 640, 145, $line_colour );
    
    
    imagefillalpha($im, $color);
    imagepng($im);
    imagedestroy($im);

    function ImageFillAlpha($image, $color)
    {
        imagefilledrectangle($image, 0, 0, imagesx($image), imagesy($image), $color);
    }
?>