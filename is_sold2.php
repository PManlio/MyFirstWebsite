<?php
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);
session_start();
if($_SESSION["type"]!=2){die("permesso negato.");}


$result=mysqli_query($conn, "SELECT * FROM LAYOUT l JOIN SVILUPPATORE s ON l.sviluppatore = s.PIVA WHERE s.username='".$_SESSION["username"]."';");
$num_rows=mysqli_num_rows($result);

$res=array();
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
  $res[]= array(
    'ID'=> $row['ID'],
    'COSTO_TOTALE'=> $row['COSTO_TOTALE'],
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
