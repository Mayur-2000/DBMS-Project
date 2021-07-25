<?php
	session_start();

	require_once "./functions/admin.php";
	$title = "Contact LIST";
	//require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	
	$result2 = getcAll($conn);
?>

<body style="background-color:#f4f3ff">
<center><h1 style="color:darkblue"><u>Welcome To Admin's Panel</u></h1></center>



    <button>
	<p ><a style="color:red" href="admin_book.php" class="btn btn-primary">Back!</a></p>
	</button>

	

    <h2 style="color:darkblue"><u> Contact List</u></h2>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th style="font-size:large;color:red">ID</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">First Name</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Phone Number</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Email</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<th style="font-size:large;">Comments</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
		
			
		</tr>
		<?php while($row = mysqli_fetch_assoc($result2)){ ?>
		<tr>
			<td style="color:red"><?php echo $row['ID']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php echo $row['FName']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			
			<td><?php echo $row['PhoneNo']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php echo $row['email']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<td><?php echo $row['comments']; ?></td><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
			<!--<td><?php  //rgetdonarName($conn, $row['Addr']); ?></td>-->
			<!--<td><button style="border-color:darkblue"><a href="admin_edit.php?Id=<?php// echo $row[//'ID']; ?>">Edit</a></button></td><th>&nbsp;</th><th>&nbsp;</th>-->
			<td><button style="border-color:darkblue"><a style="color:darkblue" href="admin_delete.php?Id=<?php echo $row['ID']; ?>">Delete</a></button></td>
		</tr>
		<?php } ?>
	</table>
		
		</div>
		</body>
		

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>