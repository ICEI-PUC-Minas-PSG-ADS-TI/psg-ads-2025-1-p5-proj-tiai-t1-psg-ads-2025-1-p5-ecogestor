<?php 

namespace App\Controller;

use \App\Utils\View;

class Home extends AbstractController{

    public static function index(){
        
        $data = [
            'name' => 'arthur',
            'idade' => 10
        ];
    
        $conteudo = View::render('home', $data);

        //parametros(tituloPag, conteudo)
        return self::getBase('tela home', $conteudo);

    }



}