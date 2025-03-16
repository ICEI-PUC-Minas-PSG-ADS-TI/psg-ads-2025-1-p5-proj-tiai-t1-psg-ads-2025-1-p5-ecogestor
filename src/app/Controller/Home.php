<?php 

namespace App\Controller;

use \App\Utils\View;

class Home{

    public static function index(){
        return View::render('home');
        // return 'Olá Mundo';
    }
}