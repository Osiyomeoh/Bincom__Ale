<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
<?php $db = mysqli_connect("localhost","root","","bincom_test"); 
if(!$db) { die("Connection failed: " . mysqli_connect_error()); } ?>
<?php // Using database connection file here

  $sql = "CREATE TABLE new_polling_unit( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  party_name VARCHAR(30) NOT NULL, 
  party_result VARCHAR(30) NOT NULL, email VARCHAR(70) NOT NULL UNIQUE )";
 
  


if(isset($_POST['submit'])) {		 $partyname = $_POST['partyname']; $party_result = $_POST['partyresult']; 
 $insert = mysqli_query($db,"INSERT INTO `new_polling_unit`(`partyname`, `partyresult`) VALUES ('$partyname','$party_result')");
  if(!$insert) { echo "Records added successfully."; } }
   mysqli_close($db); 
 // Close connection
  ?> <h3>Voting Result Submission</h3> <form method="POST"> Party Name: <input type="text" name="partyname" placeholder="Enter Party Name" Required> <br/> Party Result : <input type="number" name="partyresult" placeholder="Enter Party Result" Required> <br/> <input type="submit" name="submit" value="Submit"> </form> 
</body>
</html>