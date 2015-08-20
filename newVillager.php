<?php
	session_start();
	include 'extra.php';
	//prepared statement to verify db
	$usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
	if ($usersDB->connect_errno) {
	    echo http_response_code(200);
	}

	if(isset($_POST)){
		$post_name = $_POST['name'];
		$post_type = $_POST['type'];
		$post_personality = $_POST['personality'];
		$post_bday = $_POST['bday'];

		#Add new animal type if applicable
		$addT = $usersDB->prepare("INSERT INTO AnimalType (name) VALUES ('".$post_type."') ON DUPLICATE KEY UPDATE name = name");
		
		if(!$addT->execute()){
			echo http_response_code(200);
		}
		#Add new personality type if applicable
		$addP = $usersDB->prepare("INSERT INTO Personality (name) VALUES ('".$post_personality."') ON DUPLICATE KEY UPDATE name = name");
		
		if(!$addP->execute()){
			echo http_response_code(200);
		}
		#add new villager if applicable
		$addV = $usersDB->prepare("INSERT INTO Villagers (name, tid, pid, bday) VALUES ('".$post_name."', (SELECT id FROM AnimalType WHERE name='".$post_type."'), (SELECT id FROM Personality WHERE name='".$post_personality."'),'".$post_bday."') ON DUPLICATE KEY UPDATE name = name, tid = tid, pid = pid, bday = bday");
		
		if(!$addV->execute()){
			echo http_response_code(200);
		}
	}
	else{
		echo http_response_code(200);
	}
	echo "Added Villager";
?>