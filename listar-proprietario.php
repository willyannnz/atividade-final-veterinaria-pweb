<div class="container mt-4">
    <h1>Listar Proprietários</h1>
    <?php
        // A tabela proprietario tem id_proprietario, nome_proprietario, telefone, email
        $sql = "SELECT * FROM proprietario";

        $res = $conn->query($sql);

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
                        <button class='btn btn-success' onclick=\"location.href='?page=editar-proprietario&id_proprietario={$row->id_proprietario}';\">Editar</button>
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-proprietario&acao=excluir&id_proprietario={$row->id_proprietario}';}\">Excluir</button>
                    </td>";
                print "</tr>";
            }
            
            print "</table>";
            
        } else {
            print "<p class='alert alert-danger'>Nenhum proprietário encontrado!</p>";
        }
    ?>
</div>