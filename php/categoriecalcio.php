<?php
session_start();

	$eta=$_GET["eta"];
	
	//stabilisco connessione col server
    $connection = mysql_connect("localhost", "virtualcoaching", "");
	mysql_select_db("my_virtualcoaching",$connection);
    
	//calcio a 5
	if($eta == "pulcini")
	{
		$query=mysql_query("SELECT IDSportCategoria FROM sportcat WHERE IDSportCategoria=1 "); 
		$result=mysql_query($query);
	}
	else if($eta == "esordienti")
	{
		$query=mysql_query("SELECT IDSportCategoria FROM sportcat WHERE IDSportCategoria=2 "); 
		$result=mysql_query($query);
	}
	else if($eta == "giovanissimi")
	{
		$query=mysql_query("SELECT IDSportCategoria FROM sportcat WHERE IDSportCategoria=3 "); 
		$result=mysql_query($query);
	}
	else if($eta == "allievi")
	{
		$query=mysql_query("SELECT IDSportCategoria FROM sportcat WHERE IDSportCategoria=4 ");
		$result=mysql_query($query);		
	}
	else if($eta == "juniores")
	{
		$query=mysql_query("SELECT IDSportCategoria FROM sportcat WHERE IDSportCategoria=5 "); 
		$result=mysql_query($query);
	}
		
	$row=mysql_fetch_array($query);
    echo $row['IDSportCategoria'];
	
	mysql_close($connection);

?>
