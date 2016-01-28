<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ../basket.php"); // Redirecting To Home Page
}
?>