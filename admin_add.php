<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Add new donars";
	//require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$ID = trim($_POST['ID']);
		$ID = mysqli_real_escape_string($conn, $ID);
		
		$FirstName = trim($_POST['FirstName']);
		$FirstName = mysqli_real_escape_string($conn, $FirstName);

		$Blood_Group= trim($_POST['Blood_Group']);
		$Blood_Group = mysqli_real_escape_string($conn, $Blood_Group);

		$Age= trim($_POST['Age']);
		$Age = mysqli_real_escape_string($conn, $Age);

		$weights= trim($_POST['weights']);
		$weights = mysqli_real_escape_string($conn, $weights);
		
		$PhoneNumber = trim($_POST['PhoneNumber']);
		$PhoneNumber = mysqli_real_escape_string($conn, $PhoneNumber);
		
		/*$Email_Id = floatval(trim($_POST['Email_Id']));
		$Email_Id = mysqli_real_escape_string($conn, $Email_Id);*/
		
		$city = trim($_POST['city']);
		$city = mysqli_real_escape_string($conn, $city);

		// add image
		//if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			//$image = $_FILES['image']['name'];
			//$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			///$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			//$uploadDirectory .= $image;
			//move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		//}

		// find publisher and return pubid
		// if publisher is not in db, create new
		/*$finddonar = "SELECT * FROM donationform WHERE city = '$city'";
		$findResult = mysqli_query($conn, $finddonar);
		if(!$findResult){
			// insert into publisher table and return id
			$insertdonar = "INSERT INTO donationform(city) VALUES ('$city')";
			$insertResult = mysqli_query($conn, $insertdonar);
			if(!$insertResult){
				echo "Can't add new donar " . mysqli_error($conn);
				exit;
			}
			$city = mysql_insert_id($conn);
		} else {
			$row = mysqli_fetch_assoc($findResult);
			$city = $row['city'];
		}
*/

		$query = "INSERT INTO donationform VALUES ('" . $ID . "', '" . $FirstName . "', '" . $Blood_Group . "','" . $Age . "','" . $weights . "','" . $PhoneNumber . "','" . $city . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new donars " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_book.php");
		}
	}
?>
<center>
	<h1 style="color:darkblue;"><u>Add Donor's</u></h1></center>
	
    <button style="border-color:red;margin-top:5px">
	<p class="lead"><a style="color:red" href="admin_book.php">Back!</a></p>
	</button><th>&nbsp;</th><th>&nbsp;</th>

	<form method="post" action="admin_add.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ID</th>
				<td><input type="text" name="ID"></td>
			</tr><th>&nbsp;</th>
			<tr>
				<th>Name</th>
				<td><input type="text" name="FirstName" required></td>
			</tr><th>&nbsp;</th>
			<tr>
				<th>Blood Group</th>
				<td><input type="text" name="Blood_Group" required></td>
			</tr><th>&nbsp;</th>
			<tr>
				<th>Age</th>
				<td><input type="text" name="Age" required></td>
			</tr><th>&nbsp;</th>
			<tr>
				<th>Weight</th>
				<td><input type="text" name="weights" required></td>
			</tr><th>&nbsp;</th>
			
			<tr>
				<th>Phone Number</th>
				<td><input type="text" name="PhoneNumber" required></td>
			</tr><th>&nbsp;</th>
			<!--<tr>
				<th>Email</th>
				<td><input type="text" name="Email_Id" required></td>
			</tr>-->
			<tr>
				<th>City</th>
				<td><input type="text" name="city" required></td>
			</tr><th>&nbsp;</th>
		</table>
		
		<input type="submit" name="add" value="Add new donar" class="btn btn-primary">
		<input type="reset" name="cancel" value="Cancel" class="btn btn-default">
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>