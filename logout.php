<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
?>
<html>
<head>
  <title>Torna a trovarci presto!</title>
</head>
<body>
  Hai effettuato il logout, sarai reindirizzato alla home tra 2 secondi.
  <script language="javascript">
    setTimeout("window.location.href = 'home.html'",2000);
  </script>
</body>
</html>
