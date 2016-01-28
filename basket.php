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

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/styleb.css" rel="stylesheet">
	<link href="css/defaultb.css" rel="stylesheet">
	<link href="css/stepbar.css" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
	<link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/slider.css">

</head>

<script type="text/javascript" src="https://nibirumail.com/docs/scripts/nibirumail.cookie.min.js"></script>

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
          <li class="active"><a href="/index.php">Home</a></li>
          <li id="ultimo"><a href="/calcio.php">Calcio</a></li>
            <li class="dropdown">
            <?php 
                    if(!isset($_SESSION['login_user']))
                    echo '
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 241px;">
                        <li>
							   <div class="row">
								  <div class="col-md-12">
								  
									 <form class="form"  method="POST" action="./php/loginbasket.php" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
										   <label class="sr-only" for="email">E-Mail</label>
										   <input type="email" name="email" class="form-control" id="email" placeholder="Indirizzo E-Mail" required>
										</div>
										<div class="form-group">
										   <label class="sr-only" for="password">Password</label>
										   <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
										</div>
										<div class="checkbox">
										   <label>
										   <input type="checkbox"> Ricordami
										   </label>
										</div>
										<div class="form-group">
										   <button type="submit" class="btn btn-success btn-block">Accedi</button>
										   <button type="register" class="btn btn-primary btn-block">Registrati</button>
										</div>
									 </form> </div> 
							   </div>   ';
                                else
                                 	echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$_SESSION['login_user'].'<b class="caret"></b></a>
                                    <ul class="dropdown-menu" style="padding: 15px;min-width: 331px;">
										<li>
											<form> 
												<div class="row">
													<div class="col-md-12">
														<div style="margin: 0 auto;">
															<center>
																<img class="fotorotonda" src="img/utente.png"> &nbsp;&nbsp;
																<strong> Ciao '.$_SESSION['login_user'].' </strong>
															</center>
														</div>
														<br>
													</div>
																													
													<div class="col-md-12">
														<a style="float:left" id="aggiornadati" href="/php/aggiornadati.php">Aggiorna dati</a>
														<a style="float:right" id="logout" href="/php/logoutbasket.php">Logout</a>
													</div> 
												</div>
											</form> 
										</li>	
									</ul>
						</li>
					</ul>';
					
				?>
		</li>
        </ul>
        </div>
        </div>
        </nav>

            <!-- /.navbar-collapse -->

        <!-- /.container -->


	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2><span class="text_color">BASKET</span> </h2>
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
				
			<div class="row">
				<div class="row setup-content step activeStepInfo" id="step-1">
					<div class="col-xs-12">
						<div class="col-md-12 well text-center">
							<h1>Categorie</h1>
                            <center>
								<select name="tipobasket" style="height:30px; width:250px">
									<option value="minipulcini">MINIBASKET - PULCINI 5/6 Y</option>
									<option value="miniscoiattoli">MINIBASKET - SCOIATTOLI 7/8 Y</option>
									<option value="miniaquilotti">MINIBASKET - AQUILOTTI 9/10 Y</option>
									<option value="miniesordienti">MINIBASKET - ESORDIENTI 10/11 Y</option>
									<option value="under13">UNDER 13</option>
									<option value="under14">UNDER 14</option>
									<option value="under16">UNDER 15</option>
									<option value="under17">UNDER 17</option>
									<option value="under19">UNDER 19</option>
								</select>
                                <br>
								
								
							</center>
							<button class="btn-cat" onclick="javascript: resetActive(event, 66, 'step-2')" style="float:right" >Avanti</button>
						</div>
					</div>
				</div>
					
				<div class="row setup-content step hiddenStepInfo" id="step-2">
					<div class="col-xs-12">
						<div class="col-md-12 well text-center">
							<h1>Ruolo</h1>

							
							<button class="btn-cat" onclick="javascript: resetActive(event, 100, 'step-3')" style="float:right" >Avanti</button>
							<button class="btn-cat" onclick="javascript: resetActive(event, 33, 'step-1')" style="float:left">Indietro</button>
						</div>
					</div>
				</div>
					
				<div class="row setup-content step hiddenStepInfo" id="step-3">
					<div class="col-xs-12">
						<div class="col-md-12 well text-center">
							<h1>Risultati</h1>
							<button class="btn-cat" onclick="javascript: resetActive(event, 33, 'step-1')" style="float:right" >Nuova Ricerca</button>
							<button class="btn-cat" onclick="javascript: resetActive(event, 66, 'step-2')" style="float:left" >Indietro</button>
						</div>
					</div>
				</div>
		
				<div class="row">
					<div class="progress" id="progress1">
						<div class="progress-bar progress-bar-striped active basket" role="progressbar" aria-valuenow="33" aria-valuemin="33" aria-valuemax="100" style="width: 20%;" id="progressbasket";></div>
						<span class="progress-type" style="color:#F5F5F5">Avanzamento</span>
						<span class="progress-completed" style="color:#F5F5F5">33%</span>
					</div>
				</div>
			</div>
			<script src="js/stepbar.js" type="text/javascript"></script>	
	</div>
</section>
	<!-- /Section: sport -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#page-top" id="totop" class="btn btn-circle" style="background-color:white" style="color:#B61F0D">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
					<center><img class="img-circle img-responsive" height="100" width="300" src="img/LOGO LAMA.png"></center>
				</div>
			</div>	
		</div>
	</footer>

    <!-- JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/login.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

</body>

</html>
