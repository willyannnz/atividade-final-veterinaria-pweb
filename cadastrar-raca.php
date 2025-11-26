<?php 
    include("config.php"); 
?>
<div class="container mt-4">
    <h1>Cadastrar Raça</h1>
    <form action="?page=salvar-raca" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
            <label>Nome da Raça</label>
            <input type="text" name="nome_raca" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Espécie</label>
            <input type="text" name="especie_raca" class="form-control" placeholder="Ex: Canina, Felina, etc.">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>