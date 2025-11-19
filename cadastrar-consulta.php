<?php
    // Incluir o arquivo de configuração
    include('config.php'); 

    // Consulta para listar Animais e seus Proprietários (para exibição amigável)
    $sql_animal = "SELECT a.id_animal, a.nome_animal, p.nome_proprietario 
                   FROM animal AS a
                   INNER JOIN proprietario AS p ON a.proprietario_id_proprietario = p.id_proprietario
                   ORDER BY a.nome_animal ASC";
    $res_animal = $conn->query($sql_animal);
    $qtd_animais = $res_animal->num_rows;

    // Consulta para listar Veterinários
    $sql_veterinario = "SELECT id_veterinario, nome_veterinario, crmv FROM veterinario ORDER BY nome_veterinario ASC";
    $res_veterinario = $conn->query($sql_veterinario);
    $qtd_veterinarios = $res_veterinario->num_rows;
?>

<h1>Agendar Nova Consulta</h1>
<form action="?page=salvar-consulta" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label for="data_hora" class="form-label">Data e Hora da Consulta</label>
        <input type="datetime-local" name="data_hora" id="data_hora" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="valor" class="form-label">Valor da Consulta (R$)</label>
        <input type="number" step="0.01" name="valor_consulta" id="valor" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="animal" class="form-label">Animal (Paciente)</label>
        <select name="animal_id_animal" id="animal" class="form-select" required>
            <option value="">Selecione o Animal</option>
            <?php
                if ($qtd_animais > 0) {
                    while ($row_animal = $res_animal->fetch_object()) {
                        print "<option value='{$row_animal->id_animal}'>{$row_animal->nome_animal} (Prop: {$row_animal->nome_proprietario})</option>";
                    }
                } else {
                    print "<option value='' disabled>Nenhum Animal cadastrado.</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="veterinario" class="form-label">Veterinário Responsável</label>
        <select name="veterinario_id_veterinario" id="veterinario" class="form-select" required>
            <option value="">Selecione o Veterinário</option>
            <?php
                if ($qtd_veter