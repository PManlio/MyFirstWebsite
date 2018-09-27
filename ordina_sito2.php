<?php
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);
session_start();
if($_SESSION["type"]!=1){
  die("Permesso negato.");
}

if(isset($_POST["url"]) && isset($_POST["data_pubblicazione"]) && isset($_POST["cliente"]) && isset($_POST["layout"])){
  $cod=NULL;
  $url=$_POST["url"];
  $rawdate = htmlentities($_POST['data_pubblicazione']);
  $dap = date('Y-m-d', strtotime($rawdate));
  $cli=$_POST["cliente"];
  $lay=$_POST["layout"];
  $qry2="INSERT INTO sito_web(codice, url, data_pubblicazione, cliente, layout) VALUES('".$cod."', '".$url."', '".$dap."', '".$cli."', '".$lay."');";
  $ris_sql2=mysqli_query($conn, $qry2);
  if($ris_sql2){echo "Sito inserito con successo"; header("Location: home_clienti.php");}
  else{alert("registrazione sito web non avvenuta."); header("Location: ordina_sito.php");}
}
?>
