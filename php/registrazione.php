<?php
session_start();

$nome=$_POST['name'];
$cognome=$_POST['surname'];
$telefono=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];
$sport=$_POST['sport'];
$md5pass=md5($password);
//STABILIRE CONNESSIONE CON IL SERVER

$connection=mysql_connect("localhost","root", "");
mysql_select_db("my_virtualcoaching",$connection) or die ("Error");

//PROTEZIONE DATI
$query="SELECT Password FROM `user`";
$result=mysql_query($query);

if($sport=="calcio")
{
	$query="INSERT INTO `user` (`Name`,`Surname`,`telefono`,`Email`,`Password`,`Sportscelto`) VALUES ('$nome','$cognome','$telefono','$email','$md5pass','$sport')";
	$result=mysql_query($query);
}

if($sport=="basket")
{
	$query="INSERT INTO `user` (`Name`,`Surname`,`telefono`,`Email`,`Password`,`Sportscelto`) VALUES ('$nome','$cognome','$telefono','$email','$md5pass','$sport')";
	$result=mysql_query($query);
}


if(isset($nome,$cognome,$email,$telefono,$password,$sport)){
    $destinatario = ".$email.";//
	$oggetto="Registrazione VIRTUALCOACHING";
    $intestazione = "Da: virtualcoaching97@gmail.com \r\n";      
    $messaggio = "\nCiao ".$nome."!
	\nGrazie per esserti registrato su virtualcoaching.altervista.org.\"\n
	Questi sono i tuoi dati per l'accesso al nostro sito:\n
	e-mail:".$email."\n
	password:".$password."\n
	D'ora in poi potrai accedere al sito e ricercare gli esercizi da te voluti!
	visit us: www.virtualcoaching.altervista.org";      
     
    mail($destinatario, $oggetto, $messaggio, $intestazione);
     
    echo "<p class='success'>Messaggio inviato con successo!</p>";
}
else{
    echo "<p class='error'>".$error."</p>";
}

header("location: ../index.php");
mysql_close($connection);

?>
