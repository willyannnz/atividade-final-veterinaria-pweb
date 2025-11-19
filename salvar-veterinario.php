<?php
    // Incluir o arquivo de configuração
    include('config.php'); 
    
    // O destino padrão após a operação
    $redirecionar = "?page=listar-veterinario"; 

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $nome     = $_POST["nome_veterinario"];
            $crmv     = $_POST["crmv"];
            $telefone = $_POST["telefone"];

            $sql = "INSERT INTO veterinario (nome_veterinario, crmv, telefone) 
                    VALUES ('{$nome}', '{$crmv}', '{$telefone}')";
            
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Veterinário cadastrado com sucesso!');</script>";
            } else {
                // Erro comum: CRMV duplicado, pois é um campo UNIQUE
                print "<script>alert('Não foi possível cadastrar. Verifique se o CRMV já existe.');</script>";
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;

        case 'editar':
            $id       = $_POST["id_veterinario"];
            $nome     = $_POST["nome_veterinario"];
            $crmv     = $_POST["crmv"];
            $telefone = $_POST["telefone"];

            $sql = "UPDATE veterinario SET 
                        nome_veterinario = '{$nome}', 
                        crmv = '{$crmv}', 
                        telefone = '{$telefone}'
                    WHERE 
                        id_veterinario = {$id}";
            
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Veterinário atualizado com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível atualizar. Verifique se o CRMV já existe.');</script>";
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
        
        case 'excluir':
            $id = $_REQUEST["id_veterinario"];
            $sql = "DELETE FROM veterinario WHERE id_veterinario = {$id}";
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Veterinário excluído com sucesso!');</script>";
            } else {
                // Mensagem customizada (o veterinário pode ter consultas associadas)
                print "<script>alert('Não foi possível excluir. Verifique se existem consultas associadas a este veterinário.');</script>"; 
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
    }
?>  