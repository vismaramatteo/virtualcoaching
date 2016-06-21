<?php
session_start();
include ("JSON.php");
	
	//stabilisco connessione col server
	$connection=mysqli_connect("localhost","root","");
	mysqli_select_db($connection,"my_virtualcoaching") or die ("Error");
	$user=$_SESSION['login_user']; 
	
	//eseguo query per estrarre gli esercizi da approvare
	$query="select * from esercizio inner join percentuale on (esercizio.Percentuale=percentuale.IDPercentuale) where Ins=1";
	$result=$connection->query($query);
	
	//creo un array in cui inserisco i risultati della query
	$arr=array(); 
	while($row=$result->fetch_assoc())
	{
		$arr[]=$row;
	}
	
	//invio nel formato JSON
	$json = new Services_JSON();
	echo $json->encode($arr);
	
	//chiudo connessione
	$connection->close();
?>