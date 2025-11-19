<?php
    // Incluir o arquivo de configuração
    include('config.php'); 

    // Consulta para listar Proprietários (SELECT para o dropdown)
    $sql_proprietario = "SELECT id_proprietario, nome_proprietario FROM proprietario ORDER BY nome_proprietario ASC";
    $res_proprietario = $conn->query($sql_proprietario);
    $qtd_proprietarios = $res_proprietario->num_rows;

    // Consulta para listar Raças (SELECT para o dropdown)
    $sql_raca = "SELECT id_raca, nome_raca, especie_raca FROM raca ORDER BY especie_raca ASC, nome_raca ASC";
    $res_raca = $conn->query($sql_raca);
    $qtd_racas = $res_raca->num_rows;
?>

<h1>Cadastrar Animal</h1>
<form action="?page=salvar-animal" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Animal</label>
        <input type="text" name="nome_animal" id="nome" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="dt_nasc" class="form-label">Data de Nascimento</label>
        <input type="date" name="dt_nasc_animal" id="dt_nasc" class="form-control">
    </div>
    
    <div class="mb-3">
        <label for="proprietario" class="form-label">Proprietário</label>
        <select name="proprietario_id_proprietario" id="proprietario" class="form-select" required>
            <option value="">Selecione o Proprietário</option>
            <?php
                if ($qtd_proprietarios > 0) {
                    while ($row_proprietario = $res_proprietario->fetch_object()) {
                        print "<option value='{$row_proprietario->id_proprietario}'>{$row_proprietario->nome_proprietario}</option>";
                    }
                } else {
                    print "<option value='' disabled>Nenhum Proprietário cadastrado.</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="raca" class="form-label">Raça</label>
        <select name="raca_id_raca" id="raca" class="form-select" required>
            <option value="">Selecione a Raça</option>
            <?php
                if ($qtd_racas > 0) {
                    while ($row_raca = $res_raca->fetch_object()) {
                        // Exibe a espécie para facilitar a escolha
                        print "<option value='{$row_raca->id_raca}'>{$row_raca->nome_raca} ({$row_raca->especie_raca})</option>";
                    }
                } else {
                    print "<option value='' disabled>Nenhuma Raça cadastrada.</option>";
                }
            ?>
        </select>
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Animal</button>
    </div>
</form>