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
    <meta name='description' content='>
    <meta name='author' content='>
    <link rel='icon' href='../../favicon.ico'>
    <title>ACNL Game Tracker</title>
    <!-- Bootstrap core CSS -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <!-- Custom styles for this template -->
    <link href='jumbotron.css' rel='stylesheet'>
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
        <br>
        <span class="errormess"></span>
        <h2>Add Villager</h2>
        <form class="form-signin">
            <label for="vName" class="sr-only">Villager Name</label>
            <input type="text" id="vName"  class="form-control" placeholder="Villager Name">
            <label for="vType" class="sr-only">Animal Type</label>
            <input type="text" id="vType"  class="form-control" placeholder="Animal Type">
            <label for="vPersonality" class="sr-only">Personality</label>
            <input type="text" id="vPersonality"  class="form-control" placeholder="Personality">
            <label for="vBday" class="sr-only">Birthday</label>
            <input type="text" id="vBday"  class="form-control" placeholder="Birthday (format: MM/DD)">
            <button class="btn btn-lg btn-primary btn-block" id="addVillager" type="button">Add Villager</button>
        </form>
        <br>
        <h3>Add Badge</h3>
        <form class="form-signin">
            <label for="badgeName" class="sr-only">Badge Name</label>
            <input type="text" id="bName"  class="form-control" placeholder="Badge Name">
            <button class="btn btn-lg btn-primary btn-block" id="addBadge" type="button">Add Badge</button>
        </form>
      <footer>
        <br>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src='js/updateFunctions.js' type ="text/javascript"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src='js/ie10-viewport-bug-workaround.js'></script>
  </body>
</html>