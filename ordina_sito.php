<?php
session_start();
if($_SESSION["type"]!=1){
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
      <li><a class="active" href="home_clienti.php">Home cliente</href></a></li>
      <li><a href='logout.php'>Logout</a></li>
    </ul>
    <div style="margin-left:35%;margin-right:35%;padding:1px 16px;height:300px;background-color:#FFFFFF;border: solid 2px;border-color:#6b6b6b;">
      <script type='text/javascript'>
        function checkForm(){
          if(document.ins_sito.url.value==''||
            document.ins_sito.data_pubblicazione.value==''||
            document.ins_sito.cliente.value==''||
            document.ins_sito.layout.value==''){
              alert('Devi compilare tutti i campi.');
              return false;
          }else{return true;}
      }
      </script>
      <div style="margin-left:25%;margin-right:40%;">
        <form name="ins_sito" action="ordina_sito2.php" method="post" onsubmit='return checkForm();'>
          URL:<br><input type='text' name='url'><br>
          Data di pubblicazione:<br><input type='date' name='data_pubblicazione'><br>
          Cliente:<br><input type='integer' name='cliente'><br>
          Layout:<br><input type='integer' name='layout'><br>
          <input type='submit'>
        </form>
      </div>
    </div>
  </body>
  <footer>
    <p style="text-align:center">
      site made by Manlio Puglisi<br><br>
    </p>
  </footer>
</html>
