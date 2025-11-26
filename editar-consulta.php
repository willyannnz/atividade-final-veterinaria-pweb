<?php
    include("config.php"); 
    
    // 1. Preparar e Executar a consulta principal (Consulta) de forma segura
    if (!isset($_REQUEST["id_consulta"])) {
        print "<p class='alert alert-danger'>ID da consulta não fornecido para edição.</p>";
        return;
    }
    
    $stmt_consulta = $conn->prepare("SELECT * FROM consulta WHERE id_consulta = ?");
    $stmt_consulta->bind_param("i", $_REQUEST["id_consulta"]);
    $stmt_consulta->execute();
    $res = $stmt_consulta->get_result();

    if ($res->num_rows == 0) {
        print "<p class='alert alert-danger'>Consulta não encontrada.</p>";
        return;
    }

    $row = $res->fetch_object();
    $stmt_consulta->close();
    
    // Ajustar o formato da data_hora para o input datetime-local
    $data_hora_input = date('Y-m-d\TH:i', strtotime($row->data_hora));
?>
<div class="container mt-4">
    <h1>Editar Consulta ID: <?php print $row->id_consulta; ?></h1>
    <form action="?page=salvar-consulta" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_consulta" value="<?php print $row->id_consulta; ?>">

        <div class="mb-3">
            <label>Data e Hora</label>
            <input type="datetime-local" name="data_hora" value="<?php print $data_hora_input; ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Valor da Consulta (R$)</label>
            <input type="number" step="0.01" name="valor_consulta" value="<?php print $row->valor_consulta; ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Diagnóstico (Opcional)</label>
            <textarea name="diagnostico" class="form-control" rows="3"><?php print $row->diagnostico; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Animal</label>
            <select name="animal_id_animal" class="form-control" required>
                <?php
                    // Busca animais (necessário JOIN para exibir nome do proprietário)
                    $sql_a = "SELECT a.id_animal, a.nome_animal, p.nome_proprietario FROM animal AS a JOIN proprietario AS p ON a.proprietario_id_proprietario = p.id_proprietario ORDER BY a.nome_animal";
                    $res_a = $conn->query($sql_a);

                    if ($res_a->num_rows > 0) {
                        while($animal = $res_a->fetch_object()){
                            $selected = ($animal->id_animal == $row->animal_id_animal) ? 'selected' : '';
                            print "<option value='{$animal->id_animal}' {$selected}>{$animal->nome_animal} ({$animal->nome_proprietario})</option>";
                        }
                    } else {
                        print "<option value=''>Cadastre um animal primeiro</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Veterinário</label>
            <select name="veterinario_id_veterinario" class="form-control" required>
                <?php
                    // Busca todos os veterinários
                    $sql_v = "SELECT id_veterinario, nome_veterinario, crmv FROM veterinario ORDER BY nome_veterinario";
                    $res_v = $conn->query($sql_v);

                    if ($res_v->num_rows > 0) {
                        while($veterinario = $res_v->fetch_object()){
                            $selected = ($veterinario->id_veterinario == $row->veterinario_id_veterinario) ? 'selected' : '';
                            print "<option value='{$veterinario->id_veterinario}' {$selected}>{$veterinario->nome_veterinario} (CRMV: {$veterinario->crmv})</option>";
                        }
                    } else {
                        print "<option value=''>Cadastre um veterinário primeiro</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar Edição</button>
        </div>
    </form>
</div>