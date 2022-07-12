<?php

    require_once('repository/FluRepository.php');
    session_start();

   

    if(fnDeleteJogador($_SESSION['id'])) {
        $msg = "Sucesso ao excluir";
    } else {
        $msg = "Falha na exclusão";
    }

#apagar sessão
    unset($_SESSION['id']);

    $page = "lista-de-jogadores.php";
    setcookie('notify', $msg, time() +10,"/trabalhophp/{$page}", 'localhost');
    header("location: {$page}");
    exit;