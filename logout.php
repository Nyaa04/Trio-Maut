<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
         body{
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 min-height: 100vh;
	 background: url('pokok.jpg') no-repeat;
	 background-size: cover;
	 background-position: center;
 }

        main {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        p {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #007bff;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<main>
    <?php
    session_start();
    if (isset($_SESSION["UID"])) {
        session_unset();
        session_destroy();

        echo "<p style='color:#dc3545;'>You have successfully logged out.</p>";
        echo "<p><a href='login.html'>LOGIN BACK</a></p>";
    } else {
        echo "<p style='color:#28a745;'>No session exists or the session has expired. Please log in again.</p>";
        echo "<p><a href='login.html'>LOGIN BACK</a></p>";
    }
    ?>
</main>

</body>
</html>
