<?php
	session_start();
	if(isset($_POST)){
		$_SESSION["animalType"] = null;
		$_SESSION["personality"] = null;
		$_SESSION["all"] = null;
		$_SESSION["badge"] = $_POST["badge"];
		echo $_SESSION["badge"];
	}
?>