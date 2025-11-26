<?php
    include("config.php"); 
    
    $redirecionar = "?page=listar-proprietario"; 

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
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
                print "<script>alert('Não foi possível atualizar. Detalhe: " . $conn->error . "');</script>"; 
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
    
                print "<script>alert('Não foi possível excluir. Verifique se existem animais cadastrados para este proprietário.');</script>"; 
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
    }