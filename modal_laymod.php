<?php
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);
session_start();
if($_SESSION["type"]!=3){
  die("Permesso negato.");
}

$idlay = $_GET["ID"];
$qry="SELECT * FROM modulo WHERE modulo.id_layout = '".$idlay."';";
$result=mysqli_query($conn, $qry);
$num_rows=mysqli_num_rows($result);

$res=array();
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
  $res[]= array(
    'ID'=> $row['ID'],
    'nome'=> $row['NOME'],
    'funzione'=> $row['FUNZIONE'],
    'costo'=> $row['COSTO'],
    'id_layout'=> $row['ID_LAYOUT'],
  );
}

$json_data= array(
  "draw"=> 1,
  "recordsTotal"=> $num_rows,
  "recordsFiltered"=> $num_rows,
  "data"=> $res);

$json= json_encode($json_data);
echo $json;
?>
