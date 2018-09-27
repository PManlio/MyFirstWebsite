<?php
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);
session_start();
if($_SESSION["type"]!=3){die("permesso negato.");}

$pariva = $_GET["PIVA"];
$str="SELECT * FROM sviluppatore WHERE PIVA= '".$pariva."';";
$result=mysqli_query($conn, $str);
$num_rows=mysqli_num_rows($result);

$res=array();

while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
  $res[]= array(
    'PIVA'=> $row["PIVA"],
    'NOME'=> $row["NOME"],
    'COGNOME'=> $row["COGNOME"],
    'TELEFONO'=> $row["TELEFONO"],
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
