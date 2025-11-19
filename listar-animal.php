<div class="container mt-4">
    <h1>Listar Animais</h1>
    <?php
        // A query usa dois INNER JOINs:
        // 1. Para buscar o nome do proprietário (tabela p)
        // 2. Para buscar o nome da raça e espécie (tabela r)
        $sql = "SELECT 
                    a.id_animal, 
                    a.nome_animal, 
                    a.dt_nasc_animal, 
                    p.nome_proprietario, 
                    r.nome_raca,
                    r.especie_raca
                FROM 
                    animal AS a
                INNER JOIN 
                    proprietario AS p
                ON 
                    a.proprietario_id_proprietario = p.id_proprietario
                INNER JOIN 
                    raca AS r
                ON 
                    a.raca_id_raca = r.id_raca";

        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if($qtd > 0){
            print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
            print "<table class='table table-bordered table-striped table-hover'>";
            print "<tr>";
            print "<th>ID</th>";
            print "<th>Nome</th>";
            print "<th>Nascimento</th>"; 
            print "<th>Raça / Espécie</th>"; 
            print "<th>Proprietário</th>"; 
            print "<th>Ações</th>"; 
            print "</tr>";
            
            while($row = $res->fetch_object()){
                // Formata a data para dd/mm/yyyy
                $data_formatada = ($row->dt_nasc_animal) ? date('d/m/Y', strtotime($row->dt_nasc_animal)) : "N/A";

                print "<tr>";
                print "<td>".$row->id_animal."</td>";     
                print "<td>".$row->nome_animal."</td>";     
                print "<td>".$data_formatada."</td>";     
                print "<td>".$row->nome_raca." / ".$row->especie_raca."</td>";
                print "<td>".$row->nome_proprietario."</td>";
                print "<td>
                        <button class='btn btn-success btn-sm' onclick=\"location.href='?page=editar-animal&id_animal={$row->id_animal}';\">Editar</button>
                        <button class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-animal&acao=excluir&id_animal={$row->id_animal}';}\">Excluir</button>
                    </td>";
                print "</tr>";
            }
            
            print "</table>";
            
        } else {
            print "<p class='alert alert-danger'>Nenhum animal encontrado!</p>";
        }
    ?>
</div>