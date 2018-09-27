<?php
session_start();
if($_SESSION["type"]!=3){
  die("Permesso negato.");
}
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css_admin_liste.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
	</script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    <table align="center" id="LAYOUT" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Costo totale</th>
          <th>Sviluppatore</th>
          <th>Moduli</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Costo totale</th>
          <th>Sviluppatore</th>
          <th>Moduli</th>
        </tr>
      </tfoot>
    </table>
  </div>


  <div id="dialogModuli" class="modal">
    <div class="modal-content">
      <table align="center" id="MODULI" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Funzione</th>
            <th>Costo</th>
            <th>Layout</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Funzione</th>
            <th>Costo</th>
            <th>Layout</th>
          </tr>
        </tfoot>
      </table>
      <button role="button" class="modal-close">close</button>
    </div>
  </div>
</body>


<footer>
  <p style="text-align:center">
    site made by Manlio Puglisi<br><br>
  </p>
</footer>

</html>

<script>
var idModulo;
$(document).ready(function(){
  var dialogModulo = $("#dialogModuli").dialog({
    autoOpen: false,
    height: 500,
    width: 550,
    modal: true,
    buttons: {
      Cancel: function() {
        dialogModuli.dialog("close");
      }
    },
    close: function(){}
  });
  var MostraModuli = function (id){
    //console.log('esisto');
    idModulo= id;
    dialogModulo.dialog("open");
    $('#MODULI').dataTable({
      "sAjaxSource": "modal_laymod.php?ID="+idModulo,
      "bFilter": false,
      "dom": "Bfrtip",
      "responsive": true,
      "bDestroy": true,
      "aoColumns": [
        { "mData": "ID" },
        { "mData": "nome" },
        { "mData": "funzione"},
        { "mData": "costo"},
        { "mData": "id_layout"}
      ],
    });
  }
  $('body').on('click', '.show-module',function(){
    MostraModuli($(this).data('id'));
    console.log($(this).data('id'));
  });
  $('#LAYOUT').dataTable( {
    "sAjaxSource": "vedi_lay.php",
    "bFilter": false,
    "dom": "Bfrtip",
    "responsive": true,
    "bDestroy": true,
    "aoColumns": [
      { "mData": "ID" },
      { "mData": "COSTO_TOTALE" },
      { "mData": "SVILUPPATORE"},
      { "mData": "button",
			  "mRender": bottone
      },
    ],
  });
  function bottone(data, type, row){
    return '<input class="show-module" data-id="'+row.ID+'" type="button" value="Mostra i moduli"/>';
  }
  $('#LAYOUT tbody').on('click','tr', function(){
    var table = $('#LAYOUT').DataTable();
    idSelectedLay = table.row(this).id();
    if($(this).hasClass('selected')){
      $(this).removeClass('selected');
    }
    else{
      table.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
    }
  });
 });
</script>
