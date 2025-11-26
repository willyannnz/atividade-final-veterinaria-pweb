<?php

    include("config.php"); 
    
 
    $redirecionar = "?page=listar-raca"; 

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
    
            $nome    = $_POST["nome_raca"];
            $especie = $_POST["especie_raca"];

    
            $sql = "INSERT INTO raca (nome_raca, especie_raca) 
                    VALUES ('{$nome}', '{$especie}')";
            
    
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Raça cadastrada com sucesso!');</script>";
            } else {
                
                print "<script>alert('Não foi possível cadastrar a Raça. Verifique se o nome já existe.');</script>";
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;

        case 'editar':
          
            $id      = $_POST["id_raca"];
            $nome    = $_POST["nome_raca"];
            $especie = $_POST["especie_raca"];

         
            $sql = "UPDATE raca SET 
                        nome_raca = '{$nome}', 
                        especie_raca = '{$especie}' 
                    WHERE 
                        id_raca = {$id}";
            
         
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Raça atualizada com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível atualizar a Raça. Detalhe: " . $conn->error . "');</script>"; 
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
        
        case 'excluir':
            
            $id = $_REQUEST["id_raca"];
            
           
            $sql = "DELETE FROM raca WHERE id_raca = {$id}";
            $res = $conn->query($sql);

            
            if ($res == true) {
                print "<script>alert('Raça excluída com sucesso!');</script>";
            } else {
               
                print "<script>alert('Não foi possível excluir. Verifique se existem animais cadastrados com esta raça.');</script>"; 
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
    }
?