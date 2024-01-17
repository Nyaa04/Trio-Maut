<?php
session_start();

// Check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="song_editsaveAdminstyle.css">
    <title>Trio Maut - Song Collection</title>
</head>

<body>
<header>
    <h2 class="logo">Trio Maut</h2>
	        <nav class="navigation">
        <a href="menu.php">Home</a>
		<a href="viewSongAdmin.php" class="active">View Song</a>
        <a href="song_UserView.php">View User</a>
        </nav>

        <nav class="navigation1">
            <a href="logout.php">Log Out</a>
        </nav>
    </header>
	
	<div class="wrapper">
    <h3>Song UPDATE SAVE</h3>
	<br>

    <?php
    $Song_ID = $_POST["Song_ID"];
    $Approval_Status = $_POST["Approval_Status"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "trio-maut";

    $conn = new mysqli($host, $user, $pass, $db);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryUpdate = "UPDATE songs SET Approval_Status = '$Approval_Status' WHERE Song_ID = '$Song_ID'"; 

        if($conn->query($queryUpdate) === TRUE) {
            echo "Success updating data";
            echo "<br><br>";
            echo "Click <a href='viewSongAdmin.php'> here </a> to view the song list ";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $conn->close();
    ?>
</div>
</body>
</html>

<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html> Login </a>";
}
?>
