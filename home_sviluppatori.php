<?php
session_start();
if($_SESSION["type"]!=2){
  die("Permesso negato.");
}
?>


<html>
<head><link rel="stylesheet" type="text/css" href="css_cli_svi.css" media="screen" /></head>
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
  <div style="margin-left:35%;padding:1px 16px;height:300px;">
    <p><?php echo $_SESSION["username"]; ?>, bentornato.</p>
    <p>Elenco <a href='is_sold.php'>prodotti venduti</a></p>
  </div>;
</body>
<footer>
  <p style="text-align:center">
    site made by Manlio Puglisi<br><br>
  </p>
</footer>
</html>
