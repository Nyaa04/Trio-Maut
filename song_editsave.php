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
    <link rel="stylesheet" href="song_editsavestyle.css">
    <title>Trio Maut - Song Collection</title>
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
    <h3>Song UPDATE SAVE</h3>
	<br>

    <?php
    $Song_ID = $_POST["Song_ID"];
    $Song_Title = $_POST["Song_Title"];
    $Song_Artist = $_POST["Song_Artist"];
    $Song_Audio = $_POST["Song_Audio"];
    $Song_Genre = $_POST["Song_Genre"];
    $Song_Language = $_POST["Song_Language"];
    $Song_Date = $_POST["Song_Date"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "trio-maut";

    $conn = new mysqli($host, $user, $pass, $db);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryUpdate = "UPDATE songs SET
            Song_Title = '".$Song_Title."', Song_Artist = '".$Song_Artist."',
            Song_Audio = '".$Song_Audio."', Song_Genre = '".$Song_Genre."',
            Song_Language = '".$Song_Language."', Song_Date = '".$Song_Date."'
            WHERE Song_ID = '".$Song_ID."' ";

        if($conn->query($queryUpdate) === TRUE) {
            echo "Success updating data";
            echo "<br><br>";
            echo "Click <a href='viewSong.php'> here </a> to view the song list ";
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
