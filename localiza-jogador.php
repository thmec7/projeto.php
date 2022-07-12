<?php
    require_once('repository/FluRepository.php');
    $nome = filter_input(INPUT_POST, 'nomeJogador', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: lista-de-jogadores.php?nome={$nome}");
    exit;