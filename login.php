<?php
//per prima cosa dobbiamo includere il DataBase
include("db.php");
//ora possiamo connetterci al database
$connessione = mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($connessione, $db_database);

//ora possiamo avviare la Session
session_start();

if(isset($_POST["username"]) && isset($_POST["password"])){

  //leggiamo i dati:
  $username = $_POST["username"];
  $password = $_POST["password"];
  $str1 = "SELECT * FROM cliente WHERE username = '".$username."' and password = '".$password."';";
  $str2 = "SELECT * FROM sviluppatore WHERE username= '".$username."' and password = '".$password."';";
  $str3 = "SELECT * FROM users WHERE username= '".$username."' and password = '".$password."';";
  //cerchiamo la coppia (username, password) nel database
  $result1 = mysqli_query($connessione, $str1);
  $result2 = mysqli_query($connessione, $str2);
  $result3 = mysqli_query($connessione, $str3);
  //ora il controllo:
  if(($row=mysqli_fetch_array($result1, MYSQLI_ASSOC)) || ($row=mysqli_fetch_array($result2, MYSQLI_ASSOC)) || ($row=mysqli_fetch_array($result3, MYSQLI_ASSOC))){
    $type = $row["type"];
    $_SESSION["username"] = $username;
    $_SESSION["type"] = $type;
    if($type == 1){
      //redirect
      header("Location: home_clienti.php");
    }else if($type==2){
      header("Location: home_sviluppatori.php");
    }else if($type==3){
      header("Location: home_admin.php");
    }else{
      header("Location: user_not_found.html");
    }
  }else{
    //utente non trovato
    header("Location: user_not_found.html");
  }
}


?>
