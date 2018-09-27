<?php
session_start();
if($_SESSION["type"]!=3){
  die("Permesso negato");
}
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);

if(isset($_POST["piva"]) && isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["telefono"])
&& isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["conf_pass"])){
  $pva=$_POST["piva"];
  $usr=$_POST["username"];
  $pas=$_POST["password"];
  $nme=$_POST["nome"];
  $cnm=$_POST["cognome"];
  $tel=$_POST["telefono"];
  $typ= 2;
  $str1="INSERT INTO sviluppatore(piva, username, password, nome, cognome, telefono, type) VALUES('".$pva."', '".$usr."', '".$pas."', '".$nme."', '".$cnm."', '".$tel."', '".$typ."');";

  $ris_sql=mysqli_query($conn, $str1);
  if($ris_sql){echo "Registrazione sviluppatore avvenuta con successo."; header("Location: regsvi.html");}
  else{echo "Registrazione non avvenuta."; header("Location: ins_sviluppatore.php");}
}
?>
<html>
<head><link rel="stylesheet" type="text/css" href="css_admin_home.css" media="screen" /></head>
<header>
<p><a href="logout.php">logout</a></p>
</header>
<title>Inserimento sviluppatore</title>
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
    if(document.ins_svi.username.value==''||
    document.ins_svi.password.value==''||
    document.ins_svi.conf_pass.value==''||
    document.ins_svi.piva.value==''||
    document.ins_svi.nome.value==''||
    document.ins_svi.cognome.value==''||
    document.ins_svi.telefono.value==''){
      alert('Devi compilare tutti i campi.');
      return false;
    }else{return true;}
  }
  </script>
  <br>
  <div style="margin-left:17%;padding:1px 16px;height:300px;">
    <form name='ins_svi' action='ins_sviluppatore.php' method='post' onsubmit='return checkForm();'>
      <h3>Inserisci lo sviluppatore:</h><br>
        Username <br><input type='text' name='username'><br>
        Password <br><input type='password' name='password'><br>
        Conferma password <br><input type='password' name='conf_pass'><br>
        Partita Iva<br><input type='text' name='piva'><br>
        Nome<br><input type='text' name='nome'><br>
        Cognome<br><input type='text' name='cognome'><br>
        Telefono<br><input type='text' name='telefono'><br>
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
