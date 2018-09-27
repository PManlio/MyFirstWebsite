<?php
session_start();
if($_SESSION["type"]!=1){die("permesso negato.");}
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="css_cli_svi.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
  </script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js">
  </script>
</head>
<body>
  <header>
    <p><a href="logout.php">logout</a>&nbsp;&nbsp;&nbsp;<a href="home_clienti.php">home clienti</a></p>
  </header>
  <body>
    <ul>
      <li><a class="active" href="home_clienti.php">La tua Home</href></a></li>
      <li><a href='logout.php'>Logout</a></li>
    </ul>
    <br><br>
    <div style="padding:1px 16px;">
      <table id="SITI" align="center" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Codice sito</th>
            <th>URL</th>
            <th>Data pubblicazione</th>
            <th>Cliente</th>
            <th>Codice layout</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Codice sito</th>
            <th>URL</th>
            <th>Data pubblicazione</th>
            <th>Cliente</th>
            <th>Codice layout</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <br><br><br>
</body>
<footer>
  <p style="text-align:center">
    site made by Manlio Puglisi<br><br>
  </p>
</footer>
</html>

<script>
$(document).ready(function(){
  $('#SITI').dataTable( {
    "sAjaxSource": "ordered2.php",
    "bFilter": false,
    "dom": "Bfrtip",
    "responsive": true,
    "bDestroy": true,
    "aoColumns": [
      { "mData": "codice" },
      { "mData": "url" },
      { "mData": "data_pubblicazione"},
      { "mData": "cliente"},
      { "mData": "layout"}
    ],
  });
})
</script>
