<?php 

namespace App\Controller;

use \App\Utils\View;

class AprendaReciclar extends AbstractController{

    public static function index(){
        $data = [];
        try {
                        
            $data = [
                'titulo' => 'Tela Aprenda a Reciclar teste',
                'descricao' => 'Aqui ficarão os tutoriais - Bernardo',
            ];
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        $conteudo = View::render('aprendareciclar', $data);

        //parametros(tituloPag, conteudo)
        return self::getBase('Aprenda a Reciclar', $conteudo);

    }



}