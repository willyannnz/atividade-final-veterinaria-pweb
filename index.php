<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BBH+Sans+Bogle&family=Bebas+Neue&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lobster&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Clinica Veterinária</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand banner-titulo" href="index.php"><i class="fa-solid fa-paw"></i> VitaPet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProprietarios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Proprietários
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownProprietarios">
                        <li><a class="dropdown-item" href="?page=cadastrar-proprietario">Cadastrar Proprietário</a></li>
                        <li><a class="dropdown-item" href="?page=listar-proprietario">Listar Proprietários</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAnimais" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pacientes (Animais)
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAnimais">
                        <li><a class="dropdown-item" href="?page=cadastrar-animal">Cadastrar Animal</a></li>
                        <li><a class="dropdown-item" href="?page=listar-animal">Listar Animais</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="?page=cadastrar-raca">Cadastrar Raça</a></li>
                        <li><a class="dropdown-item" href="?page=listar-raca">Listar Raças</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownVeterinarios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Veterinários
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownVeterinarios">
                        <li><a class="dropdown-item" href="?page=cadastrar-veterinario">Cadastrar Veterinário</a></li>
                        <li><a class="dropdown-item" href="?page=listar-veterinario">Listar Veterinários</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownConsultas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Consultas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownConsultas">
                        <li><a class="dropdown-item" href="?page=cadastrar-consulta">Agendar Consulta</a></li>
                        <li><a class="dropdown-item" href="?page=listar-consulta">Listar Consultas</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-4">

            <?php
                // Lógica de ROTEAMENTO (SWITCH) para incluir as páginas
                switch (@$_REQUEST["page"]) {
                    
                    // --- ROTAS DE PROPRIETÁRIO ---
                    case "cadastrar-proprietario":
                        include("cadastrar-proprietario.php");
                        break;
                    case "listar-proprietario":
                        include("listar-proprietario.php");
                        break;
                    case "editar-proprietario":
                        include("editar-proprietario.php");
                        break;
                    case "salvar-proprietario": // Usa para Cadastrar/Editar/Excluir
                        include("salvar-proprietario.php");
                        break;
                    
                    // --- ROTAS DE VETERINÁRIO ---
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

                    // --- ROTAS DE RAÇA ---
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

                    // --- ROTAS DE ANIMAL ---
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
                        
                    // --- ROTAS DE CONSULTA ---
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

                    // --- CASO PADRÃO (HOME) ---
                    default:
                        print "<h1>Bem-vindo à Clínica Veterinária!</h1>";
                        print "<p>Use o menu acima para começar a gerenciar proprietários, pacientes e consultas.</p>";
                        break;
                }
            ?>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script> 
</body>
</html>