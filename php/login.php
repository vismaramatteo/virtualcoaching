<?php
session_start(); // inizio sessione
$error=''; // Errore se e-mail / password sono sbagliati
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "E-Mail o Password sono errati";
}
else
{
// Definisco $username e $password prendendoli dalla pagina html tramite il metodo POST
$username=$_POST['email'];
$password=$_POST['password'];
// Stabilizzo la connessione col server passandogli come parametri il nome del server, l'id e la password
$connection = mysqli_connect("localhost", "root", "");
mysqli_select_db($connection,"my_virtualcoaching");
// Tolgo i possibili / all'interno di username e password
$username = stripslashes($username);
$username = $connection->real_escape_string($username);
// Seleziono il database
// Query SQL che permette di controllare email e password con quelle all'interno del database
$query = $connection->query("select * from user where password='".md5($password)."' AND email='$username'");
$rows = $query->num_rows;
echo md5($password);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Inizializzo la sessione
header("location: ../index.php");  //richiamo il file index.php

} else {
$error = "Username or Password is invalid";
echo $error;
}
mysqli_close($connection); // Chiudo la connessione
}

?>
