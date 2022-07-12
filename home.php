<?php include('config.php'); 
require_once('repository/FluRepository.php');
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
?>
<!doctype html>
<html lang="pt_BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="col-10 offset-1 mt-5">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-3">
                <h1 class="display-5 fw-bold">Flu- desde 1902</h1>
                <p class="col-md-8 fs-4">Sistema de jogadores do Fluminense em PHP.</p>
            </div>
        </div>
    </div>
    <br><br>
    <?php foreach(fnLocalizaJogadorPorNome($nome) as $usuario): ?>
      <div class="card mb-3"style="max-width: 530px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= $usuario -> foto ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h5 class="card-title">Nome: <?= $usuario -> nome?></h5>
        <p class="card-text">Posição: <?= $usuario -> posicao?></p>
        <p class="card-text">Idade: <?= $usuario -> idade?></p>
            </div>
    </div>
                   <?php endforeach; ?>
    <?php include("rodape.php"); ?>
</body>

</html>