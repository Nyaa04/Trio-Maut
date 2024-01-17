<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="song_registerstyle.css"> 
    <title>Trio Maut - Songs Collection</title>
</head>

<?php
$Song_Title = $_POST["Song_Title"];
$Song_Artist = $_POST["Song_Artist"];
$Song_Audio = $_POST["Song_Audio"];
$Song_Genre = $_POST["Song_Genre"];
$Song_Language = $_POST["Song_Language"];
$Song_Date = $_POST["Song_Date"];
?>

<body> 
	  <header>
        <h2 class="logo">Trio Maut</h2>

        <nav class="navigation">
            <a href="menu.php">Home</a>
            <a href="song_form.php" class="active">Register Song</a>
            <a href="song_editview.php">Edit Song</a>
            <a href="song_deleteview.php">Delete Song</a>
            <a href="viewSong.php">View Song</a>
        </nav>

        <nav class="navigation1">
            <a href="logout.php">Log Out</a>
        </nav>
    </header>
	
<div class="wrapper">
<table border="1">
 <tr>
    <td>Song Title:</td>
    <th><?php echo $Song_Title;?></b></td>
 </tr>
 <tr>
    <td>Song Artist/Band:</td>
    <th><?php echo $Song_Artist;?></th>
 </tr>
 <tr>
    <td>Song Audio:</td>
	<th> <a href="<?php echo $Song_Audio;?>" target="_blank">Visit Link</a></th>
 </tr>
 <tr>
    <td>Song Genre:</td>
    <th><?php echo $Song_Genre;?></th>
 </tr>
 <tr>
    <td>Song Language:</td>
    <th><?php echo $Song_Language;?></th>
 </tr>
 <tr>
    <td>Song Date:</td>
    <th><?php echo $Song_Date;?></th>
 </tr>
</table>
<br>

<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "trio-maut";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error){
    die("MAYDAY MAYDAY, ERROR !".$conn->connect_error);
}
else 
{
    $DBquery = "INSERT INTO songs (Song_Title, Song_Artist, Song_Audio, Song_Genre, Song_Language, Song_Date, Owner_Id)
    VALUES ('".$Song_Title."' , '".$Song_Artist."' , '".$Song_Audio."' , '".$Song_Genre."' ,'".$Song_Language."' , '".$Song_Date."' , '".$_SESSION["UID"]."' )"; 
    if ($conn->query($DBquery) === TRUE) {
        echo "<p style='color:blue;'>Success insert record</p>";
    }
    else {
        echo "<p style='color:red;'> Fail to insert". $conn->error. "</p>";
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