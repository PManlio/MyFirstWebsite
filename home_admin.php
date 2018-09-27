<?php
session_start();
if($_SESSION["type"]!=3){
  die("Permesso negato.");
}
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="css_admin_home.css" media="screen" />
</head>

<header>
<p><a style="margin-right:7%" href="logout.php">logout</a></p>
</header>

<body>
  <ul>
    <li><a href='ins_sviluppatore.php'>Inserisci sviluppatore</b></a></li>
    <li><a href='ins_modulo.php'>Inserisci modulo</a></li>
    <li><a href='ins_layout.php'>Inserisci layout</a></li>
    <li><a href='lista_cli.php'>Visualizza i clienti</a></li>
    <li><a href='lista_svi.php'>Visualizza gli sviluppatori</a></li>
    <li><a href='lista_lay.php'>Visualizza i Layout</a></li>
    <li><a href='lista_mod.php'>Visualizza i moduli</a></li>
    <li><a href='logout.php'>Effettua il logout</a></li>
  </ul>

  <br><br>

  <div style="margin-left:25%;padding:1px 16px;">
    <br><br>
    <p><?php echo $_SESSION["username"];?>,benvenuto nel pannello degli Admin.<br>
    Prego, scegli pure la tua operazione.<br></p>
    <br>
    Oppure, vai alla pagina di <a href='riepilogo.php'>riepilogo</a>.
    <br><br>
    Per le statistiche, clicka <a href='statistiche.php'>qui</a>.
  </div>

</body>

<footer>
  <p style="text-align:center">
    site made by Manlio Puglisi<br><br>
  </p>
</footer>
</html>
