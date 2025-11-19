<div class="container mt-4">
    <h1>Listagem de Consultas Agendadas</h1>
    <?php
        // A query usa 3 INNER JOINs para buscar todos os nomes relacionados
        $sql = "SELECT 
                    c.id_consulta, 
                    c.data_hora, 
                    c.valor_consulta, 
                    c.diagnostico,
                    a.nome_animal, 
                    p.nome_proprietario,
                    v.nome_veterinario
                FROM 
                    consulta AS c
                INNER JOIN 
                    animal AS a ON c.animal_id_animal = a.id_animal
                INNER JOIN 
                    proprietario AS p ON a.proprietario_id_proprietario = p.id_proprietario
                INNER JOIN 
                    veterinario AS v ON c.veterinario_id_veterinario = v.id_veterinario
                ORDER BY c.data_hora DESC";

        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if($qtd > 0){
            print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
            print "<table class='table table-bordered table-striped table-hover'>";
            print "<thead>";
            print "<tr>";
            print "<th>ID</th>";
            print "<th>Data e Hora</th>";
            print "<th>Animal</th>"; 
            print "<th>Proprietário</th>"; 
            print "<th>Veterinário</th>"; 
            print "<th>Valor</th>";
            print "<th>Ações</th>"; 
            print "</tr>";
            print "</thead>";
            print "<tbody>";
            
            while($row = $res->fetch_object()){
                // Formata data e hora (Ex: 19/11/2025 10:30)
                $data_hora_formatada = date('d/m/Y H:i', strtotime($row->data_hora));

                print "<tr>";
                print "<td>".$row->id_consulta."</td>";     
                print "<td>".$data_hora_formatada."</td>";     
                print "<td>".$row->nome_animal."</td>";     
                print "<td>".$row->nome_proprietario."</td>";
                print "<td>".$row->nome_veterinario."</td>";
                print "<td>R$ ".number_format($row->valor_consulta, 2, ',', '.')."</td>";
                print "<td>
                        <button class='btn btn-success btn-sm' onclick=\"location.href='?page=editar-consulta&id_consulta={$row->id_consulta}';\">Editar</button>
                        <button class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir esta consulta?')){location.href='?page=salvar-consulta&acao=excluir&id_consulta={$row->id_consulta}';}\">Excluir</button>
                    </td>";
                print "</tr>";
            }
            
            print "</tbody>";
            print "</table>";
            
        } else {
            print "<p class='alert alert-danger'>Nenhuma consulta agendada encontrada.</p>";
        }
    ?>
</div>