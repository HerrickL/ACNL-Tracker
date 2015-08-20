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

		$delete = $usersDB->prepare("DELETE FROM User_Badges WHERE uid = (SELECT id FROM ACUsers WHERE username ='".$_SESSION['ACusername']."') AND bid = (SELECT id FROM Badges WHERE name ='".$post_bName."')");
		//$delete->bind_param('ss', $Uname, $);
		if(!$delete->execute()){
			echo http_response_code(200);
		}
	}
	else{
		echo http_response_code(200);
	}

	echo "Deleted Badge";
?>