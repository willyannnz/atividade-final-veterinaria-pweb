<?php
    include('config.php'); 
    
    $redirecionar = "?page=listar-animal"; 

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $stmt = $conn->prepare("INSERT INTO animal (nome_animal, dt_nasc_animal, proprietario_id_proprietario, raca_id_raca) VALUES (?, ?, ?, ?)");
            
          
            $stmt->bind_param("ssii", 
                $_POST["nome_animal"], 
                $_POST["dt_nasc_animal"], 
                $_POST["proprietario_id_proprietario"], 
                $_POST["raca_id_raca"]
            );
            
        
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Animal cadastrado com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível cadastrar o Animal. Erro: {$stmt->error}');</script>";
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;

        case 'editar':
    
            $stmt = $conn->prepare("UPDATE animal SET nome_animal = ?, dt_nasc_animal = ?, proprietario_id_proprietario = ?, raca_id_raca = ? WHERE id_animal = ?")
        
            $stmt->bind_param("ssiii", 
                $_POST["nome_animal"], 
                $_POST["dt_nasc_animal"], 
                $_POST["proprietario_id_proprietario"],
                $_POST["raca_id_raca"],
                $_POST["id_animal"]
            );
            
     
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Animal atualizado com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível atualizar o Animal. Erro: {$stmt->error}');</script>";
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;
        
        case 'excluir':
       
            $stmt = $conn->prepare("DELETE FROM animal WHERE id_animal = ?");
        
            $stmt->bind_param("i", $_REQUEST["id_animal"]);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Animal excluído com sucesso!');</script>";
            } else {
            
                print "<script>alert('Não foi possível excluir. Verifique se existem consultas agendadas ou realizadas para este animal.');</script>"; 
            }
            $stmt->close();
            print "<script>location.href='{$redirecionar}';</script>";
            break;
    }
?>