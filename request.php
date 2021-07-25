<?php
$FirstName = $_POST['FirstName'];
$Blood_Group = $_POST['Blood_Group'];
$PhoneNumber = $_POST['PhoneNumber'];
$hospitalname = $_POST['hospitalname'];
$Addr = $_POST['Addr'];
//$Address = $_POST['Address'];

if (!empty($FirstName) || !empty($Blood_Group) || !empty($PhoneNumber) || !empty($hospitalname) || !empty($Addr)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "plasmaproject";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT PhoneNumber From requestform Where PhoneNumber = ? Limit 1";
     $INSERT = "INSERT Into requestform (FirstName, Blood_Group, PhoneNumber,hospitalname,Addr) values(?, ?, ?, ?,?)";
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
      $stmt->bind_param("sssss", $FirstName, $Blood_Group, $PhoneNumber, $hospitalname, $Addr);
      $stmt->execute();
      echo "Thanks for Requesting with us,Our Team Members will contact you shortly";
     } else {
      echo "Someone already request using this phonenumber ";
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