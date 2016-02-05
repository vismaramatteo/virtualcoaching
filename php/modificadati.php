<?php

    session_start();
    $connection = mysql_connect("localhost", "root", "");
    mysql_select_db("my_virtualcoaching",$connection);

    $email=$_SESSION["login_user"];
    $em=$_POST["email"];
    $pw=$_POST["password"];
    $nome=$_POST["nome"];
	$cognome=$_POST["cognome"];
        
    if(isset($_POST["b1"]))
    {
      $sql=mysql_query("DELETE FROM user WHERE Email = '$email'");     
    }
    else if(isset($_POST["b2"]))
    {
      $sql=mysql_query("UPDATE user SET Name = '$nome' , Surname = '$cognome' , Email = '$em', Password = '$pw' WHERE Email='$email'");
    }
    
    session_destroy();
   	header("location: ../index.php");
 
     
	/*$file=$_FILES['image']['tmp_name'];
    if(!isset($file))
    {
        echo 'Please select an Image';
    }
    else
	{
        $image_check = getimagesize($_FILES['image']['tmp_name']);
        if($image_check==false)
        {
            echo 'Not a Valid Image';
        }
	}
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
		$image_name = addslashes($_FILES['image']['name']);

    $sql=mysql_query("ALTER TABLE `user` WHERE Email='$email' SET `img_utente`= '$image'") or DIE('query non riuscita'.mysql_error());*/


?>
