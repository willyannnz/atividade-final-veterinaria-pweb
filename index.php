<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
    <title>Clínica Veterinária</title>
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
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">
                        🏠 Home
                    </a>
                </li>

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
                // Inclui a conexão para o caso padrão (Dashboard) usar
                include("config.php");

                switch (@$_REQUEST["page"]) {
                    
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
                        // ⚠️ ATENÇÃO: Renomeie o arquivo 'editar-funcionario.php' para 'editar-veterinario.php'
                        // ou mude esta linha abaixo para include("editar-funcionario.php");
                        include("editar-funcionario.php"); 
                        break;
                    case "salvar-veterinario":
                        include("salvar-veterinario.php");
                        break; // 🟢 CORREÇÃO 2: Ponto e vírgula adicionado!

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

                    // 🟢 CORREÇÃO 3: Dashboard Completo no caso Default
                    default:
                        // Busca as contagens para o Dashboard
                        $count_proprietarios = $conn->query("SELECT COUNT(*) as count FROM proprietario")->fetch_object()->count;
                        $count_animais       = $conn->query("SELECT COUNT(*) as count FROM animal")->fetch_object()->count;
                        $count_consultas     = $conn->query("SELECT COUNT(*) as count FROM consulta")->fetch_object()->count;
                        ?>
                        
                        <div class="jumbotron bg-light p-5 rounded shadow-sm">
                            <h1 class="display-4">Bem-vindo à VitaPet!</h1>
                            <p class="lead">Sistema de gerenciamento da Clínica Veterinária.</p>
                            <hr class="my-4">
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-white bg-success mb-3 h-100">
                                        <div class="card-header">Pacientes</div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php print $count_animais; ?> Animais</h5>
                                            <p class="card-text">Total de animais cadastrados.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white bg-primary mb-3 h-100">
                                        <div class="card-header">Proprietários</div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php print $count_proprietarios; ?> Clientes</h5>
                                            <p class="card-text">Total de proprietários ativos.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white bg-warning mb-3 h-100">
                                        <div class="card-header">Consultas</div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php print $count_consultas; ?> Agendadas</h5>
                                            <p class="card-text">Total de consultas no sistema.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                }
            ?>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script> 
</body>
</html>