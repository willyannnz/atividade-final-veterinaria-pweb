<?php
    include('config.php'); 
    
    $redirecionar = "?page=listar-consulta"; 

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            // 1. Prepara a consulta SQL com placeholders '?'
            // Tipo de dados: data_hora (s), valor_consulta (d de double/decimal), animal_id (i), veterinario_id (i), diagnostico (s)
            $stmt = $conn->prepare("INSERT INTO consulta (data_hora, valor_consulta, animal_id_animal, veterinario_id_veterinario, diagnostico) VALUES (?, ?, ?, ?, ?)");
            
            // 2. Vincula os parâmetros (sdiis)
            $stmt->bind_param("sdiis", 
                $_POST["data_hora"], 
                $_POST["valor_consulta"], 
                $_POST["animal_id_animal"], 
                $_POST["veterinario_id_veterinario"],
                $_POST["diagnostico"]
            );
            
            // 3. Executa
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Consulta agendada com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível agendar a Consulta. Erro: {$stmt->error}');</script>";
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;

        case 'editar':
            // 1. Prepara a consulta SQL com placeholders '?'
            $stmt = $conn->prepare("UPDATE consulta SET data_hora = ?, valor_consulta = ?, animal_id_animal = ?, veterinario_id_veterinario = ?, diagnostico = ? WHERE id_consulta = ?");
            
            // 2. Vincula os parâmetros (sdiisi: 1 string, 1 double/decimal, 2 integers, 1 string, 1 integer para o ID)
            $stmt->bind_param("sdiisi", 
                $_POST["data_hora"], 
                $_POST["valor_consulta"], 
                $_POST["animal_id_animal"],
                $_POST["veterinario_id_veterinario"],
                $_POST["diagnostico"],
                $_POST["id_consulta"]
            );
            
            // 3. Executa
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Consulta atualizada com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível atualizar a Consulta. Erro: {$stmt->error}');</script>";
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;
        
        case 'excluir':
            // 1. Prepara a consulta SQL com placeholders '?'
            $stmt = $conn->prepare("DELETE FROM consulta WHERE id_consulta = ?");
            
            // 2. Vincula o parâmetro (i: integer)
            $stmt->bind_param("i", $_REQUEST["id_consulta"]);

            // 3. Executa
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Consulta excluída com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível excluir a Consulta. Erro: {$stmt->error}');</script>"; 
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;
    }
?>