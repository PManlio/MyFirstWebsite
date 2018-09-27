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
    <li><a href='logout.php'>Effettua il logout</a></li>
  </ul>

  <div style="margin-left:5%;padding:1px 16px;">
    <br><br>
    Seleziona l'ID del cliente che vuoi visualizzare:
    <select id="clientidropdown">
    </select>
    <table id="CLIENTI" class="display" cellspacing="0" width="100%" style="margin-right:25%;margin-right:7%;">
      <thead>
        <tr>
          <th>Codice Fiscale</th>
          <th>Citt&agrave</th>
          <th>Telefono</th>
          <th>Indirizzo</th>
          <th>Numero Siti</th>
          <th>Spesa Totale</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Codice Fiscale</th>
          <th>Citt&agrave</th>
          <th>Telefono</th>
          <th>Indirizzo</th>
          <th>Numero Siti</th>
          <th>Spesa Totale</th>
        </tr>
      </tfoot>
    </table>
    <br><br>
    Seleziona la partita iva dello sviluppatore che vuoi visualizzare:
    <select id="sviluppatoridropdown">
    </select>
    <table id="SVILUPPATORI" class="display" cellspacing="0" width="100%" style="margin-right:25%;">
      <thead>
        <tr>
          <th>Partita Iva</th>
          <th>Nome</th>
          <th>Cognome</th>
          <th>Telefono</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Partita Iva</th>
          <th>Nome</th>
          <th>Cognome</th>
          <th>Telefono</th>
        </tr>
      </tfoot>
    </table>
    <br><br>
    Seleziona l'ID del layout che vuoi visualizzare:
    <select id="layoutdropdown">
    </select>
    <table id="LAYOUT" class="display" cellspacing="0" width="100%" style="margin-right:25%;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Costo totale</th>
          <th>sviluppatore</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Costo totale</th>
          <th>sviluppatore</th>
        </tr>
      </tfoot>
    </table>
    <br><br>
    Seleziona l'ID del modulo che vuoi visualizzare:
    <select id="modulidropdown">
    </select>
    <table id="MODULI" class="display" cellspacing="0" width="100%" style="margin-right:25%;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Funzione</th>
          <th>Costo</th>
          <th>ID layout di appartenenza</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Funzione</th>
          <th>Costo</th>
          <th>ID layout di appartenenza</th>
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

  $('#clientidropdown').empty();
  $('#sviluppatoridropdown').empty();
  $('#modulidropdown').empty();
  $('#layoutdropdown').empty();

  $.ajax({
    type: "POST",
    url: "dataselectclienti.php",
    success: function(data){
      var opts = $.parseJSON(data);
      $.each(opts, function(i, d) {
        $('#clientidropdown').append('<option value="' + d.CODICE + '">' + d.CODICE + '</option>');
      });
    }
  });

  $('#clientidropdown').on('change', function() {
    var dataclienti = $('#CLIENTI').dataTable( {
      "processing": true,
      "serverSide": true,
      "bDestroy": true,
      "bJQueryUI": true,
      "sAjaxSource": "vedi_cli_2.php?codice="+$('#clientidropdown').val(),
      "bFilter": false,
      "dom": "Bfrtip",
      "responsive": true,
      "bDestroy": true,
      "aoColumns": [
        { "mData": "CODICE" },
        { "mData": "CITTA" },
        { "mData": "INDIRIZZO"},
        { "mData": "TELEFONO"},
        { "mData": "N_SITI"},
        { "mData": "SPESA_TOTALE"}
      ],
    });
  })

  $.ajax({
    type: "POST",
    url: "dataselectsviluppatori.php",
    success: function(data){
      var opts = $.parseJSON(data);
      $.each(opts, function(i, d) {
        $('#sviluppatoridropdown').append('<option value="' + d.PIVA + '">' + d.PIVA + '</option>');
      });
    }
  });

  $('#sviluppatoridropdown').on('change', function() {
    var datasviluppatori = $('#SVILUPPATORI').dataTable( {
      "processing": true,
      "serverSide": true,
      "bDestroy": true,
      "bJQueryUI": true,
      "sAjaxSource": "vedi_svi_2.php?PIVA="+$('#sviluppatoridropdown').val(),
      "bFilter": false,
      "dom": "Bfrtip",
      "responsive": true,
      "bDestroy": true,
      "aoColumns": [
        { "mData": "PIVA" },
        { "mData": "NOME" },
        { "mData": "COGNOME"},
        { "mData": "TELEFONO"}
      ],
    });
  })


  $.ajax({
    type: "POST",
    url: "dataselectlayout.php",
    success: function(data){
      var opts = $.parseJSON(data);
      $.each(opts, function(i, d) {
        $('#layoutdropdown').append('<option value="' + d.ID + '">' + d.ID + '</option>');
      });
    }
  });

  $('#layoutdropdown').on('change', function() {
    var datamoduli = datasviluppatori = $('#LAYOUT').dataTable( {
      "processing": true,
      "serverSide": true,
      "bDestroy": true,
      "bJQueryUI": true,
      "sAjaxSource": "vedi_lay_2.php?ID="+$('#layoutdropdown').val(),
      "bFilter": false,
      "dom": "Bfrtip",
      "responsive": true,
      "bDestroy": true,
      "aoColumns": [
        { "mData": "ID" },
        { "mData": "COSTO_TOTALE" },
        { "mData": "SVILUPPATORE"}
      ],
    });
  })
})

$.ajax({
  type: "POST",
  url: "dataselectmoduli.php",
  success: function(data){
    var opts = $.parseJSON(data);
    $.each(opts, function(i, d) {
      $('#modulidropdown').append('<option value="' + d.ID + '">' + d.ID + '</option>');
    });
  }
});

$('#modulidropdown').on('change', function() {
  var datamoduli = datasviluppatori = $('#MODULI').dataTable( {
    "processing": true,
    "serverSide": true,
    "bDestroy": true,
    "bJQueryUI": true,
    "sAjaxSource": "vedi_mod_2.php?ID="+$('#modulidropdown').val(),
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
