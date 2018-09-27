<?php
include("db.php");
session_start();
if($_SESSION["type"]!=3){die("Permesso negato.");}

$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

$result = mysqli_query($conn, "SELECT Distinct CODICE FROM CLIENTE");

$res = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  $res[] = array(
    'CODICE'=> $row['CODICE'],
  );
}
$json = json_encode($res);
echo $json;
?>
