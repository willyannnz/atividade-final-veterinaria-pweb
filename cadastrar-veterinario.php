<?php 
    include("config.php"); 
?>
<div class="container mt-4">
    <h1>Cadastrar Veterinário</h1>
    <form action="?page=salvar-veterinario" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
            <label>Nome do Veterinário</label>
            <input type="text" name="nome_veterinario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>CRMV</label>
            <input type="text" name="crmv" class="form-control" required>
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