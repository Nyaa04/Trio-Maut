<?php

$UserID = $_POST['ID'];
$UserPwd = $_POST['Pass'];

$host = "localhost";
$username = "root";
$password = "";
$dbname = "trio-maut";

$link = new mysqli($host, $username, $password, $dbname);
if ($link->connect_error)
{
    die("Connection Failed: " . $link->connect_error);
}
else
{
 $querycheck = "select * from USERS where UserID = '".$UserID."' ";
 $resultcheck = $link->query($querycheck);
 if ($resultcheck->num_rows == 0)
 {
    echo "<p style='color:blue;'>USER ID DOES NOT EXISTS </p>";
    echo "<br>Click <a href='login.html'> HERE </a> TO LOGIN AGAIN ";
 }
 else
 {
    $row = $resultcheck->fetch_assoc();
    $User_Status = $row["User_Status"]; // Assuming there is a 'UserStatus' column in your USERS table 
 
        if ($User_Status === 'Blocked') { 
            // Redirect to the blocked page 
            header("Location: blocked.php"); 
            exit(); 
        } else { 
            // Proceed with login logic 
            if ($row["UserPwd"] == $UserPwd) { 
                session_start(); 
                $_SESSION["UID"] = $UserID; 
                $_SESSION["UserType"] = $row["UserType"]; 
                header("Location: menu.php"); 
            } else { 
                echo "<p style='color:red;'>Wrong password!!! </p>"; 
                echo "Click <a href='login.html'> here </a> to login again "; 
            } 
        } 
    } 
} 
 
$link->close(); 
?>

