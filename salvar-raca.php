<?php
    include("config.php"); 
    
    $redirecionar = "?page=listar-raca"; 

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            // 1. Prepara a consulta SQL com placeholders '?'
            $stmt = $conn->prepare("INSERT INTO raca (nome_raca, especie_raca) VALUES (?, ?)");
            
            // 2. Vincula os parâmetros (ss: 2 strings)
            $stmt->bind_param("ss", 
                $_POST["nome_raca"], 
                $_POST["especie_raca"]
            );
            
            // 3. Executa
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Raça cadastrada com sucesso!');</script>";
            } else {
                // Erro comum: nome_raca duplicado (UNIQUE KEY)
                print "<script>alert('Não foi possível cadastrar a Raça. Verifique se o nome já existe.');</script>";
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;

        case 'editar':
            // 1. Prepara a consulta SQL com placeholders '?'
            $stmt = $conn->prepare("UPDATE raca SET nome_raca = ?, especie_raca = ? WHERE id_raca = ?");
            
            // 2. Vincula os parâmetros (ssi: 2 strings, 1 integer)
            $stmt->bind_param("ssi", 
                $_POST["nome_raca"], 
                $_POST["especie_raca"],
                $_POST["id_raca"]
            );
            
            // 3. Executa
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Raça atualizada com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível atualizar a Raça. Detalhe: " . $stmt->error . "');</script>"; 
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;
        
        case 'excluir':
            // 1. Prepara a consulta SQL com placeholders '?'
            $stmt = $conn->prepare("DELETE FROM raca WHERE id_raca = ?");
            
            // 2. Vincula o parâmetro (i: integer)
            $stmt->bind_param("i", $_REQUEST["id_raca"]);
            
            // 3. Executa
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Raça excluída com sucesso!');</script>";
            } else {
               // Mensagem customizada para erro de chave estrangeira
                print "<script>alert('Não foi possível excluir. Verifique se existem animais cadastrados com esta raça.');</script>"; 
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;
    }
?>