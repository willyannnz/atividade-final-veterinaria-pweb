<?php

    include("config.php"); 
?>
<div class="container mt-4">
    <h1>Listar Proprietários</h1>
    <?php
        $sql = "SELECT * FROM proprietario";

        $res = $conn->query($sql);

        if ($res === FALSE) {
             // Exibe o erro de conexão/SQL. Isso é crucial para o debugging.
             print "<p class='alert alert-danger'>ERRO FATAL: Falha ao executar a consulta. Verifique se o config.php está no lugar certo e configurado para 'clinica_veterinaria'. Detalhe: " . $conn->error . "</p>";
             return; 
        }

        $qtd = $res->num_rows;

        if($qtd > 0){
            print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
            print "<table class='table table-bordered table-striped table-hover'>";
            print "<tr>";
            print "<th>ID</th>";
            print "<th>Nome</th>";
            print "<th>Email</th>";
            print "<th>Telefone</th>"; 
            print "<th>Ações</th>"; 
            print "</tr>";
            
            while($row = $res->fetch_object()){
                print "<tr>";
                print "<td>".$row->id_proprietario."</td>";     
                print "<td>".$row->nome_proprietario."</td>";     
                print "<td>".$row->email."</td>";     
                print "<td>".$row->telefone."</td>";
                print "<td>
                        <button class='btn btn-success btn-sm' onclick=\"location.href='?page=editar-proprietario&id_proprietario={$row->id_proprietario}';\">Editar</button>
                        <button class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-proprietario&acao=excluir&id_proprietario={$row->id_proprietario}';}\">Excluir</button>
                    </td>";
                print "</tr>";
            }
            
            print "</table>";
            
        } else {
            print "<p class='alert alert-danger'>Nenhum proprietário encontrado!</p>";
        }
    ?>
</div>