<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="song_editdetailsAdminstyle.css">
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
    <p style="color:#359381;font-weight:bold;">UPDATE SONG DETAILS</p>
	<br>

    <?php
    $Song_ID = $_POST["Song_ID"];
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "trio-maut";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryGet = "SELECT * FROM songs WHERE Song_ID = '".$Song_ID."' ";
        $resultGet = $conn->query($queryGet);

        if ($resultGet->num_rows > 0) {
            ?>
            <form action="song_editsaveAdmin.php" name="UpdateForm" method="POST">
            <?php
            while ($baris = $resultGet->fetch_assoc()) {
            ?>
                Song ID: <b><?php echo $baris['Song_ID']; ?></b><br><br>
                Song Title: <?php echo $baris['Song_Title']; ?><br><br>
                Song Artist: <?php echo $baris['Song_Artist']; ?><br><br>
                Song Url: <a href=<?php echo $baris['Song_Audio'];?> target="_blank"><?php echo $baris['Song_Audio'];?></a><br><br>
                Song Genre: <?php echo $baris['Song_Genre']; ?><br><br>
                Song Language: <?php echo $baris['Song_Language']; ?><br><br>
                Song Date: <?php echo $baris['Song_Date']; ?><br><br>
                Song Status:
                <?php $AAStatus = $baris['Approval_Status']; ?>
                <input type="radio" name="Approval_Status" value="Pending" <?php if ($AAStatus == "Pending") echo "checked"; ?> required> Pending
                <input type="radio" name="Approval_Status" value="Approved" <?php if ($AAStatus == "Approved") echo "checked"; ?> required> Approved
                <input type="radio" name="Approval_Status" value="Rejected" <?php if ($AAStatus == "Rejected") echo "checked"; ?> required> Rejected
                <br><br>
                <input type="hidden" name="Song_ID" value="<?php echo $baris['Song_ID']; ?>">
                <input type="submit" class="btn" value="Update Song Details">
            <?php
            }
            ?>
            </form>
        <?php
        } else {
            echo "<p>No data selected</p>";
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
    echo "<a href=login.html>Login</a>";
}
?>
