<?php 

namespace App\Controller;

use \App\Utils\View;

class Home extends AbstractController{

    public static function index(){
        return View::render('home', ['name' => 'bernardo', 'idade' => 22]);
        // return 'Olá Mundo';
    }
}