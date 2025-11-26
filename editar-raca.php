<?php
    include("config.php"); 
    
    // 1. Preparar e Executar a consulta principal (Raça) de forma segura
    if (!isset($_REQUEST["id_raca"])) {
        print "<p class='alert alert-danger'>ID da raça não fornecido para edição.</p>";
        return;
    }
    
    $stmt = $conn->prepare("SELECT * FROM raca WHERE id_raca = ?");
    $stmt->bind_param("i", $_REQUEST["id_raca"]);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 0) {
        print "<p class='alert alert-danger'>Raça não encontrada.</p>";
        return;
    }

    $row = $res->fetch_object();
    $stmt->close();
?>
<div class="container mt-4">
    <h1>Editar Raça</h1>
    <form action="?page=salvar-raca" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_raca" value="<?php print $row->id_raca; ?>">

        <div class="mb-3">
            <label>Nome da Raça</label>
            <input type="text" name="nome_raca" value="<?php print $row->nome_raca; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Espécie</label>
            <input type="text" name="especie_raca" value="<?php print $row->especie_raca; ?>" class="form-control">
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar Edição</button>
        </div>
    </form>
</div>