<?php
    // Incluir o arquivo de configuração
    include('config.php'); 
    
    // O destino padrão após a operação
    $redirecionar = "?page=listar-proprietario"; 

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $nome    = $_POST["nome_proprietario"];
            $email   = $_POST["email"];
            $telefone = $_POST["telefone"];

            $sql = "INSERT INTO proprietario (nome_proprietario, email, telefone) 
                    VALUES ('{$nome}', '{$email}', '{$telefone}')";
            
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Proprietário cadastrado com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível cadastrar o Proprietário.');</script>";
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;

        case 'editar':
            $id      = $_POST["id_proprietario"];
            $nome    = $_POST["nome_proprietario"];
            $email   = $_POST["email"];
            $telefone = $_POST["telefone"];

            $sql = "UPDATE proprietario SET 
                        nome_proprietario = '{$nome}', 
                        email = '{$email}', 
                        telefone = '{$telefone}'
                    WHERE 
                        id_proprietario = {$id}";
            
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Proprietário atualizado com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível atualizar o Proprietário.');</script>";
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
        
        case 'excluir':
            $id = $_REQUEST["id_proprietario"];
            $sql = "DELETE FROM proprietario WHERE id_proprietario = {$id}";
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Proprietário excluído com sucesso!');</script>";
            } else {
                // Mensagem customizada para o contexto da clínica
                print "<script>alert('Não foi possível excluir. Verifique se existem animais cadastrados para este proprietário.');</script>"; 
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
    }
?>