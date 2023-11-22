<!DOCTYPE html>
<html lang="pt-br">
<?php
  require_once 'core/ManipuladorDados.php';
  // Crie uma instância da classe
  $evento = new dadosEvento('data/dados.json');
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leitura de CSV</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- CDN CSS DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
  <!-- CDN Script DataTables -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Todos os Cadastrados</h1>
    <table id="tabela" class="display table table-striped table-hover ">
      <thead>
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th>CPF</th>
          <th>Telefone Celular</th>
          <th>Data de Nascimento</th>
          <th>Palestra</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        // Exiba os dados salvos
        $evento->recuperarDados(); 
      ?>
      </tbody>
    </table>
  </div>
</body>
</html>
    <script>
        //execucao do Datatable
        $(document).ready(function() {
        $('#tabela').DataTable( {
          lengthMenu: [5 ,10, 50, 100, 150 ],
          language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json',
            },
          dom: 'Bfrtip',
          buttons: [
              'print'
          ]
      } );
      } );
    </script>
    <!-- CDN Script DataTables Extras -->
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
