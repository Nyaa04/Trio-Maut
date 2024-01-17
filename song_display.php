<?php
session_start();
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html> 
<html> 
<head> 
 <title>Trio Maut - Song Collection </title> 
</head> 
 
<body> 
 <h2>Trio Maut Collection</h2> 
  
 <?php 

  
  $host = "localhost"; 
  $user = "root"; 
  $pass = ""; 
  $db = "trio-maut"; 
   
  $conn = new mysqli ($host, $user, $pass, $db); 
   
  if ($conn -> connect_error) { 
   die ("Connection Fail ". $conn -> connect_error); 
  } 
  else { 
   $queryview = "SELECT * FROM songs"; 
   $resultQ = $conn -> query($queryview); 
  } 
 ?> 
  
 <table border="2"> 
 <tr> 
  <th>Song ID</th> 
  <th>Song Title</th> 
  <th>Song Artist/Band</th> 
  <th>Song Audio/Video</th> 
  <th>Song Genre</th> 
  <th>Song Language</th> 
  <th>Song Date</th> 
  <th>Owner ID</th>  
 </tr> 
  
 <?php 
  if ($resultQ -> num_rows > 0) { 
   while ($row = $resultQ -> fetch_assoc()) { 
 ?> 
 <tr> 
  <td><?php echo $row["Song_ID"]; ?></td> 
  <td><?php echo $row["Song_Title"]; ?></td> 
  <td><?php echo $row["Song_Artist"]; ?></td> 
  <td><?php echo $row["Song_Audio"]; ?></td> 
  <td><?php echo $row["Song_Genre"]; ?></td>
  <td><?php echo $row["Song_Language"]; ?></td> 
  <td><?php echo $row["Song_Date"]; ?></td>  
  <td><?php echo $row["Owner_ID"]; ?></td> 
 </tr> 
 <?php 
  } 
  } else { 
   echo "<tr><td colspan='8'>No data selected </td></tr>"; 
  } 
 ?> 
 </table> 
  
 <?php 
  $conn -> close(); 
 ?> 
  
 <br> 

<p> Click <a href="pet_form.php">here</a> to Enter New Pet Details.</p> 
<p> Click <a href="pet_deleteview.php">here</a> to Delete Pet Details.</p>
<p> Click <a href="pet_editView.php">here </a> to Edit Pet List.</p>
<p> Click <a href="menu.php">here </a> back to Menu Page.</p> 
<br><br> 
</body> 
 
</html>
<?php
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>