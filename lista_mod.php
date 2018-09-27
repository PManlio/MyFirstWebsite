<?php
session_start();
if($_SESSION["type"]!=3){
  die("Permesso negato.");
}
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css_admin_liste.css" media="screen" />
  <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
  </script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js">
  </script>
</head>

<header>
<p><a style="margin-right:7%" href="logout.php">logout</a></p>
</header>

<body>
  <ul>
    <li><a href='home_admin.php'>Home admin</b></a></li>
    <li><a href='lista_cli.php'>Visualizza i clienti</a></li>
    <li><a href='lista_svi.php'>Visualizza gli sviluppatori</a></li>
    <li><a href='lista_lay.php'>Visualizza i Layout</a></li>
    <li><a href='lista_mod.php'>Visualizza i moduli</a></li>
    <li><a href='logout.php'>Logout</a></li>
  </ul>
  <br><br>
  <div style="padding:1px 16px;">
    <table align="center" id="MODULI" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Funzione</th>
          <th>Costo</th>
          <th>ID layout</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Funzione</th>
          <th>Costo</th>
          <th>ID layout</th>
        </tr>
      </tfoot>
    </table>
  </div>
</body>

<footer>
  <p style="text-align:center">
    site made by Manlio Puglisi<br><br>
  </p>
</footer>
</html>

<script>
$(document).ready(function(){
  $('#MODULI').dataTable( {
    "sAjaxSource": "vedi_mod.php",
    "bFilter": false,
    "dom": "Bfrtip",
    "responsive": true,
    "bDestroy": true,
    "aoColumns": [
      { "mData": "ID" },
      { "mData": "NOME" },
      { "mData": "FUNZIONE"},
      { "mData": "COSTO"},
      { "mData": "ID_LAYOUT"}
    ],
  });
})
</script>
