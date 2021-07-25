<?php
	session_start();

	require_once "./functions/admin.php";
	$title = "List Donars";
	//require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
	//$result1 = getrAll($conn);
	//$result2 = getcAll($conn);

?>

<body style="background-color:#f4f3ff">
<center><h1 style="color:darkblue"><u>Welcome To Admin's Panel</u></h1></center>

<button style="border-color:red;margin-top:20px">
	<p class="lead"><a style="color:red" href="admin_add.php">Add new donars</a></p>
	</button><th>&nbsp;</th><th>&nbsp;</th>

<button style="border-color:red">
	<p ><a style="color:red" href="RequestForm.php" class="btn btn-primary">Request List</a></p>
	</button><th>&nbsp;</th><th>&nbsp;</th>
	
	<button style="border-color:red">
	<p ><a style="color:red" href="ContactList.php" class="btn btn-primary">Contact List</a></p>
	</button><th>&nbsp;</th><th>&nbsp;</th>


<button style="border-color:red">
	<p ><a style="color:red" href="plasma_donation.html" class="btn btn-primary">Sign out!</a></p>
	</button>
	
	<h2 style="color:darkblue"><u> Donor's Table</u></h2>
	<table class="table" style="margin-top: 20px">
	
		<tr>
			<th style="font-size:large;color:red">ID</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Name</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Blood Group</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Age</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Weight</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Phone Number</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			
			<th style="font-size:large;">City</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td style="color:red"><?php echo $row['ID']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php echo $row['FirstName']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php echo $row['Blood_Group']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php echo $row['Age']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php echo $row['weights']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php echo $row['PhoneNumber']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
		<!--	<td><?php// echo $row['Email_Id']; ?></td><th>&nbsp;</th><th>&nbsp;</th>-->
			<td><?php echo $row['city']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
		<!--	<td><?php //echo getdonarName($conn, $row['city']); ?></td>-->
			<!--<td><button style="border-color:darkblue"><a href="admin_edit.php?ID=<?php echo $row['ID']; ?>">Edit</a></td></button><th>&nbsp;</th><th>&nbsp;</th>-->
			<td><button style="border-color:darkblue"><a style="color:darkblue" href="admin_delete.php?Id=<?php echo $row['ID']; ?>">Delete</a></button></td>
		</tr>
		<?php } ?>
	</table>

  <!--  <h2 style="color:darkblue"><u> Request Table</u></h2>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th style="font-size:large;color:red">ID</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Name</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Blood Group</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Phone Number</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Hospital Name</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Address</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php// while($row = mysqli_fetch_assoc($result1)){ ?>
		<tr>
			<td style="color:red"><?php// echo $row['ID']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php //echo $row['FirstName']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php// echo $row['Blood_Group']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php //echo $row['PhoneNumber']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php //echo $row['hospitalname']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php //echo $row['Addr']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<!--<td><?php // rgetdonarName($conn, $row[//'Addr']); ?></td>-->
			<!--<td><button style="border-color:darkblue"><a href="admin_edit.php?Id=<?php //echo $row[//'ID']; ?>">Edit</a></button></td><th>&nbsp;</th><th>&nbsp;</th>-->
			<!--<td><button style="border-color:darkblue"><a style="color:darkblue" href="admin_delete.php?Id=<?php echo $row['ID']; ?>">Delete</a></button></td>
		</tr>
	
	</table>
		
		</div>-->
		</body>
		
</html>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>