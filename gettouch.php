<?php
$FName = $_POST['FName'];
$PhoneNo = $_POST['PhoneNo'];
$email = $_POST['email'];
$comments = $_POST['comments'];


if (!empty($Name) || !empty($PhoneNo) || !empty($email) || !empty($comments)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "plasmaproject";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From contact Where email = ? Limit 1";
     $INSERT = "INSERT Into contact (FName,PhoneNo,email,comments) values(?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $FName, $PhoneNo, $email, $comments);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>

<p align="center"><a href="http://localhost/plasmadonation/plasma_donation.html">Go back to home</a></p>