<h1>Editar Proprietário</h1>
<?php
    $sql = "SELECT * FROM proprietario WHERE id_proprietario=".$_REQUEST['id_proprietario'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar-proprietario" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_proprietario" value="<?php print $row->id_proprietario;?>">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Proprietário</label>
        <input type="text" name="nome_proprietario" id="nome" class="form-control" 
               value="<?php print $row->nome_proprietario;?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" 
               value="<?php print $row->email;?>">
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