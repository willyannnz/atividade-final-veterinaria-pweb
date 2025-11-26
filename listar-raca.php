<?php
    include("config.php"); 
?>
<div class="container mt-4">
    <h1>Listar Raças</h1>
    <?php
        $sql = "SELECT id_raca, nome_raca, especie_raca FROM raca";

        $res = $conn->query($sql);

        // Verifica se houve um erro no SQL ou na conexão
        if ($res === FALSE) {
             // Exibe o erro do MySQL para ajudar no diagnóstico
             print "<p class='alert alert-danger'>ERRO FATAL: Falha ao executar a consulta em Raças. Detalhe: " . $conn->error . "</p>";
             return; 
        }

        $qtd = $res->num_rows;

        if($qtd > 0){
            print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
            print "<table class='table table-bordered table-striped table-hover'>";
            print "<tr>";
            print "<th>ID</th>";
            print "<th>Raça</th>";
            print "<th>Espécie</th>"; 
            print "<th>Ações</th>"; 
            print "</tr>";
            
            while($row = $res->fetch_object()){
                print "<tr>";
                print "<td>".$row->id_raca."</td>";     
                print "<td>".$row->nome_raca."</td>";     
                print "<td>".$row->especie_raca."</td>";     
                print "<td>
                        <button class='btn btn-success btn-sm' onclick=\"location.href='?page=editar-raca&id_raca={$row->id_raca}';\">Editar</button>
                        <button class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-raca&acao=excluir&id_raca={$row->id_raca}';}\">Excluir</button>
                    </td>";
                print "</tr>";
            }
            
            print "</table>";
            
        } else {
            print "<p class='alert alert-danger'>Nenhuma raça encontrada!</p>";
        }
    ?>
</div>