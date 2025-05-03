<?php 

namespace App\Controller;

use \App\Utils\View;
use \App\Services\APINews;
use \App\Services\APIGemini;

class Home extends AbstractController{

    public static function index(){
        $data = [];
        try {
            $api = new APINews();
            
            $noticia = $api->Get('Compostagem')['noticias'][0];
            if($noticia){

                $data = [
                    'titulo' => $noticia['title'],
                    'imagem' => $noticia['urlToImage'],
                    'url'    => $noticia['url'],
                    'autor'  => $noticia['source']['name'],
                    'descricao' => $noticia['description'],
                    'data'      => date('d/m/Y', strtotime($noticia['publishedAt']))
                ];
            }            
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        $conteudo = View::render('home', $data);

        //parametros(tituloPag, conteudo)
        return self::getBase('Home', $conteudo);

    }



}