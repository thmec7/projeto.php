<?php

    require_once('repository/FluRepository.php');
    require_once('util/base64.php');
    session_start();

    $id = filter_input(INPUT_POST, 'idJogador', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $posicao = filter_input(INPUT_POST, 'posicao', FILTER_SANITIZE_SPECIAL_CHARS);
    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
    

    $foto = converterBase64($_FILES['foto']);

    if(fnUpdateJogador($id, $nome, $foto, $posicao, $idade)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }
    
    $_SESSION['id'] = $id;
    $page = "formulario-edita-jogador.php";
    setcookie('notify', $msg, time() +10, "/trabalhophp/{$page}",'localhost');
    header("location: {$page}");
    exit;