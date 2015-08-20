<?php
	session_start();
	if(isset($_POST)){
		$_SESSION["animalType"] = $_POST["animalType"];
		$_SESSION["personality"] = null;
		$_SESSION["all"] = null;
		$_SESSION["badge"] = null;
		echo $_SESSION["animalType"];
	}
?>