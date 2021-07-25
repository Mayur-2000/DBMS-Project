<?php
	$ID = $_GET['Id'];


	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE  FROM donationform WHERE ID = '$ID'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}

	

	$query = "DELETE  FROM requestform WHERE ID = '$ID'";
	$result1 = mysqli_query($conn, $query);
	if(!$result1){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}

	$query = "DELETE  FROM contact WHERE ID = '$ID'";
	$result2 = mysqli_query($conn, $query);
	if(!$result2){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	
	
	header("Location: admin_book.php");
?>