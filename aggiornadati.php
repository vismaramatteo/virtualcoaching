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
	
 	<link rel="import" href="/virtualcoaching/header.html">   
	<link href="/virtualcoaching/css/aggiornadati.css" rel="stylesheet">

    <title>VIRTUAL COACHING</title>


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
						<img height="35" width="280" src="/virtualcoaching/img/LOGO.png"> 
					</div>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav" style="background-color:white">
        <li class="active"><a href="/virtualcoaching/index.php">Home</a></li>
        <li id="ultimo"><a href="/virtualcoaching/organizzapartite.php">Organizza partita</a></li>

        <li >
			<a>
        			<?php 
                        if($_SESSION['login_user'])
                        $connection=mysqli_connect("localhost","root","");
                        mysqli_select_db($connection,"my_virtualcoaching") or die ("Error");
                        $email=$_SESSION['login_user'];
                        $query="SELECT Name,Surname FROM user WHERE Email='$email'"; 
                        $result=mysqli_query($connection,$query);
                        $r=mysqli_fetch_array($result);
                        echo ''.$r['Name'].' '.$r['Surname'];
                        mysqli_close($connection);
                                 
                    ?>
           </a> 
         </li>  
        </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	

	
	<!-- Section: intro -->
    <section id="intro" class="intro">
		<div class="main container-fluid well">
        
            <form action="/virtualcoaching/php/modificadati.php" method="POST">
				<div class="row-fluid">
					<div class="col-lg-3" style="padding-top:35px" >
						<img src="/virtualcoaching/img/utente.png" 
							class="img-circle img-responsive">
					</div>

					
					<div class="col-lg-6" >
						<h1 style="color:#428BCA"><center>AGGIORNA DATI</center></h1>
                        
						<h3>
                          <?php 
                           
                          	$connection=mysqli_connect("localhost","root","");
                            mysqli_select_db($connection, "my_virtualcoaching") or die ("Error");
                            $email=$_SESSION['login_user']; 
                            $query="SELECT Name,Surname FROM user WHERE Email='$email'"; 
                            $result=mysqli_query($connection,$query);
                            $r=mysqli_fetch_array($result);
                            echo ''.$r['Name'].' '.$r['Surname'];
                           
                            mysqli_close($connection);
                          ?>
                        </h3>
                        
						<h5>Nome: <input type="text" name="nome" value="<?php 
                          
                          	$connection=mysqli_connect("localhost","root","");
                            mysqli_select_db($connection,"my_virtualcoaching") or die ("Error");
                            $email=$_SESSION['login_user']; 
                            $query="SELECT Name FROM user WHERE Email='$email'"; 
                            $result=mysqli_query($connection,$query);
                            $r=mysqli_fetch_array($result);
                            echo ''.$r['Name'];
                           
                            mysqli_close($connection);
                          ?>"/></h5>                       
                        
                        <h5>Cognome: <input type="text" name="cognome" value="<?php 
                           
                          	$connection=mysqli_connect("localhost","root","");
                            mysqli_select_db($connection,"my_virtualcoaching") or die ("Error");
                            $email=$_SESSION['login_user']; 
                            $query="SELECT Surname FROM user WHERE Email='$email'"; 
                            $result=mysqli_query($connection,$query);
                            $r=mysqli_fetch_array($result);
                            echo ''.$r['Surname'];
                           
                            mysqli_close($connection);
                          ?>"/></h5> 
                        
						<h5>E-mail: <input type="text" name="email" value="<?php $email=$_SESSION['login_user']; echo $email;   ?>"/></h5>
                       
                        
						<h5>Password: <input type="password" name="password" value="<?php 
                           
                          	$connection=mysqli_connect("localhost","root","");
                            mysqli_select_db($connection,"my_virtualcoaching") or die ("Error");
                            $email=$_SESSION['login_user']; 
                            $query="SELECT Password FROM user WHERE Email='$email'"; 
                            $result=mysqli_query($connection,$query);
                            $r=mysqli_fetch_array($result);
                            echo ''.$r['Password'];
                           
                            mysqli_close($connection);
                          ?>"/>
                        </h5>
                        
                        <!--
                        <?php
                          $connection = mysqli_connect("localhost", "root", "");
                          mysqli_select_db($connection,"my_virtualcoaching");
                          $email=$_SESSION['login_user'];  
                          $sql=mysqli_query($connection,"SELECT * FROM user WHERE Email='$email'");
                          $result=mysqli_fetch_assoc($sql);   //php per far vedere il blob
                          echo '<div style="margin-left:-85px;margin-bottom:5%;"><img class="imgProfilo" src="data:image/jpeg;base64,'.base64_encode( $result['avatar'] ).'" width="30"/></div>';
                        ?> 
                        -->
						<h5>Cambia Immagine Profilo:<br><input name="img_utente" type="file" accept="image/*" id="img_utente"/> </h5>
                        
					</div>
					

					<div class="col-lg-3">	
                    
							<button class="btn" type="submit" style="margin-right:20px" name="b1"><i class="glyphicon glyphicon-trash"></i> Cancella Account</button>
						
                            <br><br>
                            <button class="btn" id="btn1" type="submit" style="margin-right:20px" name="b2"><i class="glyphicon glyphicon-wrench" ></i> Modifica Dati</button>

					</div>
				</div>
  			</form>
        </div>

    </section>
	<!-- /Section: intro -->

	
                


		
				



    
</body>

</html>
