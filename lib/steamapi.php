<?php
// Steam API Example by Matias Næss - For a stable download please visit: https://github.com/matiasnaess/Steam-API-PHP-Example
// Using MySQL? Don't forget to sanitise your inputs!


$steamapikey = "DBB16388E96478186E927D8D65EBB845"; // Insert your Steam API Key - You can generate your key here: https://steamcommunity.com/dev/apikey
$steamid = "76561198011775992"; // Insert the Steam ID 64 you wish to look up here
?>

<?php
 if (empty($steamid) or empty($steamapikey)) {
   echo "Missing Steam ID or API Key!"; 
   exit;
  } else 


 // Steam API Calls
  
@ $decodeuserinfo = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=". $steamapikey ."&steamids=". $steamid);
   $userinfo = json_decode($decodeuserinfo, true);
   
$steamuser = $userinfo['response']['players'][0];

@ $getsteamlevel = file_get_contents("https://api.steampowered.com/IPlayerService/GetBadges/v1/?key=EA4FA02807E84092057D48943A0EFE61&format=json&steamid=".$steamid);
$decodelevel = json_decode($getsteamlevel, true);  

@ $getgames = file_get_contents("https://api.steampowered.com/IPlayerService/GetOwnedGames/v1/?key=". $steamapikey ."&format=json&steamid=".$steamid ."%20&include_appinfo=0&include_played_free_games=0");
   $games = json_decode($getgames, true);

@ $vacbans = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerBans/v1/?key=". $steamapikey ."&steamids=". $steamid);
   $vac = json_decode($vacbans, true);
  
@ $getsteamlevel = file_get_contents("https://api.steampowered.com/IPlayerService/GetBadges/v1/?key=EA4FA02807E84092057D48943A0EFE61&format=json&steamid=".$steamid);
   $decodelevel = json_decode($getsteamlevel, true); 
 

// General user info 
$steamapi['steamid'] = $steamuser['steamid']; 
$steamapi['username'] = $steamuser['personaname']; 
$steamapi['avatar'] = $steamuser['avatarfull']; 
$steamapi['profileurl'] = $steamuser['profileurl']; 
$steamapi['country'] = $steamuser['loccountrycode'];    
 
// Checks the users status 
// 1 = online, 2 = busy, 3 = away, 4 = snooze 

if ($steamuser['personastate'] == 1) {
    $steamapi['onlinestatus'] = "Online"; 
} elseif ($steamuser['personastate'] == 2) {
    $steamapi['onlinestatus'] = "Busy";
} elseif ($steamuser['personastate'] == 3) {
    $steamapi['onlinestatus'] = "Away";
} elseif ($steamuser['personastate'] == 4) {
    $steamapi['onlinestatus'] = "Snooze";
} else 
    $steamapi['onlinestatus'] = "Offline";
    
// Checks the users community state 
// 1 = private profile, 0 = community not configured, 2 = friends only.

if ($steamuser['communityvisibilitystate'] == 1) {
  $steamapi['visibilitystate'] = "Private Profile";
} elseif ($steamuser['communityvisibilitystate'] == 0) {
    $steamapi['visibilitystate'] = "Private Profile";
} elseif ($steamuser['communityvisibilitystate'] == 2) {
    $steamapi['visibilitystate'] = "Friends Only"; 
} else 
$steamapi['visibilitystate'] = "Public Profile"; 

// Checks total games on Steam account 

$totalgames = number_format($games['response']['game_count']);
if ($totalgames == 0) {
$steamapi['totalgames'] = "0"; 
} else 
$steamapi['totalgames'] = $totalgames; 

// Check total years on Steam
if ($steamuser['communityvisibilitystate'] == 3) { 
$steamyears =  date("Y" , $steamuser['timecreated']); $steamyears2 = date("Y"); $totalyears = $steamyears2 - $steamyears; 
$steamapi['totalyears'] = $totalyears; 
} else 
$steamapi['totalyears'] = "0"; 

// Check Steam level
if ($steamuser['communityvisibilitystate'] == 3) {  
    $level = $decodelevel['response']['player_level']; 
    $steamapi['level'] = $level;
} else 
$steamapi['level'] = "0"; 

?>        
