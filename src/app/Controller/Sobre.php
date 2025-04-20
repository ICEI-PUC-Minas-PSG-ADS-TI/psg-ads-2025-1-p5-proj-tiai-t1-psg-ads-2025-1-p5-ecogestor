<?php 

namespace App\Controller;

use \App\Utils\View;

class Sobre extends AbstractController{

    public static function index(){
        $data = [];
        try {
                        
            $data = [
                'titulo' => 'Tela Sobre teste',
                'descricao' => 'Estudantes da PUC Minas',
            ];
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        $conteudo = View::render('sobre', $data);

        //parametros(tituloPag, conteudo)
        return self::getBase('Sobre', $conteudo);

    }



}