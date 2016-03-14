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
$connection = mysqli_connect("localhost", "root", "");
mysqli_select_db($connection,"my_virtualcoaching");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$username = $connection->real_escape_string($username);
// Selecting Database
// SQL query to fetch information of registerd users and finds user match.
$query = $connection->query("select * from user where password='".md5($password)."' AND email='$username'");
$rows = $query->num_rows;
echo md5($password);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: ../calcio.php");

} else {
$error = "Username or Password is invalid";
echo $error;
}
mysqli_close($connection); // Closing Connection
}

?>
