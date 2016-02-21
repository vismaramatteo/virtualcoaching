<?php
session_start();

	$slider=$_GET["a"];
	$slider2=$_GET["b"];
	$slider3=$_GET["c"];
	$IDCat=$_GET["d"];
	echo $slider." ".$slider2." ".$slider3." ".$IDCat;
	
	//stabilisco connessione col server
    $connection = mysqli_connect("localhost", "root", "");
	mysqli_select_db($connection, "my_virtualcoaching");
   
	$query="SELECT * from esercizio INNER JOIN percentuale on (esercizio.Percentuale=Percentuale.IDPercentuale)
	where Attacco>=($slider-10) and Attacco<=($slider+10) AND Difesa>=($slider2-10) and Difesa<=($slider2+10) AND Fondamentali>=($slider3-10) and Fondamentali<=($slider3+10)";
	 
	$result=$connection->query($query);
	$row=$result->fetch_array();
  //  echo $row['IDSportCategoria'];
	
	
	$connection->close();

?>
