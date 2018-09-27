<?php
include("db.php");
session_start();
if($_SESSION["type"]!=3){
  die("Permesso negato.");
}
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
//SELECT SVILUPPATORE E NUMERO LAYOUT
$qry = mysqli_query($conn, "SELECT SVILUPPATORE as S, count(SVILUPPATORE) AS NUMERO FROM LAYOUT GROUP BY SVILUPPATORE");
$rows = array();
$table = array();
$table['cols'] = array(
  array('label' => 'S', 'type' => 'string'),
  array('label' => 'NUMERO', 'type' => 'number')
);
$rows = array();
while($r = mysqli_fetch_assoc($qry)) {
  $temp = array();
  $temp[] = array('v' => (string) $r['S']);
  $temp[] = array('v' => (int) $r['NUMERO']);
  $rows[] = array('c' => $temp);
}
$table['rows'] = $rows;
$jsonTabledevelop = json_encode($table);
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="css_admin_home.css" media="screen"/>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>

<header>
<p><a style="margin-right:7%" href="logout.php">logout</a></p>
</header>

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

  <div style="margin-left:15%;padding:1px 16px;">
    <div id="torta_lay">
    </div><br>
    <div id="torta_siti">
    </div>
  </div>

</body>

<footer>
  <p style="text-align:center">
    site made by Manlio Puglisi<br><br>
  </p>
</footer>
</html>

<script type="text/javascript">
// Load the Visualization API and the piechart package.
google.load('visualization', '1', {'packages':['corechart']});
// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawChart);
function drawChart() {
  // Create our data table out of JSON data loaded from server.
  var data = new google.visualization.DataTable(<?=$jsonTabledevelop?>);
  var options = {
    title: 'Layouts Sviluppati:',
    pieHole: 0.2,
    width: 500,
    height: 500,
    backgroundColor: '#D3D3D3'
  };
  // Instantiate and draw our chart, passing in some options.
  // Do not forget to check your div ID
  var chart = new google.visualization.PieChart(document.getElementById('torta_lay'));
  chart.draw(data, options);
}
</script>
