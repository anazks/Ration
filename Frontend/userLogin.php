<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="login.css">
	<title>Login Page</title>
</head>
<style>
	#heading {
		color: #120303;
		font-size: 50px;
		width: 500%;
		margin-left: -100%;
		/* text-align: left; */

	}
</style>

<body>
	<div class="image">
		<img src="ration.jpg">
	</div>


	<form action="userLogin.php" method="post">
		<div class="login-box">
			<div id="heading">Ration Shop Distribution System
			</div>
			<div>
				<h1>User Login</h1>

				<div class="textbox">
					<i class="fa fa-user"
						aria-hidden="true"></i>
					<input type="text"
						placeholder="Username"
						name="username" value="">
				</div>

				<div class="textbox">
					<i class="fa fa-lock"
						aria-hidden="true"></i>
					<input type="password"
						placeholder="use registread mobile number "
						name="password" value="">
				</div>

				<input class="button" type="submit"
					name="login" value="Sign In">
			</div>
		</div>

	</form>

	<?php
    session_start();

        $servername = "localhost"; // Change this to your database server
        $username = "root"; // Change this to your database username // Change this to your database password
        $database = "ration"; // Change this to your database name
        $password = "";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM customer_info WHERE `name`  = '$username' AND contact = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login
        $_SESSION["username"] = $username;
        header("Location: userpage.php"); // Redirect to a dashboard page or another authorized page
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password. <a href='login.html'>Try again</a>";
    }
}

$conn->close();
        ?>
</body>

</html>