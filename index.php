<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Veterinária</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                 <img src="img/pata.png" alt="Pata" style="height: 30px;"> VitaPet
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownRacas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Raças
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownRacas">
                            <li><a class="dropdown-item" href="?page=cadastrar-raca">Cadastrar Raça</a></li>
                            <li><a class="dropdown-item" href="?page=listar-raca">Listar Raças</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAnimais" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Animais
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownAnimais">
                            <li><a class="dropdown-item" href="?page=cadastrar-animal">Cadastrar Animal</a></li>
                            <li><a class="dropdown-item" href="?page=listar-animal">Listar Animais</a></li>
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
    
    <div class="container mt-4">
        <?php
            // Lógica de Roteamento
            switch (@$_REQUEST['page']) {
                // Proprietário
                case 'cadastrar-proprietario':
                    include("cadastrar-proprietario.php");
                    break;
                case 'listar-proprietario':
                    include("listar-proprietario.php");
                    break;
                case 'editar-proprietario':
                    include("editar-proprietario.php");
                    break;
                
                // Raça
                case 'cadastrar-raca':
                    include("cadastrar-raca.php");
                    break;
                case 'listar-raca':
                    include("listar-raca.php");
                    break;
                case 'editar-raca':
                    include("editar-raca.php");
                    break;

                // Veterinário
                case 'cadastrar-veterinario':
                    include("cadastrar-veterinario.php");
                    break;
                case 'listar-veterinario':
                    include("listar-veterinario.php");
                    break;
                case 'editar-veterinario':
                    include("editar-veterinario.php"); 
                    break;

                // Animal
                case 'cadastrar-animal':
                    include("cadastrar-animal.php");
                    break;
                case 'listar-animal':
                    include("listar-animal.php");
                    break;
                case 'editar-animal':
                    include("editar-animal.php");
                    break;

                // Consulta
                case 'cadastrar-consulta':
                    include("cadastrar-consulta.php");
                    break;
                case 'listar-consulta':
                    include("listar-consulta.php");
                    break;
                case 'editar-consulta':
                    include("editar-consulta.php");
                    break;

                // Salvar (Lógica de CRUD)
                case 'salvar-proprietario':
                    include("salvar-proprietario.php");
                    break;
                case 'salvar-raca':
                    include("salvar-raca.php");
                    break;
                case 'salvar-veterinario':
                    include("salvar-veterinario.php");
                    break;
                case 'salvar-animal':
                    include("salvar-animal.php");
                    break;
                case 'salvar-consulta':
                    include("salvar-consulta.php");
                    break;
                
                // Página Inicial (default)
                default:
                
                    print "<h1>Bem-vindo ao Sistema da Clínica Veterinária - VitaPet!</h1>";
                    print "<p>Utilize o menu superior para gerenciar Proprietários, Raças, Animais, Veterinários e Consultas.</p>";         

                    break;
            }
        ?>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html> 