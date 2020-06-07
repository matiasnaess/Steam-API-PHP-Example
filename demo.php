<?php 
require 'lib/steamapi.php'; // This is where we do all the calls to the Steam API.

// This will not work if the Steam API and the Steam ID has not been set. Please refer to the README.
// You can generate the Steam API Key here: https://steamcommunity.com/dev/apikey
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Steam API Demo Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="text-center container-fluid">
  <h1>Example usage of the Steam API </h1>

</div>

<div class="container">
<div class="card" style="width:184px">
  <img class="card-img-top" src="<?php echo $steamapi['avatar'];  ?>" alt="Card image">
  <div class="card-body">
    <h4 class="card-title"><?php echo $steamapi["username"]; ?></h4>
    <p class="card-text"><?php echo $steamapi["onlinestatus"]; ?></p>
    <p class="card-text"><?php echo $steamapi["visibilitystate"]; ?></p>
    <p class="card-text"><?php echo $steamapi["level"]; ?> Steam Level</p>
    <p class="card-text"><?php echo $steamapi["totalgames"]; ?> Games</p>
    <p class="card-text"><?php echo $steamapi["totalyears"]; ?> Steam years</p>
    
    <a href="<?php echo $steamapi["profileurl"]; ?>" class="btn btn-primary">See Profile</a>
  </div>
</div>
</div>


<div class="container">

<?php print("<pre>".print_r($steamapi,true)."</pre>"); ?>
</div>





</body>
</html>