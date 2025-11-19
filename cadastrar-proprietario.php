<h1>Cadastrar Proprietário</h1>
<form action="?page=salvar-proprietario" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Proprietário</label>
        <input type="text" name="nome_proprietario" id="nome" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    
    <div class="mb-3">
        <label for="fone" class="form-label">Telefone</label>
        <input type="text" name="telefone" id="fone" class="form-control">
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Proprietário</button>
    </div>
</form>