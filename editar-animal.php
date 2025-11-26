<?php
    include("config.php"); 
    
    // 1. Preparar e Executar a consulta principal (Animal) de forma segura
    if (!isset($_REQUEST["id_animal"])) {
        print "<p class='alert alert-danger'>ID do animal não fornecido para edição.</p>";
        return;
    }
    
    $stmt_animal = $conn->prepare("SELECT * FROM animal WHERE id_animal = ?");
    $stmt_animal->bind_param("i", $_REQUEST["id_animal"]);
    $stmt_animal->execute();
    $res = $stmt_animal->get_result();

    if ($res->num_rows == 0) {
        print "<p class='alert alert-danger'>Animal não encontrado.</p>";
        return;
    }

    $row = $res->fetch_object();
    $stmt_animal->close();
?>
<div class="container mt-4">
    <h1>Editar Animal: <?php print $row->nome_animal; ?></h1>
    <form action="?page=salvar-animal" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_animal" value="<?php print $row->id_animal; ?>">

        <div class="mb-3">
            <label>Nome do Animal</label>
            <input type="text" name="nome_animal" value="<?php print $row->nome_animal; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Data de Nascimento</label>
            <input type="date" name="dt_nasc_animal" value="<?php print $row->dt_nasc_animal; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Proprietário</label>
            <select name="proprietario_id_proprietario" class="form-control" required>
                <?php
                    // Busca todos os proprietários
                    $sql_p = "SELECT id_proprietario, nome_proprietario FROM proprietario ORDER BY nome_proprietario";
                    $res_p = $conn->query($sql_p);

                    if ($res_p->num_rows > 0) {
                        while($proprietario = $res_p->fetch_object()){
                            $selected = ($proprietario->id_proprietario == $row->proprietario_id_proprietario) ? 'selected' : '';
                            print "<option value='{$proprietario->id_proprietario}' {$selected}>{$proprietario->nome_proprietario}</option>";
                        }
                    } else {
                        print "<option value=''>Cadastre um proprietário primeiro</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Raça</label>
            <select name="raca_id_raca" class="form-control" required>
                <?php
                    // Busca todas as raças
                    $sql_r = "SELECT id_raca, nome_raca, especie_raca FROM raca ORDER BY nome_raca";
                    $res_r = $conn->query($sql_r);

                    if ($res_r->num_rows > 0) {
                        while($raca = $res_r->fetch_object()){
                            $selected = ($raca->id_raca == $row->raca_id_raca) ? 'selected' : '';
                            print "<option value='{$raca->id_raca}' {$selected}>{$raca->nome_raca} ({$raca->especie_raca})</option>";
                        }
                    } else {
                         print "<option value=''>Cadastre uma raça primeiro</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar Edição</button>
        </div>
    </form>
</div>