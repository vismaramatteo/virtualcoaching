<?php
session_start();
	$eta=0;
	$result="";
	$eta=$_GET["a"];
	
	//stabilisco connessione col server
    $connection = mysqli_connect("localhost", "root", "");
	mysqli_select_db($connection, "my_virtualcoaching");
    
	//calcio a 5
	$query="";
	if($eta == "pulcini")
	{
		$query="SELECT IDSportCategoria FROM sportcat WHERE IDSportCategoria=1 "; 	
	}
	else if($eta == "esordienti")
	{
		$query="SELECT IDSportCategoria FROM sportcat WHERE IDSportCategoria=2 "; 
	}
	else if($eta == "giovanissimi")
	{
		$query="SELECT IDSportCategoria FROM sportcat WHERE IDSportCategoria=3 "; 
	}
	else if($eta == "allievi")
	{
		$query="SELECT IDSportCategoria FROM sportcat WHERE IDSportCategoria=4 "; 	
	}
	else if($eta == "juniores")
	{
		$query="SELECT IDSportCategoria FROM sportcat WHERE IDSportCategoria=5 "; 
	}
	
	$result=$connection->query($query);
	$row=$result->fetch_array();
    echo $row['IDSportCategoria'];
	
	$connection->close();

?>
