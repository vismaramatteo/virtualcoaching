<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "E-Mail o Password sono errati";
}
else
{
// Define $username and $password
$username=$_POST['email'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
mysqli_select_db($connection,"my_virtualcoaching") or die ("Error");

// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($username);
$password = mysqli_real_escape_string($password);
// Selecting Database
// SQL query to fetch information of registerd users and finds user match.

$query = "select * from user where password='$password' AND email='$username'");
$result=mysqli_query($query);
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: ../basket.php");
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}

?>
