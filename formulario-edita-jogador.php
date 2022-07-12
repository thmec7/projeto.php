<?php
    include('config.php'); 
    require_once('repository/FluRepository.php'); 

     $id = $_SESSION['id'];
    $usuario = fnLocalizaJogadorPorId($id);
?>
<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Jogadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">
        <fieldset>
            <legend>Edição de Jogador</legend>
            <form action="editajogador.php" method="post" class="form" enctype="multipart/form-data">
            <div class="card col-4 offset-4 text-center">
                    <img src="<?= $usuario->foto ?>" id="avatarId" class="rounded" alt="foto do jogador">
                </div>
                <div class="mb-3 form-group">
                    <label for="fotoId" class="form-label">Foto</label>
                    <input type="file" name="foto" id="fotoId" class="form-control">
                    <div id="helperFoto" class="form-text">Importe a foto</div>
                </div>
            <div> 
            <input type="hidden" name="idJogador" id="jogadorId"value="<?= $usuario->id ?>">
            </div>
                <div class="mb-3 form-group">
                    <label for="nomeId" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome" value="<?= $usuario->nome ?>">
                    <div id="helperNome" class="form-text">Informe o nome completo</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="posicaoId" class="form-label">Posição </label>
                    <input type="text" name="posicao" id="posicaoId" class="form-control" placeholder="Informe sua posição" value="<?= $usuario->posicao ?>">
                    <div id= "helperAnimepreferido" class="form-text">Informe sua posição</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="idadeId" class="form-label">idade</label>
                    <input type="number" name="idade" id="idadeId" class="form-control" placeholder="Informe a sua idade" value="<?= $usuario->idade ?>">
                    <div id="helperIdade" class="form-text">Informe a sua idade</div>
                </div>
                              <button type="submit" class="btn btn-dark">Enviar</button>
                <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
            </form>
        </fieldset>
    </div>
    <?php include("rodape.php"); ?>
    <script src="js/base64.js"></script>
  </body>
</html>