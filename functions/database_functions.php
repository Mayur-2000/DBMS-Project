<?php
	
	function db_connect(){
		$conn = mysqli_connect("localhost", "root", "", "plasmaproject");
		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		return $conn;
	}

	/*function select4LatestBook($conn){
		$row = array();
		$query = "SELECT ID FROM donationform ORDER BY ID DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}
		for($i = 0; $i < 4; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	}*/

	function getID($conn, $ID){
		$query = "SELECT FirstName, Blood_Group,Age,weights,PhoneNumber,city FROM donationform WHERE ID = '$ID'";
  
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}



	function getrID($conn, $ID){
		$query = "SELECT ID,FirstName, Blood_Group,PhoneNumber,hospitalname,Addr FROM requestform WHERE ID = '$ID'";
  
		$result1 = mysqli_query($conn, $query);
		if(!$result1){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result1;
	}

	function getcID($conn, $ID){
		$query = "SELECT ID,FName,PhoneNo,email,comments FROM contact WHERE ID = '$ID'";
  
		$result2 = mysqli_query($conn, $query);
		if(!$result2){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result2;
	}



	

	function getdonationId($conn, $ID){
		$query = "SELECT ID FROM donationform WHERE ID = '$ID'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "retrieve data failed!" . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['ID'];
	}

	/*function insertIntodonationform($FirstName, $Blood_Group, $Age, $weights, $PhoneNumber, $city){
		$conn = db_connect();
		$query = "INSERT INTO orders VALUES 
		('', '" . $FirstName . "', '" . $Blood_Group . "', '" . $Age . "', '" . $weights . "', '" . $PhoneNumber . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert orders failed " . mysqli_error($conn);
			exit;
		}
	}*/

	/*function getbookprice($isbn){
		$conn = db_connect();
		$query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "get book price failed! " . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['book_price'];
	}
*/
	/*function getCustomerId($name, $address, $city, $zip_code, $country){
		$conn = db_connect();
		$query = "SELECT customerid from customers WHERE 
		name = '$name' AND 
		address= '$address' AND 
		city = '$city' AND 
		zip_code = '$zip_code' AND 
		country = '$country'";
		$result = mysqli_query($conn, $query);
		// if there is customer in db, take it out
		if($result){
			$row = mysqli_fetch_assoc($result);
			return $row['customerid'];
		} else {
			return null;
		}
	}*/

	function setdonationId($ID,$FirstName, $Blood_Group, $Age, $weights, $PhoneNumber, $city){
		$conn = db_connect();
		$query = "INSERT INTO donationform VALUES 
			('', '" . $FirstName . "', '" . $Blood_Group . "', '" . $Age . "', '" . $weights . "', '" . $PhoneNumber . "','" . $city ."')";

		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "insert false !" . mysqli_error($conn);
			exit;
		}
		$ID = mysqli_insert_id($conn);
		return $ID;
	}

	function getdonarName($conn, $city){
		$query = "SELECT city FROM donationform WHERE city = '$city'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		if(mysqli_num_rows($result) == 0){
			echo "Empty names ! Something wrong! check again";
			exit;
		}

		$row = mysqli_fetch_assoc($result);
		return $row['city'];
	}



	function rgetdonarName($conn, $Addr){
		$query = "SELECT Addr FROM requestform WHERE Addr = '$Addr'";
		$result1 = mysqli_query($conn, $query);
		if(!$result1){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		if(mysqli_num_rows($result1) == 0){
			echo "Empty names ! Something wrong! check again";
			exit;
		}

		$row = mysqli_fetch_assoc($result1);
		return $row['Addr'];
	}

	function cgetcontactName($conn, $PhoneNo){
		$query = "SELECT PhoneNo FROM contact WHERE PhoneNo = '$PhoneNo'";
		$result2 = mysqli_query($conn, $query);
		if(!$result2){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		if(mysqli_num_rows($result2) == 0){
			echo "Empty names ! Something wrong! check again";
			exit;
		}

		$row = mysqli_fetch_assoc($result2);
		return $row['PhoneNo'];
	}


	


	

	function getAll($conn){
		$query = "SELECT * from donationform ORDER BY ID DESC";
        
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	function getrAll($conn){
		$query = "SELECT * from requestform ORDER BY ID DESC";
		
		$result1 = mysqli_query($conn, $query);
		if(!$result1){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result1;
	}

	function getcAll($conn){
		$query = "SELECT * from contact ORDER BY ID DESC";
		
		$result2 = mysqli_query($conn, $query);
		if(!$result2){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result2;
	}
?>