<?php
session_start();
if($_SESSION["type"]!=3){
  die("Permesso negato");
}
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);

if(isset($_POST["costo_totale"]) && isset($_POST["sviluppatore"])){
  $ID=NULL;
  $cst=$_POST["costo_totale"];
  $svl=$_POST["sviluppatore"];

  $qry="SELECT piva FROM sviluppatore svi WHERE svi.piva=('".$svl."');";
  $str1="INSERT INTO LAYOUT(ID, COSTO_TOTALE, SVILUPPATORE) VALUES('".$ID."','".$cst."','".$svl."');";

  if($qry){
    $ris_sql=mysqli_query($conn, $str1);
    if($ris_sql){echo "Registrazione layout avvenuta con successo."; header("Location: reglay.html");}
    else{echo "Registrazione non avvenuta."; header("Location: ins_layout.php");}
    }
  else{
    $msg="Sviluppatore non trovato all'interno del database.";
    $redirect="ins_layout.php";
    echo '<script type="javascript">
      alert("'.$msg .'");
      window.location.href= "'.$redirect.'";
      </script>';
  }
}
?>

<html>
<head><link rel="stylesheet" type="text/css" href="css_admin_home.css" media="screen" /></head>
<header>
<p><a href="logout.php">logout</a></p>
</header>
<title>Inserimento Layout</title>
<body>
  <ul>
    <li><a href='home_admin.php'>Torna alla Home admin</b></a></li>
    <li><a href='ins_sviluppatore.php'>Inserisci sviluppatore</b></a></li>
    <li><a href='ins_modulo.php'>Inserisci modulo</a></li>
    <li><a href='ins_layout.php'>Inserisci layout</a></li>
    <li><a href='lista_cli.php'>Visualizza i clienti</a></li>
    <li><a href='lista_svi.php'>Visualizza gli sviluppatori</a></li>
    <li><a href='lista_lay.php'>Visualizza i Layout</a></li>
    <li><a href='lista_mod.php'>Visualizza i moduli</a></li>
    <li><a href='logout.php'>Effettua il logout</a></li>
  </ul>
  <script type='text/javascript'>
  function checkForm(){
    if(document.ins_lay.costo_totale.value==''||
        document.ins_lay.sviluppatore.value==''){
      alert('Devi compilare tutti i campi.');
      return false;
    }else{return true;}
  }
  </script>
  <br>
  <div style="margin-left:17%;padding:1px 16px;height:300px;">
    <form name='ins_lay' action='ins_layout.php' method='post' onsubmit='return checkForm();'>
      <h3>Inserisci il layout:</h><br>
        Costo:<br><input type='integer' name='costo_totale'><br>
        Sviluppatore (Partita iva):<br><input type='text' name='sviluppatore'><br>
      <input type='submit'>
    </form>
  </div>
</body>
<footer>
  <p style="text-align:center">
    site made by Manlio Puglisi<br><br>
  </p>
</footer>
</html>
