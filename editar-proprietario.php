<?php
    include("config.php"); 
    
    
    if (!isset($_REQUEST["id_proprietario"])) {
        print "<p class='alert alert-danger'>ID do proprietário não fornecido para edição.</p>";
        return;
    }
    
    $stmt = $conn->prepare("SELECT * FROM proprietario WHERE id_proprietario = ?");
    $stmt->bind_param("i", $_REQUEST["id_proprietario"]);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 0) {
        print "<p class='alert alert-danger'>Proprietário não encontrado.</p>";
        return;
    }

    $row = $res->fetch_object();
    $stmt->close();
?>
<div class="container mt-4">
    <h1>Editar Proprietário</h1>
    <form action="?page=salvar-proprietario" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_proprietario" value="<?php print $row->id_proprietario; ?>">

        <div class="mb-3">
            <label>Nome do Proprietário</label>
            <input type="text" name="nome_proprietario" value="<?php print $row->nome_proprietario; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?php print $row->email; ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" value="<?php print $row->telefone; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar Edição</button>
        </div>
    </form>
</div>