<?php

/**
 * System - Controla toda aplicação
 *
 * @package hellophp
 * @since 0.1
 */
class system {

    private $_url;
    private $_explode;
    public $_controller;
    public $_action;
    public $_params;

    public function __construct() {
        $this->setUrl();
        $this->setExplode();
        $this->setController();
        $this->setAction();
        $this->setParams();
    }

    /**
     *  Verifica a URL, caso nao seja passado nenhum parametro, executa por padrao
     *  a classe index e o método HOME.
     */
    private function setUrl() {
        $_GET['url'] = (isset($_GET['url']) ? $_GET['url'] : "index/initial");
        $this->_url = $_GET['url'];
    }

    // Separa a URL
    private function setExplode() {
        $this->_explode = explode('/', $this->_url);
    }

    // Pega o primeiro parametro passado na URL, formando o CONTROLLER
    private function setController() {
        $this->_controller = $this->_explode[0];
    }

    /**
     *  Pega o segundo parametro passado na URL, formando a ACTION
     * Se for chamado apenas o controller, por padrão será 
     * executado o método initial
     * 
     */
    private function setAction() {
        $ac = (!isset($this->_explode[1]) || $this->_explode[1] == NULL || $this->_explode[1] == "index" ? "initial" : $this->_explode[1]);
        $this->_action = $ac;
    }

    /**
     * Recupera os parâmetros na url e combina, formando arrays com índices e valores.
     * Obs: Apos combinados, os arrays devem conter quantidades iguais de valores
     * caso contrário, o sistema resulta em um erro! 
     * exemplo:
     * $ind[0] / $value[0]
     * $ind[1] / $value[1]
     * $ind[2] / $value[2]
     * 
     */
    private function setParams() {
        unset($this->_explode[0], $this->_explode[1]);
        if (end($this->_explode) == NULL) {
            array_pop($this->_explode);
        }

        $i = 0;
        if (!empty($this->_explode)) {
            foreach ($this->_explode AS $val) {
                if ($i % 2 == 0) {
                    $ind[] = $val;
                } else {
                    $value[] = $val;
                }
                $i++;
            }
        } else {
            $ind = array();
            $value = array();
        }

        //if (count($ind) === count($value) && !empty($ind) && !empty($value)) {
        if (!empty($ind) && !empty($value)) {
            $this->_params = array_combine($ind, $value);
        } else {
            $this->_params = array();
        }
    }

    /**
     * Método para recuperar os parâmetros na url apos a action
     * @param type Booleano
     * @return array
     * 
     * @Modo de uso
     * $this->getParam('numero da chave do array');
     * exemplo: $this->getParam('3');
     * impressão: _valor_do_array
     * 
     */
    public function getParam($key_param) {
        $param = explode("/", $_SERVER['REQUEST_URI']);
        foreach ($param as $params) {
            $param_url[] = $params;
        }
        if (isset($param_url[$key_param])) :
            return $param_url[$key_param];
        else :
            header("location:" . BASEURL);
        endif;
    }
    
    public function redirect() {
        header("location:" . BASEURL);
    }

    /**
     *  Executa a aplicação
     */
    public function run() {
        $controller_path = CONTROLLERS . $this->_controller . 'Controller.php';
        // Verifica se o controller existe
        if (!file_exists($controller_path)) :
            die(require_once 'app/views/error/404.php');
        else :
            require_once ($controller_path);
            $app = new $this->_controller();
        endif;

        // Verifica se a action existe
        if (!method_exists($app, $this->_action)) :
            die(require_once 'app/views/error/404.php');
        else :
            $action = $this->_action;
            $app->$action();
        endif;
    }

}
