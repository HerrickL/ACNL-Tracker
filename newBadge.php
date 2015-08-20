<?php
	session_start();
	include 'extra.php';
	//prepared statement to verify db
	$usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
	if ($usersDB->connect_errno) {
	    echo http_response_code(200);
	}

	if(isset($_POST)){
		$post_bName = $_POST['badge'];

		$add = $usersDB->prepare("INSERT INTO Badges (name) VALUES ('".$post_bName."') ON DUPLICATE KEY UPDATE name = name");
		//$delete->bind_param('ss', $Uname, $);
		if(!$add->execute()){
			echo http_response_code(200);
		}
	}
	else{
		echo http_response_code(200);
	}

	echo "Added Badge";
?>