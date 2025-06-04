<?php 

namespace App\Controller;

use \App\Utils\View;
use \App\Services\APINews;
use \App\Services\APIGemini;

class Home extends AbstractController{

    public static function index(){
        $data = [];
        try {
                $data = [
                    'texto' => 'A Ecogestor é uma empresa comprometida com o futuro do planeta. Atuamos no ramo da reciclagem, promovendo soluções sustentáveis para a gestão de resíduos, com foco na preservação ambiental e na conscientização da sociedade.
                                Nosso objetivo vai além da coleta e reaproveitamento de materiais. Aqui, você encontra dicas práticas para tornar seu dia a dia mais sustentável, além de notícias atualizadas sobre o universo da reciclagem, meio ambiente e inovações ecológicas.'
                ];
                      
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        $conteudo = View::render('home', $data);
        return self::getBase('Home', $conteudo);

    }



}