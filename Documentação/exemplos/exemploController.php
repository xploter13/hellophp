<?php

/**
 * Exemplo  Controller
 * -------------------
 * 
 * O método $this->view() aceita dois parâmetros,
 * sendo que o segundo parâmtero é opcional, utilizado
 * apenas quando para passar dados para a view.
 * 
 * @Modo de uso
 * -------------
 * $exemplo = new exemploModel();
 * $dados = $exemplo->metodoModel(); 
 * $this->view('nome_da_view', $dados)
 * 
 *  
*/
class exemplo extends Controller {

    public function initial() {
        $this->view('index');
    }

}
