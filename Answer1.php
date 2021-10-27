<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

	$conn = new mysqli('localhost', 'root', '', 'bincom_test');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
   
 
// Attempt select query execution
 $sql = "SELECT * FROM announced_pu_results"; 
 if($result = mysqli_query($conn, $sql))
    { if(mysqli_num_rows($result) > 0){ 
 echo "<table>"; 
 echo "<tr>";
  echo "<th>result_id</th>";
   echo "<th>polling_unit_uniqueid</th>"; 
   echo "<th>party_abbreviation</th>"; 
   echo "<th>party_score</th>"; 
   echo "<th>entered_by_user</th>"; 
   echo "<th>date_entered</th>";
   echo "<th>user_ip_address</th>";
   echo "</tr>"; 
   while($row = mysqli_fetch_array($result)){ 
   echo "<tr>"; 
   echo "<td>" . $row['result_id'] . "</td>"; 
 echo "<td>" . $row['polling_unit_uniqueid'] . "</td>"; 
  echo  "<td>" . $row['party_abbreviation'] . "</td>"; 
  echo "<td>" . $row['party_score'] . "</td>";
  echo "<td>" . $row['entered_by_user'] . "</td>";
  echo "<td>" . $row['date_entered'] . "</td>";
     echo "<td>" . $row['user_ip_address'] . "</td>";
     
   echo "</tr>"; } 
   echo "</table>"; 
   // Free result set
    mysqli_free_result($result); } else{ echo "No records matching your query were found."; } } else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn); } 
   // Close connection
     mysqli_close($conn);
     ?>
</body>
</html>