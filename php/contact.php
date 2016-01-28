<?php
session_start();
//Controllo dati
$error= "";
 
//Controllo dati
$error= "";
 
if(isset($_POST['name']) and $_POST['name'] != ""){//<- controllo nome
    $nome= strip_tags($_POST['name']);
}
elseif(isset($_POST['name'])){
    $error .= "Nome mancante.<br />";
}
 
if(isset($_POST['email']) and preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $_POST['email'])){//<- controlla se la mail è presente e se è in un formato valido
    $mail = $_POST['email'];
}
elseif(isset($_POST['email'])){
    $error .= "Email mancante o non valida.<br />";
}

if(isset($_POST['phone']) and $_POST['phone'] != ""){//<- controllo telefono
    $telefono= strip_tags($_POST['phone']);
}
elseif(isset($_POST['phone'])){
    $error .= "Nome mancante.<br />";
}
 
if(isset($_POST['subject']) and $_POST['subject'] != ""){//<- controllo oggetto
    $oggetto = "[Messaggio dal tuo sito] ".strip_tags($_POST['subject']);
}
elseif(isset($_POST['subject'])){
    $error .= "Inserire un oggetto al messaggio.<br />";
}
 
if(isset($_POST['comments']) and $_POST['comments'] != ""){//<- controllo messaggio
    $messaggio = strip_tags($_POST['comments']);
}
elseif(isset($_POST['comments'])){
    $error .= "Inserire un messaggio.<br/>";
}

//Invio mail
if(isset($nome,$mail,$telefono,$oggetto,$messaggio)){
    $destinatario = "virtualcoaching97@gmail.com";//
    $intestazione = "Da: ".$mail."\r\n";      
    $messaggio .= "\n\nMittente: ".$nome."\nEmail: ".$mail."\nTelefono: ".$telefono."";      
     
    mail($destinatario, $oggetto, $messaggio, $intestazione);
     
    echo "<p class='success'>Messaggio inviato con successo!</p>";
}
else{
    echo "<p class='error'>".$error."</p>";
}


header("location: ../index.php");
?>