<!DOCTYPE html>
<?php
require_once 'core/ManipuladorDados.php';
// Crie uma instância da classe
$evento = new dadosEvento('data/dados.json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se o formulário foi enviado, salve os dados
    $nome = $_POST['nome'] ?? '';
    $foto= $_FILES['foto'] ?? '';
    $data = $_POST['data'] ?? '';
    $email = $_POST['email'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $palestra = $_POST['palestras'] ?? '';
    $evento->salvarDados($nome, $foto, $data ,$email, $telefone, $cpf, $palestra);
}
?>

<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário</title>
  <link rel="shortcut icon" href="./img/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.1.2/build/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <style>
    .banner {
      text-align: center;
      margin-bottom: 30px;
    }
    .banner img {
      max-width: 100%;
      height: auto;
    }
    .form-container {
      padding: 20px;
      margin-top: 250px; /* Espaçamento entre banner e formulário */
    }
    .form-label {
      font-weight: bold;
    }

    /* Estilos específicos para telas pequenas (celular) */
    @media (max-width: 767.98px) {
      .form-container {
        margin-top: 100px; /* Ajuste o espaçamento conforme necessário */
      }
    }
  </style>
</head>
<body>
  <div class="banner fixed-top">
    <img src="./img/banner-image.png" alt="Banner" class="img-fluid">
  </div>
  <div class="container form-container">
    <h1 class="form-title">Cadastro Face ID Intelbras SS5530</h1>
    <form id="formulario" action="" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome Completo:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
          </div>
		  <div class="mb-3">
			<label for="foto" class="form-label">Foto:</label>
			<input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
			<small class="form-text text-muted">Escolha uma foto para fazer upload.</small>
		  </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="data" class="form-label">Data:</label>
              <input type="date" name="data" class="form-control" required>
            </div>
            <div class="col-md-8 mb-3">
              <label for="e_mail" class="form-label">E-mail:</label>
              <input type="email" class="form-control" name="email">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cpf" class="form-label">CPF:</label>
              <input type="text" class="form-control" name="cpf">
            </div>
            <div class="col-md-6 mb-3">
              <label for="relefone_celular" class="form-label">Contato:</label>
              <input type="text" class="form-control" name="telefone">
            </div>
          </div>
          <div class="mb-3">
        <label class="form-label">Selecione as palestras:</label>
        <!-- Checkbox para cada palestra -->
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="palestra1" name="palestras[]" value="Palestra1">
          <label class="form-check-label" for="palestra1">
            Palestra 1
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="palestra2" name="palestras[]" value="Palestra2">
          <label class="form-check-label" for="palestra2">
            Palestra 2
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="palestra3" name="palestras[]" value="Palestra3">
          <label class="form-check-label" for="palestra3">
            Palestra 3
          </label>
        </div>    
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>
<!-- <script>
        // Adiciona um evento de envio ao formulário
        document.getElementById('formulario').addEventListener('submit', function (event) {
            // Exibe a mensagem de alerta
            window.alert('Dados enviados com sucesso!');

            // Limpa o formulário
            this.reset();

            // Impede que o formulário seja enviado normalmente
            event.preventDefault();
        });
    </script> -->
  <!-- Script para passar os valores e paramentros após dar o Submit no Formulario myForm -->
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.1.2/build/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input@1.3.4/dist/bs-custom-file-input.min.js"></script>
</body>
</html>
