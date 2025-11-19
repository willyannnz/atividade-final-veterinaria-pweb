<?php 
// ...
switch (@$_REQUEST["page"]) {
    // ... (Mantenha as rotas 'home', 'cadastrar-marca', 'listar-marca' etc. se ainda quiser o projeto antigo)

    // --- ROTAS DO NOVO PROJETO (CLÍNICA VETERINÁRIA) ---

    // Raça
    case "cadastrar-raca":
        include("cadastrar-raca.php");
        break;
    case "listar-raca":
        include("listar-raca.php");
        break;
    case "editar-raca":
        include("editar-raca.php");
        break;
    case "salvar-raca":
        include("salvar-raca.php");
        break;

    // Proprietário
    case "cadastrar-proprietario":
        include("cadastrar-proprietario.php");
        break;
    case "listar-proprietario":
        include("listar-proprietario.php");
        break;
    case "editar-proprietario":
        include("editar-proprietario.php");
        break;
    case "salvar-proprietario":
        include("salvar-proprietario.php");
        break;
        
    // Veterinário
    case "cadastrar-veterinario":
        include("cadastrar-veterinario.php");
        break;
    case "listar-veterinario":
        include("listar-veterinario.php");
        break;
    case "editar-veterinario":
        include("editar-veterinario.php");
        break;
    case "salvar-veterinario":
        include("salvar-veterinario.php");
        break;
        
    // Animal
    case "cadastrar-animal":
        include("cadastrar-animal.php");
        break;
    case "listar-animal":
        include("listar-animal.php");
        break;
    case "editar-animal":
        include("editar-animal.php");
        break;
    case "salvar-animal":
        include("salvar-animal.php");
        break;

    // Consulta
    case "cadastrar-consulta":
        include("cadastrar-consulta.php");
        break;
    case "listar-consulta":
        include("listar-consulta.php");
        break;
    case "editar-consulta":
        include("editar-consulta.php");
        break;
    case "salvar-consulta":
        include("salvar-consulta.php");
        break;
        
    // ... (Mantenha o default no final)
}
// ...
?>