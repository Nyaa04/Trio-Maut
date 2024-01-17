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
    <link rel="stylesheet" href="song_deletestyle.css"> 
<title>Trio Maut - Song Collection </title> 
</head>
<?php
$myId = $_POST["Song_ID"];
?>

<body>
  <header>
        <h2 class="logo">Edit Song</h2>

        <nav class="navigation">
            <a href="menu.php">Home</a>
            <a href="song_form.php">Register Song</a>
            <a href="song_editview.php">Edit Song</a>
            <a href="song_deleteview.php" class="active">Delete Song</a>
            <a href="viewSong.php">View Song</a>
        </nav>

        <nav class="navigation1">
            <a href="logout.php">Log Out</a>
        </nav>
    </header>
<nav class="wrapper">
<?php
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "trio-maut";

$conn = new mysqli ($host, $user, $pass, $db);

if ($conn -> connect_error) { //to check if DB connection IS NOT OK
    die("Connection failed: " . $conn->connect_error); // display MySQL error
}

else
{
    //connection OK - delete records from a database table
    $deleteQuery = "DELETE FROM  songs WHERE Song_ID = '".$myId."'";

    if ($conn->query($deleteQuery) === TRUE)
    {
        echo "<p style='color:blue;'> Record has been delete from database !</p>";
        echo "Click <a href= viewSong.php > here </a> to view PET list ";
    }
    else
    {
        echo "<p style='color:red;'>Query problems! : " . $conn->error . "</p>"; 
    }
    $conn->close();
}
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

