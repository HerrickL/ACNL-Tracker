<?php
	session_start();
	include 'extra.php';
	//prepared statement to verify db
	$usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
	if ($usersDB->connect_errno) {
	    echo http_response_code(200);
	}

	if(isset($_POST)){
		$post_bName = $_POST['badgeName'];

		$add = $usersDB->prepare("INSERT INTO User_Badges (uid, bid) VALUES ((SELECT id FROM ACUsers WHERE username='".$_SESSION['ACusername']."'), (SELECT id FROM Badges WHERE name='".$post_bName."'))");
		if(!$add->execute()){
			echo http_response_code(200);
		}
	}
	else{
		echo http_response_code(200);
	}

	echo "Added Badge";
?>