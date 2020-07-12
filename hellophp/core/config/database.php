<?php

class database {
    /** DB properties */
    public  $host     = 'localhost', // Host da base de dados 
            $db_name  = 'tutsup',    // Nome do banco de dados
            $password = '',          // Senha do usuário da base de dados
            $user     = 'root',      // Usuário da base de dados
            $charset  = 'utf8',      // Charset da base de dados
            $pdo      = null,        // Nossa conexão com o BD
            $error    = null,        // Configura o erro
            $debug    = false,       // Mostra todos os erros 
            $last_id  = null;        // Último ID inserido
}
