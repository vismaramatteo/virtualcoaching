<?php
session_start(); 
if(!isset($_SESSION['login_user']))
	session_destroy();  
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
	<link rel="manifest" href="img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VIRTUAL COACHING</title>

    <!-- CSS -->
	
	<!--SLIDER-->
    <link rel="stylesheet" href="css/jquery-ui.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/slider.css">
	
	<!--FONTS-->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
	
	<!--ANIMAZIONI-->
	<link href="css/animate.css" rel="stylesheet" />

	<!--STILI PAGINA-->
    <link href="css/stylec.css" rel="stylesheet">
	<link href="css/defaultc.css" rel="stylesheet">
	<link href="css/stepbar.css" rel="stylesheet">	
	<link href="css/login.css" rel="stylesheet">

    <!-- JAVASCRIPT -->
	
	<!--SLIDER-->
	<script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/login.js"></script>
    <script src="js/funzionamentoslider.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/cookies.js"></script>
   	<script src="js/stepbar.js" type="text/javascript"></script>			
	<script src="js/jsonfn.js"></script>

		<script>
			var IDCateg=-1;
			function funzione(val) 
			{
				$.get("php/categoriecalcio.php",{"a":val},function(data){
					IDCateg=data;
					alert(data);
				});
			};
			
		function funzione2(val1,val2,val3) 
			{
				$.get("php/slider.php",{"a":val1,"b":val2,"c":val3,"d":IDCateg},function(data){
					
					
					var arr=JSONfn.parse(data);
										
					for(var k in arr)
					{						
						var v3=document.createElement('TR');
						var v4=document.createElement('th');
						$(v4).append("<center>"+arr[k]["Nome"]+"</center>");
						$(v3).append(v4);
						
						var v41=document.createElement('th');
						$(v41).append("<center>"+val1+"</center>");
						$(v3).append(v41);
						
						var v42=document.createElement('th');
						$(v42).append("<center>"+val2+"</center>");
						$(v3).append(v42);
						
						var v43=document.createElement('th');
						$(v43).append("<center>"+val3+"</center>");
						$(v3).append(v43);
						
						var v44=document.createElement('th');
						$(v44).append("<center>"+arr[k]["Descrizione"]+"</center>");
						$(v3).append(v44);	
						
						var v45=document.createElement('th');
						$(v45).append("<center><button class=\"btn btn-info\"><a href=\""+arr[k]["URL"]+"\">APRI</a></button></center>");
						$(v3).append(v45);	

						
						$("#TabellaInclusione thead").append(v3);
								
						
					}
					/*
						alert(arr[k]["IDEsercizio"]);
						alert(arr[k]["Nome"]);
						alert(arr[k]["IDSportCategoria"]);
						alert(arr[k]["Percentuale"]);
						alert(arr[k]["Descrizione"]);
						alert(arr[k]["URL"]);
						*/
					
					


					

																
				});
			}
		</script>
	
</head>



<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">
                    <div class="logo">
						<img height="35" width="280" src="img/LOGO.png"> 
					</div>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
    <ul class="nav navbar-nav" style="background-color:white">
        <li class="active"><a href="/virtualcoaching/index.php">Home</a></li>
          <li id="ultimo"><a href="/virtualcoaching/basket.php">Basket</a></li>
			<li class="dropdown">
				<?php 
                    if(!isset($_SESSION['login_user']))
                    echo ' <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                   
                    <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                              
                                 <form class="form"  method="POST" action="/virtualcoaching/php/login.php" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="email">E-Mail</label>
                                       <input type="email" name="email" class="form-control" id="email" placeholder="Indirizzo E-Mail" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="password">Password</label>
                                       <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                    
									<a  href="index.php"
									style="color: #000000; background-color:#fff">
                                    PASSWORD DIMENTICATA? </a>
									<br><br>
									
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-success btn-block">Accedi</button>
                                    </div>
                                    	
                                 </form> 
                                 <button href="#" onclick="$(&#39#example-popup&#39).show()" data-popup-target="#example-popup" class="btn btn-primary btn-block">Registrati</button>
                                 </div>
                              
                           </div>
                            </li>	
	  						</ul>';
                                 else
                                 	echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$_SESSION['login_user'].'<b class="caret"></b></a>
                                     <ul class="dropdown-menu" style="padding: 15px;min-width: 340px;">
                        <li>
                        	<form>
								<div class="row">
									<div class="col-md-12">
										<div style="margin: 0 auto;">
											<center>
												<img class="fotorotonda" src="/virtualcoaching/img/utente.png"> &nbsp;&nbsp;
												<strong> Ciao '.$_SESSION['login_user'].' </strong>
											</center>
										</div>
										<br>
									</div>
																									
									<div class="col-md-12">
										<a style="float:left" id="aggiornadati" href="/virtualcoaching/aggiornadati.php">Aggiorna dati</a>
										<a style="float:right" id="logout" href="/virtualcoaching//php/logout.php">Logout</a>
									</div>
								  
								</div>
                            </form>
                        </li>	
					</ul>
                   ';
                                 ?>                      
        </li>
	  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2><span class="text_color">CALCIO</span> </h2>
		</div>
		
		<div class="page-scroll">
		<br><br><br><br><br><br>
			<a href="#sport" class="btn btn-circle" style="background-color:white">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->
	
<!-- Section: sport -->
	<section id="sport" class="home-section text-center">
		<div class="container">		
			<br><br><br>
			<div class="wow bounceInDown" data-wow-delay="0.4s">
				<div class="section-heading">
					<h2>Ricerca Esercizio</h2>
					<i class="fa fa-2x fa-angle-down"></i>
				</div>
			</div>	
				<div class="row setup-content step activeStepInfo" id="step-1">
					<div class="col-xs-12">
						<div>
                          <div class="col-md-12 well text-center">
                              <h1>Categoria</h1>
                                      <center>						
                                          <select id="eta" name="eta" style="height:30px; width:250px">
                                              <option value="pulcini">U 11 - PULCINI</option>
                                              <option value="esordienti">U 13 - ESORDIENTI</option>
                                              <option value="giovanissimi">U 15 - GIOVANISSIMI</option>
                                              <option value="allievi">U 17 - ALLIEVI</option>
                                              <option value="juniores">U 20 - JUNIORES</option>
                                          </select>
                                          <br>	
                                      </center>
                                      <button class="btn-cat" onclick="javascript: resetActive(event, 66, 'step-2'); funzione($('#eta').val());" style="float:right">Avanti</button>
                                
                          </div>
						</div>
					</div>
				</div>
				
				<div class="row setup-content step hiddenStepInfo" id="step-2">
					<div class="col-xs-12">
						<div class="col-md-12 well text-center">
							<h1>Ruolo</h1>
							
									<div class="price-slider">
										<h4 class="great">Attacco</h4>
										<div class="col-sm-12">
											<div id="slider" name="slider"></div>
										</div>
									</div>
												
									<div class="price-slider">
										<h4 class="great">Difesa</h4>
										<div class="col-sm-12">
											<div id="slider2" name="slider2"></div>
										</div>
									</div>
												
									<div class="price-slider">
										<h4 class="great">Fondamentali</h4>
										<div class="col-sm-12">
											<div id="slider3" name="slider3"></div>
										</div>
									</div>

											<label for="amount" class="col-sm-4 ">Attacco: </label>
											<label for="duration" class="col-sm-4 ">Difesa: </label>
											<label for="fondamentali" class="col-sm-4 ">Fondamentali: </label>
											
											<div class="col-sm-4">
												<input type="hidden" id="amount" name="amount" class="form-control">
												<p class="price lead" id="amount-label"></p>
												<span class="price">%</span>
											</div>
																					
											<div class="col-sm-4">
												<input type="hidden" id="duration" name="duration" class="form-control">
												<p class="price lead" id="duration-label"></p>
												<span class="price">%</span>
											</div>
																																										
											<div class="col-sm-4">
												<input type="hidden" id="fondamentali" name="fondamentali" class="form-control">
												<p class="price lead" id="fondamentali-label"></p>
												<span class="price">%</span>
											</div>										
										  
							<button class="btn-cat" onclick="javascript: resetActive(event, 100, 'step-3'); funzione2($('#amount').val(),$('#duration').val(),$('#fondamentali').val())" style="float:right">Avanti</button>   
							<button class="btn-cat" onclick="javascript: resetActive(event, 33, 'step-1')" style="float:left">Indietro</button>
							
						</div>
					</div>
				</div>
				
				<div class="row setup-content step hiddenStepInfo" id="step-3">
					<div class="col-xs-12">
						<div class="col-md-12 well text-center">
							<h1>Risultati</h1>
							
							<div id="ciao">
							</div>
							
							<table class="table table-bordered" id="TabellaInclusione" style="background-color:white">
								<thead>
								  <tr>
									<th><center>ESERCIZIO</center></th>
									<th><center>ATTACCO</center></th>
									<th><center>DIFESA</center></th>
									<th><center>FONDAMENTALI</center></th>
									<th><center>DESCRIZIONE</center></th>
									<th><center>LINK</center></th>
								  </tr>
								</thead>
								<tbody>

								</tbody>
							</table>
							
							<button class="btn-cat" onclick="javascript: resetActive(event, 33, 'step-1')" style="float:right">Nuova Ricerca</button>
							<button class="btn-cat" onclick="javascript: resetActive(event, 66, 'step-2')" style="float:left" >Indietro</button>
						</div>
					</div>
				</div>
	
				<div class="row">
					<div class="progress" id="progress1">
						<div class="progress-bar progress-bar-striped active calcio" role="progressbar" aria-valuenow="33" aria-valuemin="33" aria-valuemax="100" style="width: 20%;" id="progresscalcio">
						</div>
						<span class="progress-type" style="color:#F5F5F5">Avanzamento</span>
						<span class="progress-completed" style="color:#F5F5F5">33%</span>
					</div>
				</div>
			</div>
	</section>
	<!-- /Section: about -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#page-top" id="totop" class="btn btn-circle" style="background-color:white">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
					<center><img class="img-circle img-responsive" height="100" width="300" src="img/LOGO LAMA.png"></center>
				</div>
			</div>	
		</div>
	</footer>



</body>

</html>
