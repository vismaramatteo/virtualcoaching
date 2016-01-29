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
	
 	<link rel="import" href="header.html">   
	<link href="css/aggiornadati.css" rel="stylesheet">

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
						<img height="35" width="280" src="img/LOGO.png"> 
					</div>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav" style="background-color:white">
        <li class="active"><a href="index.php">Home</a></li>
        <li id="ultimo"><a href="organizzapartite.php">Organizza partita</a></li>

        <li >
			<a>
        			<?php 
                        if($_SESSION['login_user'])
			echo ''.$_SESSION['login_user'].''
                                 
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
        
            <form action="../php/modificadati.php" method="POST">
				<div class="row-fluid">
					<div class="col-lg-3" style="padding-top:35px" >
						<img src="img/utente.png" 
							class="img-circle img-responsive">
					</div>

					
					<div class="col-lg-6" >
						<h1 style="color:#428BCA"><center>AGGIORNA DATI</center></h1>
                        
						<h3>
                          <?php 
                           session_start();
                          	$connection=mysql_connect("localhost","virtualcoaching","");
                            mysql_select_db("my_virtualcoaching",$connection) or die ("Error");
                            $email=$_SESSION['login_user']; 
                            $query="SELECT Name,Surname FROM user WHERE Email='$email'"; 
                            $result=mysql_query($query);
                            $r=mysql_fetch_array($result);
                            echo ''.$r['Name'].' '.$r['Surname'];
                           
                            mysql_close($connection);
                          ?>
                        </h3>
                        
						<h5>E-mail: <input type="text" name="email" value="<?php echo $_SESSION['login_user'];  ?> "/></h5>
                       
                        
						<h5>Password: <input type="password" name="password" value=" <?php 
                           session_start();
                          	$connection=mysql_connect("localhost","virtualcoaching","");
                            mysql_select_db("my_virtualcoaching",$connection) or die ("Error");
                            $email=$_SESSION['login_user']; 
                            $query="SELECT Password FROM user WHERE Email='$email'"; 
                            $result=mysql_query($query);
                            $r=mysql_fetch_array($result);
                            echo ''.$r['Password'];
                           
                            mysql_close($connection);
                          ?> "/>
                        </h5>
                        
                        <!--
                        <?php
                          $connection = mysql_connect("localhost", "virtualcoaching", "");
                          mysql_select_db("my_virtualcoaching",$connection);
                          $email=$_SESSION['login_user'];  
                          $sql=mysql_query("SELECT * FROM user WHERE Email='$email'");
                          $result=mysql_fetch_assoc($sql);   //php per far vedere il blob
                          echo '<div style="margin-left:-85px;margin-bottom:5%;"><img class="imgProfilo" src="data:image/jpeg;base64,'.base64_encode( $result['avatar'] ).'" width="30"/></div>';
                        ?> 
                        -->
						<h5>Cambia Immagine Profilo:<br><input name="img_utente" type="file" accept="image/*" id="img_utente"/> </h5>
                        
					</div>
					

					<div class="col-lg-3">	
							<button class="btn" style="margin-right:20px"><a href="#" style="color:white"><i class="glyphicon glyphicon-trash"></i> Cancella Account</a></button>
							<br><br>
                            <button class="btn" type="submit" style="margin-right:20px;background-color:#b60000"><a href="#" style="color:white"><i class="glyphicon glyphicon-wrench" ></i> Modifica Dati</a></button>

					</div>
				</div>
  			</form>
        </div>

    </section>
	<!-- /Section: intro -->

	
                


		
				



    
</body>

</html>
