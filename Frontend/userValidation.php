<?php

include_once('connection.php');

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$username = test_input($_POST["username"]);
	$password = test_input($_POST["password"]);
	$stmt = $conn->prepare("SELECT * FROM customer_info");
	$stmt->execute();
	$users = $stmt->fetchAll();
	
	foreach($users as $user) {
		
        
		if(($user['name'] == $username) &&
        ($user['contact'] == $password)) {
			$_SESSION['username'] = $username;
            $_SESSION['color'] = $user['color']; 
			// You can store other user data too
			$_SESSION['id'] = $user['id'];
            $authenticated = true;
				header("location: userPage.php");
				exit;
		}
		else {
			echo "<script language='javascript'>";
			echo "alert('WRONG INFORMATION')";
			echo "</script>";
			die();
		}
	}
}

?>
