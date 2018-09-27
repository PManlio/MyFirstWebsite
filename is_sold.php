<?php
include("db.php");
$conn=mysqli_connect($db_host, $db_user, $db_password, $db_database);
mysqli_select_db($conn, $db_database);
session_start();
if($_SESSION["type"]!=2){die("permesso negato.");}
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="css_cli_svi.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
	</script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js">
	</script>
</head>
<header>
<p><a href="login.html">login</a>&nbsp;&nbsp;&nbsp;<a href="register.html">registrati</a></p>
</header>
<body>
  <ul>
    <li><a class="active" href="Home.html">Home</href></a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href='logout.php'>Logout</a></li>
  </ul>
  <br>
  <div style=";padding:1px 16px;">
    <table id="LAYOUT" class="display" cellspacing="0" width="100%" style="margin-right:25%;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Costo totale</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Costo totale</th>
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
$('#LAYOUT').dataTable( {
  "sAjaxSource": "is_sold2.php",
  "bFilter": false,
  "dom": "Bfrtip",
  "responsive": true,
  "bDestroy": true,
  "aoColumns": [
    { "mData": "ID" },
    { "mData": "COSTO_TOTALE" },
  ],
});
})
</script>
