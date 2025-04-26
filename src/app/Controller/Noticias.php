<?php 

namespace App\Controller;

use \App\Utils\View;

class Noticias extends AbstractController{

    public static function index(){
        $data = [];
        try {
                        
            $data = [
                'titulo' => 'Tela Noticias teste',
                'descricao' => 'Noticias sobre Reciclagem',
            ];
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        $conteudo = View::render('noticias', $data);

        //parametros(tituloPag, conteudo)
        return self::getBase('Noticias', $conteudo);

    }



}