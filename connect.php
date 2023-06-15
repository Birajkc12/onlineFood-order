<?php
	$Name = $_POST['Name'];
	$Password = $_POST['Password'];
	$MobileNumber = $_POST['MobileNumber'];
	$ConfirmPassword = $_POST['ConfirmPassword'];

	if (!empty($Name) || !empty($Password) || !empty($MobileNumber) || !empty($ConfirmPassword)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "onlinefood-order";
	
		// code...
		//create connection
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

		if (mysqli_connect_error()) {
			die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
		} else {
			$SELECT = "SELECT MobileNumber from users where MobileNumber = ? Limit 1";
			$INSERT = "INSERT Into users (Name, Password, MobileNumber, ConfirmPassword) values(?, ?, ?, ?)";

			//Prepare statement
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("i",$MobileNumber);
			$stmt->execute();
			$stmt->bind_result($MobileNumber);
			$stmt->store_result();
			$rnum = $stmt->num_rows;

			if ($rnum==0) {
				$stmt->close();

				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("ssss", $Name , $Password, $MobileNumber, $ConfirmPassword);
				$stmt->execute();
				echo '<script>alert("Welcome to Geeks for Geeks")</script>';
				header('location:login.php');
			} else{
				echo "<h1>Some has already registered with this number.</h1>";
			}
			$stmt->close();
			$conn->close();
		}
	} else {
		echo "All field are required";
	}

?>



              