<?php 

namespace App\Controller;

use \App\Utils\View;

class Home extends AbstractController{

    public static function index(){

        $conteudo = View::render('home', ['name' => 'daniel', 'idade' => 11]);

        return self::getBase('Home', $conteudo);

    }

}