<?php 
    include("config.php"); 
?>
<div class="container mt-4">
    <h1>Cadastrar Proprietário</h1>
    <form action="?page=salvar-proprietario" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
            <label>Nome do Proprietário</label>
            <input type="text" name="nome_proprietario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>