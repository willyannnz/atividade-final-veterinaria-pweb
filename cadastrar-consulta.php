<?php 
    include("config.php"); 
?>
<div class="container mt-4">
    <h1>Agendar Nova Consulta</h1>
    <form action="?page=salvar-consulta" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
            <label>Data e Hora</label>
            <input type="datetime-local" name="data_hora" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Valor da Consulta (R$)</label>
            <input type="number" step="0.01" name="valor_consulta" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Diagnóstico (Opcional, pode ser preenchido depois)</label>
            <textarea name="diagnostico" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>Animal</label>
            <select name="animal_id_animal" class="form-control" required>
                <option value="">Selecione o Animal</option>
                <?php
                    // Busca animais (JOIN para exibir nome do proprietário)
                    $sql_a = "SELECT a.id_animal, a.nome_animal, p.nome_proprietario FROM animal AS a JOIN proprietario AS p ON a.proprietario_id_proprietario = p.id_proprietario ORDER BY a.nome_animal";
                    $res_a = $conn->query($sql_a);

                    if ($res_a->num_rows > 0) {
                        while($animal = $res_a->fetch_object()){
                            print "<option value='{$animal->id_animal}'>{$animal->nome_animal} (Prop: {$animal->nome_proprietario})</option>";
                        }
                    } 
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Veterinário</label>
            <select name="veterinario_id_veterinario" class="form-control" required>
                <option value="">Selecione o Veterinário</option>
                <?php
                    // Busca Veterinários
                    $sql_v = "SELECT id_veterinario, nome_veterinario, crmv FROM veterinario ORDER BY nome_veterinario";
                    $res_v = $conn->query($sql_v);

                    if ($res_v->num_rows > 0) {
                        while($veterinario = $res_v->fetch_object()){
                            print "<option value='{$veterinario->id_veterinario}'>{$veterinario->nome_veterinario} (CRMV: {$veterinario->crmv})</option>";
                        }
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Agendar Consulta</button>
        </div>
    </form>
</div>