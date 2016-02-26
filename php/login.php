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
$connection = mysql_connect("localhost", "root", "");
mysql_select_db("my_virtualcoaching",$connection);
// Tolgo i possibili / all'interno di username e password
$username = stripslashes($username);
$username = mysql_real_escape_string($username);
// Seleziono il database
// Query SQL che permette di controllare email e password con quelle all'interno del database
$query = mysql_query("select * from user where password='".md5($password)."' AND email='$username'");
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Inizializzo la sessione
header("location: ../index.php");  //richiamo il file index.php
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Chiudo la connessione
}

?>
