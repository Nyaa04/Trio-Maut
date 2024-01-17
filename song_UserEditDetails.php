<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="song_UserEditDetailsstyle.css">
    <title>Songs Collection</title>
</head>
<body>
<header>
    <h2 class="logo">Trio Maut</h2>
	        <nav class="navigation">
        <a href="menu.php">Home</a>
		<a href="viewSongAdmin.php">View Song</a>
        <a href="song_UserView.php" class="active">View User</a>
        </nav>

        <nav class="navigation1">
            <a href="logout.php">Log Out</a>
        </nav>
    </header>
<?php
session_start();
$UserID = $_POST["UserID"];
$host = "localhost";
$user = "root";
$pass = "";
$db = "trio-maut";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$queryGet = "SELECT * FROM users WHERE UserID = '" . $UserID . "' ";
$resultGet = $conn->query($queryGet);

if ($resultGet->num_rows > 0) {
    while ($baris = $resultGet->fetch_assoc()) {
        ?>
		<div class="wrapper">
            <h2>Songs Collection List</h2>
			<br>
            <p>Update user details</p>
			<br>
            <form action="song_UserEditSave.php" name="UpdateForm" method="POST">
                <label>User ID: <b><?php echo $baris['UserID']; ?></b></label>
				<br><br>
                <label>User Status:</label>
                <?php $UStatus = $baris['User_Status']; ?>
                <input type="radio" name="User_Status" value="Active" <?php echo ($UStatus == "Active") ? "checked" : ""; ?> required> Active
                <input type="radio" name="User_Status" value="Blocked" <?php echo ($UStatus == "Blocked") ? "checked" : ""; ?> required> Blocked
                <br><br>
                <input type="hidden" name="UserID" value="<?php echo $baris['UserID'] ?>">
                <input type="submit" value="Update New details" class="btn">
            </div>
			</form>
        </div>
        <?php
    }
    $conn->close();
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html> Login </a>";
}
?>
</body>
</html>