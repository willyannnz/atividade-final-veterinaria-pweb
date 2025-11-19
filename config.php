<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'clinica_veterinaria');

$conn = new MySQLi(HOST,USER,PASS,BASE);

$conn->set_charset("utf8");
?>