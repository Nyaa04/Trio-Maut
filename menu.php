<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Trio Maut Collection</title>
    <link rel="stylesheet" href="menustyle.css">
</head>

<body>

<?php
    session_start();

    if (isset($_SESSION["UID"])) {
?>

<header>
    <h2 class="logo">Trio Maut</h2>
    
        <nav class="navigation">
		<?php
    if ($_SESSION["UserType"] == "Admin") {
    ?>
        <a href="menu.php" class="active">Home</a>
		<a href="viewSongAdmin.php">View Song</a>
        <a href="song_UserView.php">View User</a>
    <?php
    } else {
    ?>
            <a href="test.html" class="active">Home</a>
            <a href="song_form.php">Register Song</a>
            <a href="song_editview.php">Edit Song</a>
            <a href="song_deleteview.php">Delete Song</a>
            <a href="viewSong.php">View Song</a>
			<a href="about.html">About</a>
        </nav>
		
        <nav class="navigation1">
    <?php
    }
    ?>
    <a href="logout.php">Log Out</a>
    </nav>
</header>

<section class="parallax1">
    <h3 id="text1">Welcome, <?php echo $_SESSION["UID"]; ?> to :</h3>
</section>

<section class="parallax">
    <img src="Hill1.png" id="hill1">
    <img src="Hill2.png" id="hill2">
    <img src="Hill3.png" id="hill3">
    <img src="Hill4.png" id="hill4">
    <img src="Hill5.png" id="hill5">
    <img src="tree.png" id="tree">
    <h2 id="text">Song Collection</h2>
    <img src="plant.png" id="plant">
</section>

<section class="sec">
    <h2> Trio Maut Song Collection</h2>
    <p>
        In the vast and dynamic realm of music, where melodies weave stories and rhythms resonate with emotions, the need for an organized and intuitive system to curate and explore musical treasures is paramount. Enter "Trio Maut," a revolutionary song collection system designed to transform your music experience into a harmonious journey.<br><br>
        Imagine a world where your favorite tunes are seamlessly organized, easily accessible, and beautifully presented in a digital symphony that reflects your unique taste. "Trio Maut" is not just a song collection system; it is an immersive platform that caters to the needs of music enthusiasts, helping them discover, curate, and relish the artistry of sound.<br><br>
        With an intelligent and user-friendly interface, "Trio Maut" allows you to effortlessly navigate through your extensive music library. Gone are the days of searching endlessly for that one perfect song; our system employs cutting-edge technology to provide personalized recommendations based on your preferences, ensuring a musical journey that resonates with your soul.<br><br>
    </p>
</section>
<script src="script.js"></script>

<?php
    } else {
        echo "No session exists or session has expired. Please log in again.<br>";
        echo "<a href='login.html'> Login </a>";
    }
?>
</body>
</html>
