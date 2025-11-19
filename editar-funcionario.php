<h1>Editar Veterinário</h1>
<?php
    $sql = "SELECT * FROM veterinario WHERE id_veterinario=".$_REQUEST['id_veterinario'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar-veterinario" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_veterinario" value="<?php print $row->id_veterinario;?>">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Veterinário</label>
        <input type="text" name="nome_veterinario" id="nome" class="form-control" 
               value="<?php print $row->nome_veterinario;?>" required>
    </div>
    <div class="mb-3">
        <label for="crmv" class="form-label">CRMV</label>
        <input type="text" name="crmv" id="crmv" class="form-control" 
               value="<?php print $row->crmv;?>" required>
    </div>
    <div class="mb-3">
        <label for="fone" class="form-label">Telefone</label>
        <input type="text" name="telefone" id="fone" class="form-control" 
               value="<?php print $row->telefone;?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>