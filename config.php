<?php
    // Configurações do Banco de Dados
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'clinica_veterinaria');

    // Cria a conexão
    $conn = new MySQLi(HOST, USER, PASS, BASE);

 
    if ($conn->connect_error) {
        die("
            <div style='padding: 20px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; margin: 20px;'>
                <h3>❌ Erro de Conexão com o Banco de Dados</h3>
                <p>Não foi possível conectar ao banco <strong>" . BASE . "</strong>.</p>
                <p><strong>Detalhe do Erro:</strong> " . $conn->connect_error . "</p>
                <hr>
                <p><em>Verifique se:</em></p>
                <ul>
                    <li>O XAMPP/WAMP está rodando (MySQL iniciado).</li>
                    <li>O nome do banco ('clinica_veterinaria') está correto.</li>
                    <li>A senha do usuário 'root' está correta (padrão é vazio).</li>
                </ul>
            </div>
        ");
    }

    $conn->set_charset("utf8");
?>