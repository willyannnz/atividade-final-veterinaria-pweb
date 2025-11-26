<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', ''); // Se tiver senha, coloque-a aqui dentro das aspas.
    define('BASE', 'clinica_veterinaria');

    $conn = @new MySQLi(HOST, USER, PASS, BASE);

    
    $conn->set_charset("utf8");
?>