<?php
    
    include("config.php"); 
 
    $id_raca = $_REQUEST['id_raca'];

    
    $sql = "SELECT id_raca, nome_raca, especie_raca FROM raca WHERE id_raca=".$id_raca;
    $res = $conn->query($sql);
    
    
    if ($res === FALSE || $res->num_rows == 0) {
        print "<p class='alert alert-danger'>Erro ao buscar Raça ou Raça não encontrada.</p>";
        print "<script>location.href='?page=listar-raca';</script>";
        return;
    }
    

    $row = $res->fetch_object();
?>

<div class="container mt-5">
    <h1>Editar Raça: <?php print $row->nome_raca; ?></h1>
    
    <form action="?page=salvar-raca" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_raca" value="<?php print $row->id_raca;?>">
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Raça</label>
            <input type="text" name="nome_raca" id="nome" class="form-control" 
                   value="<?php print $row->nome_raca;?>" required>
        </div>
        
        <div class="mb-3">
            <label for="especie" class="form-label">Espécie (Ex: Cão, Gato)</label>
            <input type="text" name="especie_raca" id="especie" class="form-control" 
                   value="<?php print $row->especie_raca;?>" required>
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <button onclick="location.href='?page=listar-raca';" class="btn btn-secondary">Cancelar</button>
        </div>
    </form>
</div>