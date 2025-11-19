<?php
    include('config.php'); 
    
    $redirecionar = "?page=listar-consulta"; 

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            // Recebe os dados
            $data_hora       = $_POST["data_hora"]; // Campo DATETIME-LOCAL
            $valor           = $_POST["valor_consulta"];
            $animal_id       = $_POST["animal_id_animal"];
            $veterinario_id  = $_POST["veterinario_id_veterinario"];
            // O diagnóstico pode ser inserido vazio no cadastro
            $diagnostico     = $conn->real_escape_string($_POST["diagnostico"]); 

            $sql = "INSERT INTO consulta (data_hora, valor_consulta, animal_id_animal, veterinario_id_veterinario, diagnostico) 
                    VALUES ('{$data_hora}', {$valor}, {$animal_id}, {$veterinario_id}, '{$diagnostico}')";
            
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Consulta agendada com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível agendar a Consulta. Erro: {$conn->error}');</script>";
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;

        case 'editar':
            // Recebe os dados
            $id              = $_POST["id_consulta"];
            $data_hora       = $_POST["data_hora"];
            $valor           = $_POST["valor_consulta"];
            $animal_id       = $_POST["animal_id_animal"];
            $veterinario_id  = $_POST["veterinario_id_veterinario"];
            $diagnostico     = $conn->real_escape_string($_POST["diagnostico"]); 

            $sql = "UPDATE consulta SET 
                        data_hora = '{$data_hora}', 
                        valor_consulta = {$valor}, 
                        animal_id_animal = {$animal_id},
                        veterinario_id_veterinario = {$veterinario_id},
                        diagnostico = '{$diagnostico}'
                    WHERE 
                        id_consulta = {$id}";
            
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Consulta atualizada com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível atualizar a Consulta. Erro: {$conn->error}');</script>";
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
        
        case 'excluir':
            $id = $_REQUEST["id_consulta"];
            $sql = "DELETE FROM consulta WHERE id_consulta = {$id}";
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Consulta excluída com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível excluir a Consulta.');</script>"; 
            }
            print "<script>location.href='{$redirecionar}';</script>";
            break;
    }
?>