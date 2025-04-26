<?php 

namespace App\Controller;

use \App\Utils\View;

class Descricao extends AbstractController{

    public static function index(){

        $data = [];
        try {
                        
            $data = [
                'titulo' => 'Tela Descricao teste',
                'descricao' => 'Descrição detalhada da noticia',
            ];
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        //parametros(tituloPag, conteudo)
        return View::render('descricao', $data);

    }



}