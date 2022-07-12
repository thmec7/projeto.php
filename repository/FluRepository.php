<?php

    require_once('Connection.php');

    # CRUD

    function fnAddJogador($nome, $foto, $posicao, $idade) {
        $con = getConnection();
        
        # SQL Injection
        $sql = "insert into usuario (nome, foto, posicao, idade) values (:pNome, :pFoto, :pPosicao, :pIdade)";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pNome", $nome); 
        $stmt->bindParam(":pFoto", $foto); 
        $stmt->bindParam(":pPosicao", $posicao); 
        $stmt->bindParam(":pIdade", $idade); 
        
        return $stmt->execute();
    }
    function fnListFlu() {
        $con = getConnection();
        $sql = "select * from usuario";
     $result = $con->query($sql);

     $lstFlu = array();
     while($usuario = $result->fetch(PDO::FETCH_OBJ)) {
         array_push($lstFlu,$usuario);
     }
     return $lstFlu;

    }
    
    function fnLocalizaJogadorPorNome($nome) {
        $con = getConnection();
    
        $sql = "select * from usuario where nome like :pNome limit 20";
    
        $stmt = $con->prepare($sql);
    
        $stmt->bindValue(":pNome", "%{$nome}%");
    
        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }


    function fnLocalizaJogadorPorId($id) {
        $con = getConnection();
        $sql = "select * from usuario where id = :pID";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID",$id);
     
if($stmt->execute()) {
    return $stmt->fetch(PDO::FETCH_OBJ);
}
return null;



    }
    function fnUpdateJogador($id, $nome, $foto, $posicao, $idade) {
        $con = getConnection();
        

        $sql = "update usuario set nome = :pNome, foto = :pFoto, posicao = :pPosicao, idade = :pIdade where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pNome", $nome); 
        $stmt->bindParam(":pFoto", $foto);
        $stmt->bindParam(":pPosicao", $posicao); 
        $stmt->bindParam(":pIdade", $idade); 
   
        
        return $stmt->execute();
    }
    function fnDeleteJogador($id) {
        $con = getConnection();
        

        $sql = "delete from usuario where id= :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        return $stmt->execute();
    }