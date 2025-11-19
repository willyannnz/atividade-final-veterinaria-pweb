<?php
    include('config.php'); 
    
    // 1. Buscar os dados da Consulta a ser editada
    $id_consulta = $_REQUEST['id_consulta'];
    $sql_consulta = "SELECT * FROM consulta WHERE id_consulta={$id_consulta}";
    $res_consulta = $conn->query($sql_consulta);
    $row_consulta = $res_consulta->fetch_object();

    // 2. Buscar Animais para o dropdown
    $sql_animal = "SELECT a.id_animal, a.nome_animal, p.nome_proprietario 
                   FROM animal AS a
                   INNER JOIN proprietario AS p ON a.proprietario_id_proprietario = p.id_proprietario
                   ORDER BY a.nome_animal ASC";
    $res_animal = $conn->query($sql_animal);

    // 3. Buscar Veterinários para o dropdown
    $sql_veterinario = "SELECT id_veterinario, nome_veterinario, crmv FROM veterinario ORDER BY nome_veterinario ASC";
    $res_veterinario = $conn->query($sql_veterinario);

    // Formata a data para o formato datetime-local (necessário para o HTML)
    $data_hora_value = date('Y-m-d\TH:i', strtotime($row_consulta->data_hora));
?>

<h1>Editar Consulta #<?php print $row_consulta->id_consulta; ?></h1>
<form action="?page=salvar-consulta" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_consulta" value="<?php print $row_consulta->id_consulta;?>">
    
    <div class="mb-3">
        <label for="data_hora" class="form-label">Data e Hora da Consulta</label>
        <input type="datetime-local" name="data_hora" id="data_hora" class="form-control" 
               value="<?php print $data_hora_value;?>" required>
    </div>

    <div class="mb-3">
        <label for="valor" class="form-label">Valor da Consulta (R$)</label>
        <input type="number" step="0.01" name="valor_consulta" id="valor" class="form-control" 
               value="<?php print $row_consulta->valor_consulta;?>" required>
    </div>

    <div class="mb-3">
        <label for="animal" class="form-label">Animal (Paciente)</label>
        <select name="animal_id_animal" id="animal" class="form-select" required>
            <option value="">Selecione o Animal</option>
            <?php
                while ($row_animal_opt = $res_animal->fetch_object()) {
                    $selected = ($row_animal_opt->id_animal == $row_consulta->animal_id_animal) ? 'selected' : '';
                    print "<option value='{$row_animal_opt->id_animal}' {$selected}>{$row_animal_opt->nome_animal} (Prop: {$row_animal_opt->nome_proprietario})</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="veterinario" class="form-label">Veterinário Responsável</label>
        <select name="veterinario_id_veterinario" id="veterinario" class="form-select" required>
            <option value="">Selecione o Veterinário</option>
            <?php
                while ($row_veterinario_opt = $res_veterinario->fetch_object()) {
                    $selected = ($row_veterinario_opt->id_veterinario == $row_consulta->veterinario_id_veterinario) ? 'selected' : '';
                    print "<option value='{$row_veterinario_opt->id_veterinario}' {$selected}>{$row_veterinario_opt->nome_veterinario} (CRMV: {$row_veterinario_opt->crmv})</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="diagnostico" class="form-label">Diagnóstico</label>
        <textarea name="diagnostico" id="diagnostico" rows="4" class="form-control"><?php print $row_consulta->diagnostico;?></textarea>
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>