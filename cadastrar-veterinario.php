<h1>Cadastrar Veterinário</h1>
<form action="?page=salvar-veterinario" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Veterinário</label>
        <input type="text" name="nome_veterinario" id="nome" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="crmv" class="form-label">CRMV (Registro Profissional)</label>
        <input type="text" name="crmv" id="crmv" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="fone" class="form-label">Telefone</label>
        <input type="text" name="telefone" id="fone" class="form-control">
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Veterinário</button>
    </div>
</form>