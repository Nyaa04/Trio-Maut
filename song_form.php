<!DOCTYPE HTML>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="song_formstyle.css">
    <title> Trio Maut Collection </title>
</head>

<body>

<?php
    session_start();

    if (isset($_SESSION["UID"])) {
?>

<header>
    <h1 class="logo">Song Registration Form</h1>

    <nav class="navigation">
        <a href="menu.php">Home</a>
        <a href="song_form.php" class="active">Register Song</a>
        <a href="song_editview.php">Edit Song</a>  
        <a href="song_deleteview.php">Delete Song</a>
        <a href="viewSong.php">View Song</a>
    </nav>

    <nav class="navigation1">
        <a href="logout.php">Log Out</a>
    </nav>
</header>

<div class="wrapper">
    <form name="registerForm" method="POST" action="song_register.php">
        <h2>Enter Song details:</h2>
        <br>
        <div class="input-box">
            Song Title : <input type="text" name="Song_Title"  maxlength="50" required><br><br>
            Song Artist/Band : <input type="text" name="Song_Artist" maxlength="50" required><br><br>
            Song Audio/Video: <input type="url" name="Song_Audio" placeholder="Enter URL or Audio File Path" size="50" required><br><br>
            Song Genre : <input type="text" name="Song_Genre" required><br><br>
            Song Language : <select name="Song_Language" required>
                <option value="" disabled selected>-PLEASE CHOOSE-</option>
                <option value="English">English</option>
                <option value="Malay">Malay</option>
                <option value="Indonesian">Indonesian</option>
                <option value="Chinese">Chinese</option>
                <option value="Hindi">Hindi</option>
                <option value="Japanese">Japanese</option>
                <option value="Korean">Korean</option>
                <option value="Spanish">Spanish</option>
                <option value="Filipino">Filipino</option>
                <option value="Thai">Thai</option>
                <option value="Russian">Russian</option>
                <option value="Tamil">Tamil</option>
            </select><br><br>
            Song Date : <input type="date" name="Song_Date" required><br><br>
        </div>

        <input type="submit" class="btn" value="Register This Song">
        <br><br>
        <input type="reset" class="btn" value="Refill">

    </form>
</div>

<?php
    } else {
        echo "No session exists or session has expired. Please log in again.<br>";
        echo "<a href='login.html'> Login </a>";
    }
?>

</body>
</html>
