<?php
    include('config.php'); 
    
    // 1. Buscar os dados do Animal a ser editado
    $id_animal = $_REQUEST['id_animal'];
    $sql_animal = "SELECT * FROM animal WHERE id_animal={$id_animal}";
    $res_animal = $conn->query($sql_animal);
    $row_animal = $res_animal->fetch_object();

    // 2. Buscar Proprietários para o dropdown
    $sql_proprietario = "SELECT id_proprietario, nome_proprietario FROM proprietario ORDER BY nome_proprietario ASC";
    $res_proprietario = $conn->query($sql_proprietario);

    // 3. Buscar Raças para o dropdown
    $sql_raca = "SELECT id_raca, nome_raca, especie_raca FROM raca ORDER BY especie_raca ASC, nome_raca ASC";
    $res_raca = $conn->query($sql_raca);
?>

<h1>Editar Animal: <?php print $row_animal->nome_animal; ?></h1>
<form action="?page=salvar-animal" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_animal" value="<?php print $row_animal->id_animal;?>">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Animal</label>
        <input type="text" name="nome_animal" id="nome" class="form-control" 
               value="<?php print $row_animal->nome_animal;?>" required>
    </div>
    
    <div class="mb-3">
        <label for="dt_nasc" class="form-label">Data de Nascimento</label>
        <input type="date" name="dt_nasc_animal" id="dt_nasc" class="form-control" 
               value="<?php print $row_animal->dt_nasc_animal;?>">
    </div>
    
    <div class="mb-3">
        <label for="proprietario" class="form-label">Proprietário</label>
        <select name="proprietario_id_proprietario" id="proprietario" class="form-select" required>
            <option value="">Selecione o Proprietário</option>
            <?php
                while ($row_proprietario = $res_proprietario->fetch_object()) {
                    $selected = ($row_proprietario->id_proprietario == $row_animal->proprietario_id_proprietario) ? 'selected' : '';
                    print "<option value='{$row_proprietario->id_proprietario}' {$selected}>{$row_proprietario->nome_proprietario}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="raca" class="form-label">Raça</label>
        <select name="raca_id_raca" id="raca" class="form-select" required>
            <option value="">Selecione a Raça</option>
            <?php
                while ($row_raca = $res_raca->fetch_object()) {
                    $selected = ($row_raca->id_raca == $row_animal->raca_id_raca) ? 'selected' : '';
                    print "<option value='{$row_raca->id_raca}' {$selected}>{$row_raca->nome_raca} ({$row_raca->especie_raca})</option>";
                }
            ?>
        </select>
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>