<?php
$conn = mysql_connect("localhost","root","","plasmaproject") or die("Data is not found");
mysql_select_db("plasmaproject") or die("could not find database");
$output = '';
//collect
if(isset($_POST['search'])){
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i",'',$searchq);

  $query = mysql_query("SELECT * FROM WHERE  FirstName LIKE '%$searchq%' OR Age LIKE '%$searchq%'  OR city LIKE '%$searchq%' ") or die("data not found"); 
  $count = mysql_num_rows($query);
  if($count == 0){
    $output = 'there was no search reasults';
 }else{
   while($row = mysql_fetch_array($query)){
     $FirstName = $row['FirstName'];
     $Blood_Group = $row['Blood_Group'];
     $Age = $row['Age'];
     $weights = $row['weights'];
     $PhoneNumbers = $row['PhoneNumbers'];
     $city = $row['city'];

     $output .= '<div>'.$FirstName.' '.$Blood_Group.' '.$Age.' '.$weights.' '.$PhoneNumbers.' '. $city.'</div>';

   }

 }

}
?>


<html>
  <head>
    <title>Search</title>
</head>
<body>
<form action="search.php" method="post">
  <input type="text" name="search" placeholder="Search for Names....">
  <input type="Submit" value=">>" />
</form>
 <?php print("$output");?>
</body>
  </html>