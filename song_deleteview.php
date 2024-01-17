<?php
session_start();

// Check if the session exists
if (isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="song_deleteviewstyle.css">
	<title>Trio Maut - Songs Collection</title>
</head>
<body>
	  <header>
        <h2 class="logo">Delete Song</h2>

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

    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "trio-maut";

    $conn = new mysqli ($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryView = "SELECT * FROM SONGS WHERE Owner_ID = '" . $_SESSION["UID"] . "' AND Approval_Status = 'Approved'";
        $resultQ = $conn->query($queryView);
    }
    ?>

    <form action="song_delete.php" method="POST" onsubmit="return confirm('Are you sure to delete this record?')">
        <div class="wrapper">
		<table border="2">
            <tr>
                <th>Select</th>
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
            if ($resultQ->num_rows > 0) {
                while ($row = $resultQ->fetch_assoc()) {
            ?>
                    <tr>
                        <td><input type="radio" name="Song_ID" value="<?php echo $row["Song_ID"]; ?>" required></td>
                        <td><?php echo $row["Song_ID"]; ?></td>
                        <td><?php echo $row["Song_Title"]; ?></td>
                        <td><?php echo $row["Song_Artist"]; ?></td>
                        <td> <a href="<?php echo $row["Song_Audio"];?>" target="_blank">Visit Link</a></td>
                        <td><?php echo $row["Song_Genre"]; ?></td>
                        <td><?php echo $row["Song_Language"]; ?></td>
                        <td><?php echo $row["Song_Date"]; ?></td>
                        <td><?php echo $row["Owner_ID"]; ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='9'>No data selected </td></tr>";
            }
            ?>
        </table>
        <br>
        <input type="submit" class="btn" value="Delete Selected Record">
         </div>
    </form>

    <?php
    $conn->close();
    ?>

    <br><br>
</body>
</html>
<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html> Login </a>";
}
?>