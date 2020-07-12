<?php

/**
 * DEFINE'S
 */
define('MODELS', 'app/models/');
define('CONTROLLERS', 'app/controllers/');
define('VIEWS', 'app/views/');

/**
 * Configurações de URL
 */
$protocol = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === false) ? 'http' : 'https';
$host = $_SERVER['HTTP_HOST'];

$url = $protocol . '://' . $host;

define('BASEURL', "$url" . '/videotune/');
define('ENDERECO', "$url" . '/videotune/assets/');

/**
 * COnfiguração Diretório de UPLOAD
 */
define('FOLDER_UPLOAD', '../../uploads/');

/**
 * HELPERS
 */
define('HELPERS', 'hellophp/core/Helpers/');

/**
 * Configurações do sistema
 */
require_once ('./hellophp/core/config/database.php');
require_once('./hellophp/core/system.php');
require_once('./hellophp/core/Controller/Controller.php');
require_once ('./hellophp/core/Model/Model.php');

/**
 * Autoload
 * @param type $file
 */
function __autoload($file) {
    if (file_exists(MODELS . $file . '.php')) {
        require_once(MODELS . $file . '.php');
    } elseif (file_exists(HELPERS . $file . '.php')) {
        require_once(HELPERS . $file . '.php');
    } else {
        die("Model ou Helper não encontrado!");
    }
}

$start = new system;
$start->run();
