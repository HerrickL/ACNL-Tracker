<?php
	session_start();
	if(isset($_POST)){
		$_SESSION["animalType"] = null;
		$_SESSION["personality"] = null;
		$_SESSION["all"] = $_POST["all"];
		$_SESSION["badge"] = null;
		echo $_SESSION["all"];
	}
?>