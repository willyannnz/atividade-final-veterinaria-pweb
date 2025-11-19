<?php
    include('config.php'); 
    
    $redirecionar = "?page=listar-animal"; 

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $nome            = $_POST["nome_animal"];
            $dt_nasc         = $_POST["dt_nasc_animal"];
            $proprietario_id = $_POST["proprietario_id_proprietario"];
            $raca_id         = $_POST["raca_id_raca"];

            $sql = "INSERT INTO animal (nome_animal, dt_nasc_animal, proprietario_id_proprietario, raca_id_raca) 
                    VALUES ('{$nome}', '{$dt_nasc}', {$proprietario_id}, {$raca_id})";
            
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Animal cadastrado com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível cadastrar o Animal. Erro: {$conn->error}');</script>";
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;

        case 'editar':
            $id              = $_POST["id_animal"];
            $nome            = $_POST["nome_animal"];
            $dt_nasc         = $_POST["dt_nasc_animal"];
            $proprietario_id = $_POST["proprietario_id_proprietario"];
            $raca_id         = $_POST["raca_id_raca"];

            $sql = "UPDATE animal SET 
                        nome_animal = '{$nome}', 
                        dt_nasc_animal = '{$dt_nasc}', 
                        proprietario_id_proprietario = {$proprietario_id},
                        raca_id_raca = {$raca_id}
                    WHERE 
                        id_animal = {$id}";
            
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Animal atualizado com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível atualizar o Animal. Erro: {$conn->error}');</script>";
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
        
        case 'excluir':
            $id = $_REQUEST["id_animal"];
            $sql = "DELETE FROM animal WHERE id_animal = {$id}";
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Animal excluído com sucesso!');</script>";
            } else {
                // Mensagem customizada (consultas podem estar associadas)
                print "<script>alert('Não foi possível excluir. Verifique se existem consultas agendadas ou realizadas para este animal.');</script>"; 
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
    }
?>