<?php 
    include("config.php"); 
?>
<div class="container mt-4">
    <h1>Cadastrar Animal</h1>
    <form action="?page=salvar-animal" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
            <label>Nome do Animal</label>
            <input type="text" name="nome_animal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Data de Nascimento</label>
            <input type="date" name="dt_nasc_animal" class="form-control">
        </div>

        <div class="mb-3">
            <label>Proprietário</label>
            <select name="proprietario_id_proprietario" class="form-control" required>
                <option value="">Selecione um Proprietário</option>
                <?php
                    // Busca Proprietários
                    $sql_p = "SELECT id_proprietario, nome_proprietario, telefone FROM proprietario ORDER BY nome_proprietario";
                    $res_p = $conn->query($sql_p);

                    if ($res_p->num_rows > 0) {
                        while($proprietario = $res_p->fetch_object()){
                            print "<option value='{$proprietario->id_proprietario}'>{$proprietario->nome_proprietario} ({$proprietario->telefone})</option>";
                        }
                    } 
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Raça</label>
            <select name="raca_id_raca" class="form-control" required>
                <option value="">Selecione a Raça</option>
                <?php
                    // Busca Raças
                    $sql_r = "SELECT id_raca, nome_raca, especie_raca FROM raca ORDER BY nome_raca";
                    $res_r = $conn->query($sql_r);

                    if ($res_r->num_rows > 0) {
                        while($raca = $res_r->fetch_object()){
                            print "<option value='{$raca->id_raca}'>{$raca->nome_raca} ({$raca->especie_raca})</option>";
                        }
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>