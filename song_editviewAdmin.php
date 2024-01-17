<?php
session_start();
if (isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="viewSongAdminstyle.css"> 
    <title>Trio Maut - Songs Collection </title>
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

    <?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "trio-maut";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection Fail " . $conn->connect_error);
    } else {
        $queryview = "SELECT * FROM songs";
        $resultQ = $conn->query($queryview);
    }

    ?>
    <div class="wrapper">
    <form action="song_editdetailsAdmin.php" method="POST">
        <table border="2">
            <tr>
                <th>Choose</th>
                <th>Song ID</th>
                <th>Song Title</th>
                <th>Song Artist/Band</th>
                <th>Song Audio/Video</th>
                <th>Song Genre</th>
                <th>Song Language</th>
                <th>Song Date</th>
                <th>Owner ID</th>
                <th>Status</th>
            </tr>

            <?php
            if ($resultQ->num_rows > 0) {
                while ($row = $resultQ->fetch_assoc()) {
            ?>
                    <tr>
                        <td> <input type="radio" name="Song_ID" value="<?php echo $row["Song_ID"]; ?>" required> </td>
                        <td><?php echo $row["Song_ID"]; ?></td>
                        <td><?php echo $row["Song_Title"]; ?></td>
                        <td><?php echo $row["Song_Artist"]; ?></td>
                        <td> <a href="<?php echo $row["Song_Audio"]; ?>" target="_blank">Visit Link</a></td>
                        <td><?php echo $row["Song_Genre"]; ?></td>
                        <td><?php echo $row["Song_Language"]; ?></td>
                        <td><?php echo $row["Song_Date"]; ?></td>
                        <td><?php echo $row["Owner_ID"]; ?></td>
                        <td><?php echo $row["Approval_Status"]; ?></td>
                        
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='9'>No data selected </td></tr>";
            }
            ?>
        </table>
        <br>
        <input type="submit" class="btn" value="Edit">
    </div>
	</form>

    <?php
    $conn->close();
    ?>

</body>

</html>
<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html>Login</a>";
}
?>
