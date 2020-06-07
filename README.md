# Steam User API with PHP
Example on usage of the Steam Official API with PHP. 

You can read about the official API here: https://developer.valvesoftware.com/wiki/Steam_Web_API#GetPlayerSummaries_.28v0001.29

How to use: 
1. Generate your own API key here: https://steamcommunity.com/dev/apikey 
2. Enter the STEAMID64 and API key under lib/steamapi.php 

The steamapi.php file collects the following from the API into an array: 

    [steamid] => 76561198011775992
    [username] => Mattimat
    [avatar] => https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/0b/0bbe1b0a81ebd7c211af7c56f7f686bbdcd9839c_full.jpg
    [profileurl] => https://steamcommunity.com/id/Mattimat/
    [country] => NO
    [onlinestatus] => Online
    [visibilitystate] => Public Profile
    [totalgames] => 1,402
    [totalyears] => 11
    [level] => 107
