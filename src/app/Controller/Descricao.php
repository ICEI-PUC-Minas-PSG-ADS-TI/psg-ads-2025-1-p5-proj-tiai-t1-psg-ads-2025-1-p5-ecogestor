<?php 

namespace App\Controller;

use \App\Utils\View;

class Descricao extends AbstractController{

    public static function index(){
        $data = [];
        try {
                        
            $data = [
                'titulo' => 'Tela Descricao teste',
                'descricao' => 'Aqui fica o card de descrição de noticias - Arthur',
            ];
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        $conteudo = View::render('descricao', $data);

        //parametros(tituloPag, conteudo)
        return self::getBase('Descricao', $conteudo);

    }



}