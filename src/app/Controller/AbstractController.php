<?php 

namespace App\Controller;

use \App\Utils\View;

abstract class AbstractController{

    /**
     * Método responsável por incluir o html base em cima do conteúdo da tela
     * @return string
     */
    protected static function getBase($titulo, $conteudo){
        // var_dump($titulo);
        return View::render('../base', [
            'titulo' => $titulo, 
            'conteudo' => $conteudo
        ]);
    }
}