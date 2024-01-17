<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="song_editdetailsstyle.css">
<title> Trio Maut - Song Collection </title>
</head>

<body>
  <header>
        <h2 class="logo">Edit Song</h2>

        <nav class="navigation">
            <a href="menu.php">Home</a>
            <a href="song_form.php">Register Song</a>
            <a href="song_editview.php" class="active">Edit Song</a>
            <a href="song_deleteview.php">Delete Song</a>
            <a href="viewSong.php">View Song</a>
        </nav>

        <nav class="navigation1">
            <a href="logout.php">Log Out</a>
        </nav>
    </header>
<div class="wrapper">
<p style="color:blue;font-weight:bold;"> Update song details </p>
<br>

<?php
$Song_ID =$_POST["Song_ID"];
$host = "localhost";
$user = "root";
$pass = "";
$db = "trio-maut";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 
else 
{
 
    $queryGet = "SELECT * FROM songs WHERE Song_ID = '".$Song_ID."' ";
    $resultGet = $conn->query($queryGet);
 
    if ($resultGet->num_rows > 0){
?>

<form action="song_editsave.php" name="UpdateForm" method="POST" >

<?php
    while ($baris = $resultGet->fetch_assoc()){
?>

Song ID: <b><?php echo $baris['Song_ID'];?></b>
<br><br>
Song Title:
<input type="text" name="Song_Title" value="<?php echo $baris['Song_Title'] ?>" maxlength="50" size ="35" required>
<br><br>
Song Artist: 
<input type="text" name="Song_Artist" value="<?php echo $baris['Song_Artist'] ?>" maxlength="50" size ="35" required>
<br><br>
Song Audio:
<input type="url" name="Song_Audio" placeholder="Enter URL or Audio File Path" value="<?php echo $baris['Song_Audio'] ?>" required>
<br><br>
Song Genre:
<input type="text" name="Song_Genre" value="<?php echo $baris['Song_Genre'] ?>" required>
<br><br>
Song Language:
<?php $Song_Language = $baris['Song_Language'];?>
   <select name="Song_Language" required>
   <option value=""> - Please choose - </option>
    <option value="English" <?php if($Song_Language == "English") echo "selected"; ?>> English </option>
    <option value="Malay" <?php if($Song_Language == "Malay") echo "selected"; ?>> Malay </option>
    <option value="Indonesian" <?php if($Song_Language == "Indonesian") echo "selected"; ?>> Indonesian </option>
    <option value="Chinese" <?php if($Song_Language == "Chinese") echo "selected"; ?>> Chinese </option>
    <option value="Hindi" <?php if($Song_Language == "Hindi") echo "selected"; ?>> Hindi </option>
    <option value="Japenese" <?php if($Song_Language == "Japenese") echo "selected"; ?>> Japenese </option>
    <option value="Korean" <?php if($Song_Language == "Korean") echo "selected"; ?>> Korean </option>
    <option value="Spanish" <?php if($Song_Language == "Spanish") echo "selected"; ?>> Spanish </option>
    <option value="Filipino" <?php if($Song_Language == "Filipino") echo "selected"; ?>> Filipino </option>
    <option value="Thai" <?php if($Song_Language == "Thai") echo "selected"; ?>> Thai </option>
    <option value="Russian" <?php if($Song_Language == "Russian") echo "selected"; ?>> Russian </option>
    <option value="Tamil" <?php if($Song_Language == "Tamil") echo "selected"; ?>> Tamil </option>
   </select>
   <br><br>
Song Date:
<input type="date" name="Song_Date" value="<?php echo $baris['Song_Date'] ?>" required>
<br><br>

<?php

?>
<br><br>
<input type="hidden" name="Song_ID" value="<?php echo $baris['Song_ID']?>">
<input type="submit" class="btn" value="Update New details">
</form>

<?php
}
}
}
$conn->close();
?>
</div>
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
