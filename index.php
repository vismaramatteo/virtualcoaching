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
	<link href="css/style.css" rel="stylesheet">
	<link href="css/default.css" rel="stylesheet">
	
	<script>
			function contattaci(val,val1,val2,val3,val4) 
			{
				var nome=$("#cname").val();
				var mail=$("#cemail").val();
				var tel=$("#cphone").val();
				var oggetto=$("#csubject").val();
				var commento=$("#ccomments").val();
				
				if(nome=="")
				{
					$("#cname").val("");
					$("#cname").val("NOME MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#cname").val("").animate({backgroundColor: "white"});
								
					},4000);
				}
				if(mail=="")
				{
					$("#cemail").val("");
					$("#cemail").val("MAIL MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#cemail").val("").animate({backgroundColor: "white"});
								
					},4000);
				}
				if(tel=="")
				{
					$("#cphone").val("");
					$("#cphone").val("TELEFONO MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#cphone").val("").animate({backgroundColor: "white"});
								
					},4000);
				}
				if(oggetto=="")
				{
					$("#csubject").val("");
					$("#csubject").val("OGGETTO MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#csubject").val("").animate({backgroundColor: "white"});
								
					},4000);
				}
				if(commento=="")
				{
					$("#ccomments").val("");
					$("#ccomments").val("COMMENTO MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#ccomments").val("").animate({backgroundColor: "white"});
								
					},4000);
				}
				
				else if(nome!="" && mail!="" && tel!="" && oggetto!="" && commento!="")
				{
				$.post("php/contact.php",{"a":val,"b":val1,"c":val2,"d":val3,"e":val4},function(data){
							$("#submit").html("");
							$("#submit").html("MESSAGGIO INVIATO CORRETTAMENTE").animate({backgroundColor: "green"});
							setTimeout(function(){
								$("#submit").html("INVIA MESSAGGIO").animate({backgroundColor: "black", color:"white"});
								
							},4000);
							
					
				});
				}
					
			};
			
			
			function registrati(val,val1,val2,val3,val4,val5) 
			{
				var nome=$("#rname").val();
				var cognome=$("#cognome").val();
				var telefono=$("#rphone").val();
				var mail=$("#remail").val();
				var password=$("#rpassword").val();
				var sport=$("#rsport").val();
				
				if(nome=="")
				{
					$("#rname").val("");
					$("#rname").val("NOME MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#rname").val("").animate({backgroundColor: "white", color:"black"});
								
					},4000);
				}
				
				if(cognome=="")
				{	
					$("#cognome").val("");
					$("#cognome").val("COGNOME MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#cognome").val("").animate({backgroundColor: "white", color:"black"});
							
					},4000);
				}
				if(telefono=="")
				{
					$("#rphone").val("");
					$("#rphone").val("TELEFONO MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#rphone").val("").animate({backgroundColor: "white", color:"black"});
								
					},4000);
				}
				if(mail=="")
				{
					$("#remail").val("");
					$("#remail").val("E-MAIL MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#remail").val("").animate({backgroundColor: "white", color:"black"});
								
					},4000);
				}
				if(password=="")
				{
					$("#rpassword").val("");
					$("#rpassword").val("PASSWORD MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#rpassword").val("").animate({backgroundColor: "white", color:"black"});
								
					},4000);
				}
				if(sport=="")
				{
					$("#rsport").val("");
					$("#rsport").val("SPORT MANCANTE!").animate({backgroundColor: "#c90000", color:"white"});
					setTimeout(function(){
					$("#rsport").val("").animate({backgroundColor: "white", color:"black"});
								
					},4000);
				}				
				
				
				else if(nome!="" && cognome!="" && telefono!="" && mail!="" && password!="" && sport!="")
				{
				$.post("php/registrazione.php",{"a":val,"b":val1,"c":val2,"d":val3,"e":val4,"f":val5},function(data){
					var LengthTel=$("#rphone").val().length;
					alert(LengthTel);
					if(data=="E-MAIL GI&Agrave; ESISTENTE")
					{
						$("#bregister").html("");
						$("#bregister").html("E-MAIL GI&Agrave ESISTENTE");
						
						$("#remail").val(mail);
						
						$("#bregister").css({})
						$(function () {
							$("#bregister").animate({backgroundColor: "c90000"}, { duration: 200, queue: false });
							$("#remail").animate({backgroundColor: "c90000", color:"white"},{ duration: 200, queue: false });
						});
						setTimeout(function(){
							$("#remail").val(mail).animate({backgroundColor: "white", color:"black"});			
							$("#bregister").html("REGISTRATI").animate({backgroundColor: "black", color:"white"});
						},4000);
					}
					else
					{
						$("#bregister").html("");
						$("#bregister").html("REGISTRAZIONE EFFETTUATA").animate({backgroundColor: "green"});
						setTimeout(function(){
						$("#bregister").html("REGISTRATI").animate({backgroundColor: "black", color:"white"});
						},4000);
					}
				});
				}
			};
	</script>
	
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
        <li class="active"><a href="#intro">Home</a></li>
        <li><a href="#sport">Sport</a></li>
		<li id="ultimo"><a href="#contact">Contattaci</a></li>
		<li class="divider"></li>
		<li id="dropdown" class="dropdown">
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
                                       <input type="email" name="lemail" class="form-control" id="lemail" placeholder="Indirizzo E-Mail" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="password">Password</label>
                                       <input type="password" name="lpassword" class="form-control" id="lpassword" placeholder="Password" required>
                                    </div>
                                    
									<a  href="index.php"
									style="color: #000000; background-color:#fff">
                                    PASSWORD DIMENTICATA? </a>
									<br><br>
									
                                    
                                       <button type="submit" class="btn btn-success btn-block">Accedi</button>
                                    
                                    	
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
			<h2><span class="text_color">VIRTUAL COACHING</span> </h2>
			<h4>IL SITO PER INSEGNARE LO SPORT AI RAGAZZI</h4>
		</div>
		
		<div class="page-scroll">
        	<div class="wow shake" data-wow-delay="1s">
		<br><br><br><br><br><br>
			<a href="#sport" class="btn btn-circle" style="background-color:white">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
            </div>
		</div>
    </section>
	<!-- /Section: intro -->

	<!-- Section: sport -->
    <section id="sport" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>SPORT</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>


        
        
			<a href="/virtualcoaching/calcio.php">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="wow bounceInDown" data-wow-delay="0.2s">
					<div class="team boxed-grey">
						<div class="inner">
							<h5>CALCIO</h5>
                            <center>
							<div class="avatar"><img src="/virtualcoaching/img/team/pallacalcio.jpg" alt="" class="img-responsive img-circle" /></div>
							</center>
                        </div>
					</div>
					</div>
				</div>
			</a>
			
			<a href="/virtualcoaching/basket.php">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="wow bounceInDown" data-wow-delay="0.2s">
					<div class="team boxed-grey">
						<div class="inner">
							<h5>BASKET</h5>
                            <center>
							<div class="avatar"><img src="/virtualcoaching/img/team/pallabasket.jpg" alt="" class="img-responsive img-circle" /></div>
							</center>
                        </div>
					</div>
					</div>
				</div>
			</a>
	
        </div>		
	</section>
	<!-- /Section: sport -->
	
	<!-- Section: contact -->
    <section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Contattaci</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		
		<div class="container">

			<div class="row">
				<div class="col-lg-2 col-lg-offset-5">
					<hr class="marginbot-50">
				</div>
			</div>
			
			<div class="row">
				<section class="contact" id="contact">
					<div class="container">
						<div id="map-canvas"></div>
						<div class="row">				
							<div name="contactform" id="contactform">
									<div class="col-md-6">
										<fieldset>
											<input name="cname" type="text" id="cname" size="30" placeholder="Nome e Cognome">
											<br>
											<input name="cemail" type="text" id="cemail" size="30" placeholder="Email">
											<br>
											<input name="cphone" type="text" id="cphone" size="30" placeholder="Telefono">
											<br>
											<input name="csubject" type="text" id="csubject" size="30" placeholder="Oggetto">
											<br>
										</fieldset>
									</div>
									
									<div class="col-md-6">
									  <fieldset>
										<textarea name="ccomments" cols="40" rows="20" id="ccomments" placeholder="Messaggio"></textarea>
									  </fieldset>
									</div>
									
									<div class="col-md-12" >
									  <fieldset>
										<button type="submit" class="btn btn-lg" onclick="contattaci($('#cname').val(),$('#cemail').val(),$('#cphone').val(),$('#csubject').val(),$('#ccomments').val());" id="submit" value="Submit">Invia Messaggio</button>
									  </fieldset>
									</div>
							</div>
						</div>
					</div>
				</section>
			</div>	
			
			<br><br><br><br>

		<div>
			<div class="row team">
            
				<div class="col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.2s">
						<center>
							<img class="img-circle img-responsive" height="180" width="180" src="/virtualcoaching/img/workers/bobo.jpg">
							<br>
							<h4>Bottoli <br>Luca</h4>
						</center>
					</div>
				</div>
                
				<div class="col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.2s">
						<center>
							<img class="img-circle img-responsive" height="180" width="180" src="/virtualcoaching/img/workers/garra.jpg">
							<br>
							<h4>Garraffa <br>Alexandro</h4>
						</center>
					</div>
				</div>
	
				<div class="col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.2s">
						<center>
							<img class="img-circle img-responsive" height="180" width="180" src="/virtualcoaching/img/workers/petty.jpg">
							<br>
							<h4>Pettinà <br>Alessandro</h4>
						</center>
					</div>
				</div>
		
				<div class="col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.2s">
						<center>
							<img class="img-circle img-responsive" height="180" width="180" src="/virtualcoaching/img/workers/visma.jpg">
							<br>
							<h4>Vismara <br>Matteo</h4>
						</center>
					</div>
				</div>
                

			<div class="row">
			<div id="example-popup" class="popup" style="display:none;">
    			<div class="popup-body" style="height:510px">	<span onclick="$(&#39#example-popup&#39).hide()" class="popup-exit"></span>
        			<div class="popup-content" >
            			<h2 class="popup-title">REGISTRATI</h2>
                          <div class="register" id="register" >
                              <div class="col-md-12">
								<fieldset>
                                      <input name="rname" type="text" id="rname" size="30" style="border: 1px solid #323232" placeholder="INSERIRE Nome"></input>
                                      <br>
                                      <input name="cognome" type="text" id="cognome" size="30" style="border: 1px solid #323232" placeholder="INSERIRE Cognome"></input>
                                      <br>
                                      <input name="rphone" type="number" id="rphone" size="30" style="border: 1px solid #323232" placeholder="INSERIRE Telefono"></input>
                                      <br>
                                      <input name="remail" type="email" id="remail" size="30" style="border: 1px solid #323232" placeholder="INSERIRE Email" required></input>
                                      <br>
                                      <input name="rpassword" type="password" id="rpassword" size=30 style="border: 1px solid #323232" placeholder="INSERIRE Password"></input>
                                      <br>
                                      <div class="sportpraticato">
										SPORT PRATICATO?
                               				<select style="height:30px; width:200px" name="rsport" id="rsport">
												<option value="calcio">CALCIO</option>
												<option value="basket">BASKET</option>
											</select>
										</div>
                                      <br>
									  <!--<input name="img_utente" type="file" id="img_utente" style="border: 1px solid #323232" name="file_inviato"><br></input>-->

										<div class="col-md-12">
											<button type="submit" class="btn btn-lg" id="bregister" onclick="registrati($('#rname').val(),$('#cognome').val(),$('#rphone').val(),$('#remail').val(),$('#rpassword').val(),$('#rsport').val());">REGISTRATI</button>
										</div>	
                                        <br>
                                  </fieldset>
								</div>
                          </div>
        			</div>
    			</div>
			</div>
		<div class="popup-overlay"></div>
		
				
                
                </div>
			</div>
           
		</div>
        
	</section>
	<!-- /Section: contact -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="1s">
					<div class="page-scroll marginbot-30">
						<a href="#intro" id="totop" class="btn btn-circle" style="background-color:white">
							<i class="fa fa-angle-double-up animated"></i>
						</a>	
					</div>
					</div>
					<center><img class="img-circle img-responsive" height="100" width="300" src="/virtualcoaching/img/LOGO LAMA.png"></center>
				</div>
			</div>	
		</div>
	</footer>
    
</body> 

</html>
