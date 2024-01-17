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
	
 <!-- Search Form -->
 <div class="wrapper">
 <form method="GET" action="viewSongAdmin.php">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" placeholder="Enter Song Title or Artist">
        <input type="submit" class="btn" value="Search">
    </form

    <?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "trio-maut";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection Fail " . $conn->connect_error);
    } else {
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : ''; 
 
        $queryView = "SELECT * FROM SONGS WHERE  
                        Song_Title LIKE '%$searchTerm%' OR 
                        Song_Artist LIKE '%$searchTerm%' 
						ORDER BY Song_Title ASC";
        $resultQ = $conn->query($queryView);
		
    }
    ?>
    <br><br>
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
            <th>Status</th>
        </tr>


        <?php
        if ($resultQ->num_rows > 0) {
            while ($row = $resultQ->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["Song_ID"]; ?></td>
                    <td><?php echo $row["Song_Title"]; ?></td>
                    <td><?php echo $row["Song_Artist"]; ?></td>
                    <td> <a href="<?php echo $row["Song_Audio"]; ?>" target="_blank">Visit Link</a></td>
                    <td><?php echo $row["Song_Genre"]; ?></td>
                    <td><?php echo $row["Song_Language"]; ?></td>
                    <td><?php echo $row["Song_Date"]; ?></td>
                    <td><?php echo $row["Owner_ID"]; ?></td>
                    <td><?php echo $row["Approval_Status"];?> </td>
                </tr>
            <?php
            }
        } else {
            echo "<tr><td colspan='9'>No data selected </td></tr>";
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
	<br>
	<p>Click<a href="song_editviewAdmin" class="butang"> here </a>to Edit Song Status.</p>
</div>
</body>

</html>
<?php
} else {
    echo "No session exists or session has expired. Please
   log in again.<br>";
    echo "<a href=login.html> Login </a>";
}
?>
