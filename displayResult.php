<?php
    session_start();
    if(!isset($_SESSION['ACusername'])){
      header("Location: home.html", true);        die();
      exit;
    }
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='../../favicon.ico'>
    <title>ACNL Game Tracker</title>
    <!-- Bootstrap core CSS -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <!-- Custom styles for this template -->
    <link href='css/jumbotron.css' rel='stylesheet'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src='../../assets/js/ie8-responsive-file-warning.js'></script><![endif]-->
    <script src='js/ie-emulation-modes-warning.js'></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
  </head>
  <body>
    <nav class='navbar navbar-inverse navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='userHome.php'>Home</a>
        </div>
        <a class='navbar-brand' href='villagerSearch.php'>Search<a/>
        <a class='navbar-brand' href='addToDB.php'>Add to Database<a/>
        <a class='navbar-brand' style = "float:right" href= "logout.php">Logout</a>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class='jumbotron'>
      <div class='container'>
        <h1>Results</h1>
        <table class ='table'>
          <?php
            include "extra.php";
            if($_SESSION['animalType'] != NULL) {
              $usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
              if ($usersDB->connect_errno) {
                echo "Could not access the database at this time.";
              }
              if(!($stmt = $usersDB->prepare("SELECT v.name, at.name AS 'Animal Type', p.name AS 'Personality', v.bday FROM Villagers v INNER JOIN Personality p ON p.id=v.pid INNER JOIN AnimalType at ON at.id=v.tid  WHERE at.name='".$_SESSION['animalType']."' ORDER BY v.name"))){
                echo "You currently have no villagers saved.";
              }
              //execute
              if (!$stmt->execute()) {
                echo "Could not access your villager list at this time.";
              }
              //bind results
              if(!$stmt->bind_result($Name, $Type, $Personality, $bday)){
                echo "Could not get the villager info from your list at this time.";
              }
              //for each row, display info
              echo "<thead><tr>
                          <th>Villager Name</tb>
                          <th>Animal Type</th>
                          <th>Personality</th>
                          <th>Birthday</th>
                          <th>Add</th>
                        </tr>
                      </thead>
                      <tbody>";
              while($stmt->fetch()){
                echo "<tr><td>" .$Name. "<td>" .$Type. "<td>" .$Personality. "<td>" .$bday."<td>
                <button class='btn btn-primary' id='".$Name."' name=\"add\" value='".$Name."'>+</button>
                </tr>";
              }
            }
            else if($_SESSION['personality'] != NULL) {
              $usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
              if ($usersDB->connect_errno) {
                echo "Could not access the database at this time.";
              }
              if(!($stmt = $usersDB->prepare("SELECT v.name, at.name AS 'Animal Type', p.name AS 'Personality', v.bday FROM Villagers v INNER JOIN Personality p ON p.id=v.pid INNER JOIN AnimalType at ON at.id=v.tid  WHERE p.name='".$_SESSION['personality']."' ORDER BY v.name"))){
                echo "You currently have no villagers saved.";
              }
              //execute
              if (!$stmt->execute()) {
                echo "Could not access your villager list at this time.";
              }
              //bind results
              if(!$stmt->bind_result($Name, $Type, $Personality, $bday)){
                echo "Could not get the villager info from your list at this time.";
              }
              //for each row, display info
              echo "<thead><tr>
                          <th>Villager Name</tb>
                          <th>Animal Type</th>
                          <th>Personality</th>
                          <th>Birthday</th>
                          <th>Add</th>
                        </tr>
                      </thead>
                      <tbody>";
              while($stmt->fetch()){
                echo "<tr><td>" .$Name. "<td>" .$Type. "<td>" .$Personality. "<td>" .$bday."<td>
                <button class='btn btn-primary' id='".$Name."' name=\"add\" value='".$Name."'>+</button>
                </tr>";
              }
            }
            else if($_SESSION['all'] != NULL) {

              $usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
              if ($usersDB->connect_errno) {
                echo "Could not access the database at this time.";
              }
              if(!($stmt = $usersDB->prepare("SELECT v.name, at.name AS 'Animal Type', p.name AS 'Personality', v.bday FROM Villagers v INNER JOIN AnimalType at ON at.id=v.tid INNER JOIN Personality p ON p.id=v.pid ORDER BY v.tid, v.name"))){
                echo "You currently have no villagers saved.";
              }
              //execute
              if (!$stmt->execute()) {
                echo "Could not access your villager list at this time.";
              }
              //bind results
              if(!$stmt->bind_result($Name, $Type, $Personality, $bday)){
                echo "Could not get the villager info from your list at this time.";
              }
              //for each row, display info
              echo "<thead><tr>
                          <th>Villager Name</tb>
                          <th>Animal Type</th>
                          <th>Personality</th>
                          <th>Birthday</th>
                          <th>Add</th>
                        </tr>
                      </thead>
                      <tbody>";
              while($stmt->fetch()){
                echo "<tr><td>" .$Name. "<td>" .$Type. "<td>" .$Personality. "<td>" .$bday."<td>
                <button class='btn btn-primary' id='".$Name."' name=\"add\" value='".$Name."'>+</button>
                </tr>";
              }
            }
            else if($_SESSION['badge'] != NULL) {

              $usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
              if ($usersDB->connect_errno) {
                echo "Could not access the database at this time.";
              }
              if(!($stmt = $usersDB->prepare("SELECT name FROM Badges"))){
                echo "You currently have no villagers saved.";
              }
              //execute
              if (!$stmt->execute()) {
                echo "Could not access your villager list at this time.";
              }
              //bind results
              if(!$stmt->bind_result($Name)){
                echo "Could not get the villager info from your list at this time.";
              }
              //for each row, display info
              echo "<thead><tr>
                          <th>Badge Name</tb>
                          <th>Add</th>
                        </tr>
                      </thead>
                      <tbody>";
              while($stmt->fetch()){
                echo "<tr><td>" .$Name. "<td>
                <button class='btn btn-primary' id='".$Name."' name=\"badd\" value='".$Name."'>+</button>
                </tr>";
              }
            }            
            else{
              echo "Cound not find any villagers with those specifications.";
            }
          ?>
      </div>
      <footer>
        <span class="errormess"></span>
      </footer>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/addVillager.js'></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src='js/ie10-viewport-bug-workaround.js'></script>
  </body>
</html>