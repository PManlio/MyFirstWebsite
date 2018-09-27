<?php
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);
session_start();
if($_SESSION["type"]!=1){die("permesso negato.");}

$result= mysqli_query($conn, "SELECT * FROM sito_web s JOIN cliente c on s.cliente = c.codice WHERE c.username = '".$_SESSION["username"]."';");
if($result){
  $num_rows= mysqli_num_rows($result);
  $res=array();

  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $res[]= array(
      'codice'=> $row['CODICE'],
      'url'=> $row['URL'],
      'data_pubblicazione'=> $row['DATA_PUBBLICAZIONE'],
      'cliente'=> $row['CLIENTE'],
      'layout'=> $row['LAYOUT'],
    );
  }

  $json_data= array(
    "draw"=> 1,
    "recordsTotal"=> $num_rows,
    "recordsFiltered"=> $num_rows,
    "data"=> $res);
    $json= json_encode($json_data);
    echo $json;
  }
else{echo "query non riuscita.";}
?>
