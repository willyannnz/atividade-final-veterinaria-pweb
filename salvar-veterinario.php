<?php
    include('config.php'); 
    
    $redirecionar = "?page=listar-veterinario"; 

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            // 1. Prepara a consulta SQL com placeholders '?'
            $stmt = $conn->prepare("INSERT INTO veterinario (nome_veterinario, crmv, telefone) VALUES (?, ?, ?)");
            
            // 2. Vincula os parâmetros (sss: 3 strings)
            $stmt->bind_param("sss", 
                $_POST["nome_veterinario"], 
                $_POST["crmv"], 
                $_POST["telefone"]
            );
            
            // 3. Executa
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Veterinário cadastrado com sucesso!');</script>";
            } else {
                // Erro comum: CRMV duplicado (UNIQUE KEY)
                print "<script>alert('Não foi possível cadastrar. Verifique se o CRMV já existe.');</script>";
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;

        case 'editar':
            // 1. Prepara a consulta SQL com placeholders '?'
            $stmt = $conn->prepare("UPDATE veterinario SET nome_veterinario = ?, crmv = ?, telefone = ? WHERE id_veterinario = ?");
            
            // 2. Vincula os parâmetros (sssi: 3 strings, 1 integer)
            $stmt->bind_param("sssi", 
                $_POST["nome_veterinario"], 
                $_POST["crmv"], 
                $_POST["telefone"],
                $_POST["id_veterinario"]
            );
            
            // 3. Executa
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Veterinário atualizado com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível atualizar. Verifique se o CRMV já existe.');</script>";
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;
        
        case 'excluir':
            // 1. Prepara a consulta SQL com placeholders '?'
            $stmt = $conn->prepare("DELETE FROM veterinario WHERE id_veterinario = ?");
            
            // 2. Vincula o parâmetro (i: integer)
            $stmt->bind_param("i", $_REQUEST["id_veterinario"]);
            
            // 3. Executa
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Veterinário excluído com sucesso!');</script>";
            } else {
                // Mensagem customizada para erro de chave estrangeira
                print "<script>alert('Não foi possível excluir. Verifique se existem consultas associadas a este veterinário.');</script>"; 
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;
    }
?>