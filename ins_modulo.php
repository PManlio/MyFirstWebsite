<?php
//inserimento modulo
session_start();
if($_SESSION["type"]!=3){
  die("Permesso negato");
}
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);
if(isset($_POST["nome"]) && isset($_POST["funzione"]) && isset($_POST["costo"]) && isset($_POST["id_lay"])){
  $ID=NULL;
  $nme=$_POST["nome"];
  $fnc=$_POST["funzione"];
  $cst=$_POST["costo"];
  $idl=$_POST["id_lay"];
  $str="INSERT INTO modulo(id, nome, funzione, costo, id_layout) VALUES('".$ID."', '".$nme."', '".$fnc."', '".$cst."', '".$idl."');";

  $ris_sql=mysqli_query($conn, $str);
  if($ris_sql){echo "Registrazione sviluppatore avvenuta con successo."; header("Location: regmod.html");}
  else{echo "Registrazione non avvenuta."; header("Location: ins_modulo.php");}
}
?>
<html>
<head><link rel="stylesheet" type="text/css" href="css_admin_home.css" media="screen" /></head>
<header>
<p><a href="logout.php">logout</a></p>
</header>
<title>Inserimento modulo</title>
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
      if(document.ins_mod.nome.value==''||
        document.ins_mod.funzione.value==''||
        document.ins_mod.costo.value==''||
        document.ins_mod.id_lay.value==''){
          alert('Devi compilare tutti i campi.');
          return false;
      }else{return true;}1
  }
  </script>
  <br>
  <div style="margin-left:17%;padding:1px 16px;height:300px;">
    <form name='ins_mod' action='ins_modulo.php' method='post' onsubmit='return checkForm();'>
      <h3>Inserisci il modulo:</h><br>
      Nome:<br><input type='text' name='nome'><br>
      Funzione:<br><input type='text' name='funzione'><br>
      Costo:<br><input type='integer' name='costo'><br>
      ID del layout di appartenenza:<br><input type='integer' name='id_lay'><br>
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
