<?php
	session_start();
	include 'extra.php';
	//prepared statement to verify db
	$usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
	if ($usersDB->connect_errno) {
	    echo http_response_code(200);
	}

	if(isset($_POST)){
		$post_vName = $_POST['villagerName'];

		$delete = $usersDB->prepare("DELETE FROM User_Villagers WHERE uid =(SELECT id FROM ACUsers WHERE username ='".$_SESSION['ACusername']."') AND vid=(SELECT id FROM Villagers WHERE name='".$post_vName."')");
		//$delete->bind_param('ss', $Uname, $);
		if(!$delete->execute()){
			echo http_response_code(200);
		}
	}
	else{
		echo http_response_code(200);
	}

	echo "Deleted Villager";
?>