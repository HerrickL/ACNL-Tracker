<?php
	session_start();
	include 'extra.php';

   //prepared statement to verify db
	$usersDB = new mysqli($myURL, $myDataBase, $myPassword, $myDataBase);
	if ($usersDB->connect_errno) {
	    // did not fail based off of user error
	    echo "Cannot connect to the database at this time. ";
	}
	//new user into database
	if(isset($_POST)){
		$post_username = $_POST['username'];
		$post_password = $_POST['password'];
		$post_email = $_POST['email'];

		//is it a valid email address?
		if(filter_var($post_email, FILTER_VALIDATE_EMAIL) == FALSE){
			echo "Invalid email address";
			die();
		}
		
		//check if exists in database
		if (!($stmt = $usersDB->prepare("INSERT INTO ACUsers(username, password, email) VALUES (?, ?, ?)"))) {
			//fail back to js/ajax;
			echo null;
			die();
		}
		 /* bind data */
		/* Prepared statement, stage 2: bind and execute. From PHP manual */
		if (!$stmt->bind_param("sss", $post_username, $post_password, $post_email)) {
			//fail back to js/ajax
			echo null;
			die();
		}
		if (!$stmt->execute()) {
			 //faill back to js/ajax
			echo null;
			die();
		}
		
		//echo back success
		$_SESSION['ACusername'] = $post_username;
		echo $_SESSION['ACusername'];
		
	}
?>