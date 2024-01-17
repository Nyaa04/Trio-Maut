<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="song_UserEditSavestyle.css">
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
// check if session exists
if (isset($_SESSION["UID"])) {
    $UserID = $_POST["UserID"];
    $User_Status = $_POST["User_Status"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "trio-maut";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryUpdate = "UPDATE users SET User_Status = '".$User_Status."' WHERE UserID = '".$UserID."'";

        if ($conn->query($queryUpdate) === TRUE) {
            ?>
            <div class="wrapper">
                <h3>Success update data</h3>
                <br><br>
                Click <a href='Song_UserView.php'> here </a> to view user list.
            </div>
            <?php
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    $conn->close();
} else {
    ?>
    <div class="update-save-container">
        No session exists or session has expired. Please log in again.<br>
        <a href="login.html"> Login </a>
    </div>
    <?php
}
?>
</body>
</html>