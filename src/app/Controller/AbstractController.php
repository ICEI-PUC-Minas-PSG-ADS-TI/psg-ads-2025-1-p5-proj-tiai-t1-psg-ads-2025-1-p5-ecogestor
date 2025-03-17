<?php 

namespace App\Controller;

use \App\Utils\View;

class AbstractController{

    /**
     * Método responsável por incluir o html base em cima do conteúdo da tela
     * @return string
     */
    public static function index($titulo, $conteudo){
        return View::render('base', [
            'titulo' => $titulo, 
            'conteudo' => $conteudo
        ]);
    }
}