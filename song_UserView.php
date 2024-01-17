<?php
session_start();

// check if the session exists
if (isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="song_UserViewstyle.css"> 
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
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
        $searchCondition = "UserType = 'User' AND (UserID LIKE '%$searchTerm%' OR User_Status LIKE '%$searchTerm%')";

        $queryView = "SELECT * FROM USERS WHERE $searchCondition";
        $resultQ = $conn->query($queryView);
    }
    ?>
	<div class="wrapper">
   <form method="GET" action="song_UserView.php">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" placeholder="Enter User ID or User Status">
        <input type="submit" class="btn" value="Search">
    </form>

    <table>
        <tr>
            <th>User ID</th>
            <th>User Status</th>
        </tr>

        <?php
        if ($resultQ->num_rows > 0) {
            while ($row = $resultQ->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["UserID"]; ?></td>
                    <td><?php echo $row["User_Status"]; ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='2'>NO data selected</td></tr>";
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>

    <br>

    Click <a href="song_UserEditView.php">here</a> to EDIT user status.


</div>

</body>
</html>

<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html>Login</a>";
}
?>