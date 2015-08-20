<?php
	session_start();
	if(isset($_POST)){
		$_SESSION["animalType"] = null;
		$_SESSION["personality"] = $_POST["personality"];
		$_SESSION["all"] = null;
		$_SESSION["badge"] = null;
		echo $_SESSION["personality"];
	}
?>