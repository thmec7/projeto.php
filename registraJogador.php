<?php

    require_once('repository/FluRepository.php');
    require_once('util/base64.php');

    # https://www.php.net/manual/pt_BR/filter.filters.sanitize.php
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $posicao = filter_input(INPUT_POST, 'posicao', FILTER_SANITIZE_SPECIAL_CHARS);
    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

    $foto = converterBase64($_FILES['foto']);

if(empty($nome) || empty($foto) || empty($posicao) || empty($idade)) {
    $msg = "Preencher todos os campos primeiro.";
   } else {
        if(fnAddJogador($nome, $foto, $posicao, $idade)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }
   }
    $page = "formulario-cadastro-jogador.php";
    setcookie('notify',$msg, time() + 10,"/trabalhophp/{$page}", 'localhost');
    
    header("location: {$page}");
    exit;