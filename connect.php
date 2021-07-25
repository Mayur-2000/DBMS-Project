<?php
$FirstName = $_POST['FirstName'];
$Blood_Group = $_POST['Blood_Group'];
$Age = $_POST['Age'];
$weights = $_POST['weights'];
$PhoneNumber = $_POST['PhoneNumber'];
$city = $_POST['city'];
//$Address = $_POST['Address'];

if (!empty($FirstName) || !empty($Blood_Group) || !empty($Age) || !empty($weights) || !empty($PhoneNumber)  || !empty(city)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "                                   ";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT PhoneNumber From donationform Where PhoneNumber = ? Limit 1";
     $INSERT = "INSERT Into donationform (FirstName, Blood_Group, Age, weights, PhoneNumber,city) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $PhoneNumber);
     $stmt->execute();
     $stmt->bind_result($PhoneNumber);
     $stmt->store_result();
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss", $FirstName, $Blood_Group, $Age, $weights, $PhoneNumber, $city);
      $stmt->execute();
      echo "New record inserted successfully";
     } else {
      echo "Someone already register using this phonenumber";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
<button style="border-color:red">
<p align="center"><a href="http://localhost/plasmadonation/plasma_donation.html">Go back to home</a></p>
</button>