<?php
	session_start();
	if(!isset($_POST['submit'])){
		echo "Something wrong! Check again!";
		exit;
	}
	require_once "./functions/database_functions.php";
	$conn = db_connect('$name','$pass');

	$name = trim($_POST['name']);
	$pass = trim($_POST['pass']);

	if($name == "" || $pass == ""){
		echo "Name or Pass is empty!";
		exit;
	}

	$name = mysqli_real_escape_string($conn, $name);
	$pass = mysqli_real_escape_string($conn, $pass);
	$pass = sha1($pass);

	// get from db
	$query = "SELECT name, pass from signupform";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Empty data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);

	if($name != $row['name'] && $pass != $row['pass']){
		echo "FirstName or password is wrong. Check again!";
		$_SESSION['signupform'] = false;
		exit;
	}

	if(isset($conn)) {mysqli_close($conn);}
	$_SESSION['signupform'] = true;
	header("Location: plasma_donation.html");
?>

<button style="border-color:red">
<p align="center"><a href="http://localhost/plasmadonation/login.php">Go to Login</a></p>
</button>