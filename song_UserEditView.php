<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="song_UserEditViewstyle.css">
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
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "trio-maut";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryView = "SELECT * FROM USERS WHERE UserType = 'User'";
        $resultQ = $conn->query($queryView);

        ?>

        <form action="song_UserEditDetails.php" method="post" onsubmit="return confirm('Are you sure to edit this record')">
            <div class="wrapper">
			<table border="1">
                <tr>
                    <th>Choose</th>
                    <th>User ID</th>
                    <th>User Status</th>
                </tr>

                <?php
                if ($resultQ->num_rows > 0) {
                    while ($row = $resultQ->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><input type="radio" name="UserID" value="<?php echo $row["UserID"]; ?>" required></td>
                            <td><?php echo $row["UserID"]; ?></td>
                            <td><?php echo $row["User_Status"]; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo '<tr><td colspan="3" style="color: red;">NO data selected</td></tr>';
                }
                }
                ?>
            </table>

            <br>

            <input type="submit" class="btn" value="View Record to Edit">
        </div>
		</form>
		

        <?php
        $conn->close();
        ?>

        <br>
    </div>

</body>
</html>