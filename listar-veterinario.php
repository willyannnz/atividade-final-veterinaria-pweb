<div class="container mt-4">
    <h1>Listar Veterinários</h1>
    <?php
        $sql = "SELECT * FROM veterinario";

        $res = $conn->query($sql);

        $qtd = $res->num_rows;

        if($qtd > 0){
            print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
            print "<table class='table table-bordered table-striped table-hover'>";
            print "<tr>";
            print "<th>ID</th>";
            print "<th>Nome</th>";
            print "<th>CRMV</th>"; 
            print "<th>Telefone</th>"; 
            print "<th>Ações</th>"; 
            print "</tr>";
            
            while($row = $res->fetch_object()){
                print "<tr>";
                print "<td>".$row->id_veterinario."</td>";     
                print "<td>".$row->nome_veterinario."</td>";     
                print "<td>".$row->crmv."</td>";     
                print "<td>".$row->telefone."</td>";
                print "<td>
                        <button class='btn btn-success' onclick=\"location.href='?page=editar-veterinario&id_veterinario={$row->id_veterinario}';\">Editar</button>
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-veterinario&acao=excluir&id_veterinario={$row->id_veterinario}';}\">Excluir</button>
                    </td>";
                print "</tr>";
            }
            
            print "</table>";
            
        } else {
            print "<p class='alert alert-danger'>Nenhum veterinário encontrado!</p>";
        }
    ?>
</div>