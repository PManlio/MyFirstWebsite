<?php
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);
session_start();

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["conf_pass"]) &&
 isset($_POST["citta"]) && isset($_POST["indirizzo"]) && isset($_POST["telefono"])){
  $usrname= $_POST["username"];
  $psword= $_POST["password"];
  $conf_p= $_POST["conf_pass"];
  $cod= NULL;/*$_POST["codice"];*/
  $cit= $_POST["citta"];
  $ind= $_POST["indirizzo"];
  $tel= $_POST["telefono"];
  $typ= 1;
  $nsi= 0; $s_t= 0;
  $str2="INSERT INTO cliente(CODICE, USERNAME, PASSWORD, CITTA, INDIRIZZO, TELEFONO, N_SITI, SPESA_TOTALE, TYPE) VALUES('".$cod."', '".$usrname."','".$psword."', '".$cit."','".$ind."','".$tel."','".$nsi."','".$s_t."', '".$typ."');";

  //I M P O R T A N T I S S I M O
  //mysql_select_db($db_host);

  if($psword!=$conf_p){alert("controlla la password!"); header("Location: register.html");}
  else{
    $ris_que=mysqli_query($conn, $str2);
  }
  if($ris_que){echo "Registrazione avvenuta con successo."; header("Location: login.html");}
  else{echo "Registrazione fallita, riprovare."; header("Location: register.html");}
}
?>
