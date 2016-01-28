<?php
	$b= false;
	foreach ( $_GET as $key=>$val)
	{
		echo "$key=>$val\r\n";
		$b=true;
	}
	if($b)
		return;
?>
 
<html> 
	<head>
		<script src="js/jquery.min.js"></script>	
		<script>
		$(document).ready(function(){
			$("#ciao").click(function(){
				$.get("test.php",{variabile:["asd","pippo"]},function(data){
					alert(data);
				});
			});
		});
		</script>
	</head>
	
	<body>
		<button id="ciao">scacsa</button>
	</body>
</html>