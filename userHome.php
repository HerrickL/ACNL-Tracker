<?php
    session_start();
    if(!isset($_SESSION['ACusername'])){
      header("Location: home.html", true);   
      die();
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
    <link rel='icon' href='../../favicon.ico'>
    <title>ACNL Game Tracker</title>
    <!-- Bootstrap core CSS -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <!-- Custom styles for this template -->
    <link href='jumbotron.css' rel='stylesheet'>
    <link href='js/login.js' rel='javascript'>
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
        <h1>My Game Data</h1>
          <p> Villager count:
        <?php
        include "extra.php";
          //check if rows in database
          $usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
          if ($usersDB->connect_errno) {
            echo "Could not access the database at this time.";
          }
          if(!($stmt = $usersDB->prepare("SELECT COUNT(v.name) as count FROM Villagers v INNER JOIN AnimalType at ON at.id=v.tid INNER JOIN Personality p ON p.id=v.pid INNER JOIN User_Villagers uv ON uv.vid=v.id INNER JOIN ACUsers u ON u.id=uv.uid WHERE u.username='".$_SESSION['ACusername']."' ORDER BY v.tid, v.name"))){
              echo "You currently have no villagers saved.";
          }
          //execute
          if (!$stmt->execute()) {
            echo "Could not access your villager list at this time.";
          }
          //bind results
          if(!$stmt->bind_result($count)){
              echo "Could not get the villager info from your list at this time.";
          }
          if($stmt->fetch()){
              echo $count;
          }
        ?>
      </p>
        <table class ='table'>
          <thead>
            <tr>
              <th>Villager Name</tb>
              <th>Animal Type</th>
              <th>Personality</th>
              <th>Birthday</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody> 
        <?php
          include "extra.php";
          //check if rows in database
          $usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
          if ($usersDB->connect_errno) {
            echo "Could not access the database at this time.";
          }
          if(!($stmt = $usersDB->prepare("SELECT v.name, at.name AS 'Animal Type', p.name AS 'Personality', v.bday FROM Villagers v INNER JOIN AnimalType at ON at.id=v.tid INNER JOIN Personality p ON p.id=v.pid INNER JOIN User_Villagers uv ON uv.vid=v.id INNER JOIN ACUsers u ON u.id=uv.uid WHERE u.username='".$_SESSION['ACusername']."' ORDER BY v.tid, v.name;"))){
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
          while($stmt->fetch()){
            echo "<tr><td>" .$Name. "<td>" .$Type. "<td>" .$Personality. "<td>" .$bday."<td>
            <button class='btn btn-primary' id='".$Name."' name=\"delete\" value='".$Name."'>X</button>
            </tr>";
          }
          //$userDB->close();
        ?>
        </tbody>
      </table>
      <br>
      <p> Badge count:
        <?php
        include "extra.php";
          //check if rows in database
          $usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
          if ($usersDB->connect_errno) {
            echo "Could not access the database at this time.";
          }
          if(!($stmt = $usersDB->prepare("SELECT COUNT(b.name) as count FROM Badges b INNER JOIN User_Badges ub ON b.id=ub.bid INNER JOIN ACUsers u ON u.id=ub.uid WHERE u.username='".$_SESSION['ACusername']."'"))){
              echo "You currently have no villagers saved.";
          }
          //execute
          if (!$stmt->execute()) {
            echo "Could not access your villager list at this time.";
          }
          //bind results
          if(!$stmt->bind_result($bcount)){
              echo "Could not get the villager info from your list at this time.";
          }
          if($stmt->fetch()){
              echo $bcount;
          }
        ?>
      </p>
        <table class ='table'>
          <thead>
            <tr>
              <th>Badge Name</tb>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody> 
        <?php
          include "extra.php";
          //check if rows in database
          $usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
          if ($usersDB->connect_errno) {
            echo "Could not access the database at this time.";
          }
          if(!($stmt = $usersDB->prepare("SELECT name FROM Badges b INNER JOIN User_Badges ub ON ub.bid=b.id INNER JOIN ACUsers u ON u.id=ub.uid WHERE u.username='".$_SESSION['ACusername']."'"))){
              echo "You currently have no villagers saved.";
          }
          //execute
          if (!$stmt->execute()) {
            echo "Could not access your villager list at this time.";
          }
          //bind results
          if(!$stmt->bind_result($bName)){
              echo "Could not get the villager info from your list at this time.";
          }
          //for each row, display info
          while($stmt->fetch()){
            echo "<tr><td>" .$bName. "<td>
            <button class='btn btn-primary' id='".$bName."' name=\"bdelete\" value='".$bName."'>X</button>
            </tr>";
          }
          //$userDB->close();
        ?>
        </tbody>
      </table>
      </div>
      <footer>
      </footer>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/deleteVillager.js"></script>
    <script src="js/deleteBadge.js"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src='js/ie10-viewport-bug-workaround.js'></script>
  </body>
</html>