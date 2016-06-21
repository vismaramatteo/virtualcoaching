<?php
session_start(); 
if(!isset($_SESSION['login_user']))
	{
	session_destroy(); 
	header("location: index.php");
	}
?>
<html>
<head>
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 	<link rel="import" href="header.html">   
	<link href="css/stylec.css" rel="stylesheet">
	<link href="css/defaultc.css" rel="stylesheet">
	<link href="css/admin.css" rel="stylesheet">
	<script src="js/jsonfn.js"></script> 
	
	<script>
		$(document).ready(function(){	
			funzione2(); //ogni volta che viene caricato il documento eseguo la funzione2()
		});
		
			function _ok(val,val2,val3) //approva l' esercizio
			{
				$.get("php/approva.php",{"IDEsercizio":val,"app":val2,"nomeEsercizio":val3},function(data){
					funzione2() ;
				});
			}
			function _nook(val,val2) //non approva l' esercizio
			{
				$.get("php/approva.php",{"IDEsercizio":val,"app":val2},function(data){
					funzione2();
				});
			}
		
			function funzione2() //crea una tabella dinamica e la popola con i valori passatigli dalla pagina QueryAdmin.php
			{
				$.get("php/QueryAdmin.php",function(data){
					var arr=JSONfn.parse(data);
					$("#tabEserciziApp tbody").html("");			
					for(var k in arr)
					{						
						var v3=document.createElement('tr');
						var v4=document.createElement('th');						
						$(v4).append("<center>"+arr[k]["Nome"]+"</center>");
						$(v3).append(v4);
												
						var v41=document.createElement('th');
						$(v41).append("<center>"+arr[k]["Attacco"]+"</center>");
						$(v3).append(v41);
						
						var v42=document.createElement('th');
						$(v42).append("<center>"+arr[k]["Difesa"]+"</center>");
						$(v3).append(v42);
						
						var v43=document.createElement('th');
						$(v43).append("<center>"+arr[k]["Fondamentali"]+"</center>");
						$(v3).append(v43);
						
						var v44=document.createElement('th');
						$(v44).append("<center>"+arr[k]["Descrizione"]+"</center>");
						$(v3).append(v44);	
						
						var v45=document.createElement('th');
						$(v45).append("<center><button class=\"btn btn-info\"><a style=\"color:white\" href=\""+arr[k]["URL"]+"\">APRI</a></button></center>");
						$(v3).append(v45);	
						
						var v46=document.createElement('th');
						var ID=arr[k]["IDEsercizio"];
						$(v46).append("<img onclick=\"_nook('"+ID+"',2);\" id=\"nook\" src=\"/VirtualCoaching/img/nook.png\"><img onclick=\"_ok('"+ID+"',1,$('#nEs').val());\" id=\"ok\" src=\"/VirtualCoaching/img/ok.png\">");
						$(v3).append(v46);
						
						$("#tabEserciziApp tbody").append(v3);	
					}						
				});
			}
		
	</script>
</head>

<body style="background-color:#201818">	
	<section id="section" class="home-section text-center">
	    <div class="logo">
			<a href="index.php"><img height="45" width="350" src="img/LOGO.png"></a>
			<br><br>
		</div>
		<div class="container">				
			<div class="row setup-content step hiddenStepInfo activeStepInfo" id="div1">
				<div class="col-xs-12">
					<div class="col-md-12 well text-center">
						<h1>ESERCIZI DA APPROVARE</h1>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-condensed" id="tabEserciziApp" style="background-color:white">
								<thead>
								  <tr class="danger">
									<th><center>USER</center></th>
									<th><center>ATTACCO</center></th>
									<th><center>DIFESA</center></th>
									<th><center>FONDAMENTALI</center></th>
									<th><center>DESCRIZIONE</center></th>
									<th><center>LINK</center></th>
									<th><center>APPROVARE</center></th>
								  </tr>
								</thead>
								<tbody>

								</tbody>			
								
							</table>
						</div>
					</div>
				</div>
			</div>				
		</div>
	</section>

</body>
</html>	
