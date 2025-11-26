<?php
    include("config.php"); 
?>

<div class="container mt-5">
    <h1>Cadastrar Raça</h1>
    <form action="?page=salvar-raca" method="POST">
        <input type="hidden" name="acao" value="cadastrar">
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Raça</label>
            <input type="text" name="nome_raca" id="nome" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="especie" class="form-label">Espécie (Ex: Cão, Gato, Ave)</label>
            <input type="text" name="especie_raca" id="especie" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar Raça</button>
            <a href="?page=listar-raca" class="btn btn-secondary">Voltar para a Lista</a>
        </div>
    </form>
</div>