<?php
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);
session_start();
if($_SESSION["type"]!=3){die("permesso negato.");}

$idlay= $_GET["ID"];
$result=mysqli_query($conn, "SELECT * FROM LAYOUT WHERE ID='".$idlay."';");
$num_rows=mysqli_num_rows($result);

$res=array();
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
  $res[]= array(
    'ID'=> $row['ID'],
    'COSTO_TOTALE'=> $row['COSTO_TOTALE'],
    'SVILUPPATORE'=> $row['SVILUPPATORE'],
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
