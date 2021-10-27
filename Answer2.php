<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
<div>
 <form>
  LGA:
  <div>
  <select> 
     <option disabled selected>-- Select LGA --</option>

  <?php 
$conn = new mysqli('localhost', 'root', '', 'bincom_test');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
// Using database connection file here
 $records = mysqli_query($conn, "SELECT lga_name From lga"); 
 // Use select query here
  while($data = mysqli_fetch_array($records)) 
  { echo "<option value='". $data['lga_name'] ."'>" .$data['lga_name'] ."</option>"; }
  ?>
  // displaying data in option menu?>
  <div>
        </div>
   </form>
  </div>
</select> 
   <div>
  <form>
  POLL:
  <div>
  <select> 
     <option disabled selected>--[POLLING UNIT] --</option>
     <?php

$record = mysqli_query($conn, "SELECT polling_unit_name From polling_unit"); 
 // Use select query here
  while($data = mysqli_fetch_array($record)) 
  { echo "<option value='". $data['polling_unit_name'] ."'>" .$data['polling_unit_name'] ."</option>"; }
  // displaying data in option menu
  ?>
  </div>
 </form>
  </div>
  </select>
  <div>
  <form>
  TOTAL RESUIT:
  <?php 

// Using database connection file here
 $sql ="
 SELECT party_abbreviation, SUM(party_score) FROM announced_pu_results GROUP BY party_abbreviation";
 // Use select query here
  
 //display data on web page
 if($result = mysqli_query($conn, $sql)){ if(mysqli_num_rows($result) > 0){ 
 echo "<table>"; 
 echo "<tr>";
  echo "<th>party_abbreviation</th>";
   echo "<th>SUM(party_score)</th>"; 
 
   echo "</tr>"; }
   while($row = mysqli_fetch_array($result)){ 
   echo "<tr>"; 
   echo "<td>" . $row['party_abbreviation'] . "</td>"; 
 echo "<td>" . $row['SUM(party_score)'] . "</td>"; 
  
   
   echo "</tr>"; } 
   echo "</table>"; }?>


   </div>
 </form>
  
</body>
</html> 
 