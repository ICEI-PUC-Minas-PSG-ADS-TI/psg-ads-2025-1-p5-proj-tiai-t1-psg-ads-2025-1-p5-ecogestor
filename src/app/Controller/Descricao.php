<?php 

namespace App\Controller;

use \App\Utils\View;

class Descricao extends AbstractController{

    public static function index($idNoticia){

        $data = [];
        try {
                        
            $data = [
                'titulo' => 'Tela Descricao teste',
                'descricao' => 'id da noticia '.$idNoticia,
            ];
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        //parametros(tituloPag, conteudo)
        return View::render('descricao', $data);

    }



}