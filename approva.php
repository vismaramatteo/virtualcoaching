<?php
session_start();
	
	//stabilisco connessione col server
	$connection=mysqli_connect("localhost","root","");
	mysqli_select_db($connection,"my_virtualcoaching") or die ("Error");
	$user=$_SESSION['login_user']; 
	
	//salvo in 3 variabili ciò che passo nella funzione
	$IDEsercizio=$_GET["IDEsercizio"];
	$app=$_GET["app"];
	$nomeEsercizio=$_GET["nomeEsercizio"];
	
	if($app==1) //se l' esercizio è da approvare
	{
		$querypercentuale="SELECT * FROM `esercizio` INNER JOIN percentuale ON (esercizio.Percentuale=percentuale.IDPercentuale) 
						   WHERE `Ins`=1 AND '$IDEsercizio'=IDEsercizio";
		$result=mysqli_query($connection,$querypercentuale);
        $row=mysqli_fetch_array($result);
		$attacco=$row["Attacco"];
		$difesa=$row["Difesa"];
		$fondamentali=$row["Fondamentali"];
		$sport=$row["IDSport"];
		//Controllo a quale percentuale deve appartenere l'esercizio e di quale sport
		if($attacco>$difesa && $attacco>$fondamentali && $sport==1)
			$querynome="SELECT Nome FROM `esercizio` WHERE Nome LIKE '1-A%' order by Nome DESC limit 1";//calcio
		else if($difesa>$attacco && $difesa>$fondamentali && $sport==1)
			$querynome="SELECT Nome FROM `esercizio` WHERE Nome LIKE '1-D%' order by Nome DESC limit 1";
		else if($fondamentali>$attacco && $fondamentali>$difesa && $sport==1)
			$querynome="SELECT Nome FROM `esercizio` WHERE Nome LIKE '1-F%' order by Nome DESC limit 1";
			
		if($attacco>$difesa && $attacco>$fondamentali && $sport==2)
			$querynome="SELECT Nome FROM `esercizio` WHERE Nome LIKE '2-A%' order by Nome DESC limit 1";//basket
		else if($difesa>$attacco && $difesa>$fondamentali && $sport==2)
			$querynome="SELECT Nome FROM `esercizio` WHERE Nome LIKE '2-D%' order by Nome DESC limit 1";
		else if($fondamentali>$attacco && $fondamentali>$difesa && $sport==2)
			$querynome="SELECT Nome FROM `esercizio` WHERE Nome LIKE '2-F%' order by Nome DESC limit 1";
		
		//rinomino per inserire nel DB
		$result1=mysqli_query($connection,$querynome);
        $row1=mysqli_fetch_array($result1);
		
		$nome=$row1["Nome"];
		$exploso=explode("-",$nome);
		$exploso[2]=intval($exploso[2])+1;
		if($exploso[2]<10)
			$exploso[2]="000".$exploso[2];
		else if($exploso[2]<100)
			$exploso[2]="00".$exploso[2];
		else if($exploso[2]<1000)
			$exploso[2]="0".$exploso[2];
		else 
			$exploso[2]="".$exploso[2];
		
		$nome=implode ("-",$exploso);
		$link="/virtualcoaching/PDF/".$nome.".pdf";
		
		//Impost il flag Ins a 0 perchè non è più un esercizio da approvare
		$query="UPDATE `esercizio` SET `Ins`=0, `Nome`='$nome', `URL`='$link'  where '$IDEsercizio'=IDEsercizio";
		$result=$connection->query($query);
	}
	else if($app==2)//se l' esercizio nonè da approvare
	{
		//eseguo query per eliminarlo dal DB
		$query="DELETE FROM `esercizio` WHERE '$IDEsercizio'=IDEsercizio"; 
		$result=$connection->query($query);
	}
	
	//chiudo la connessione
	$connection->close();
?>
