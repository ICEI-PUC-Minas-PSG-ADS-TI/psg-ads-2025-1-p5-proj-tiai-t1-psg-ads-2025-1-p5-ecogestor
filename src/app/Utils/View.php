<?php 

namespace App\Utils;

class View{

    /**
     * Metodo responsável por retornar o conteúdo de uma view
     * @param string $view
     * @return string 
     */
    private static function getContentView($view){
        $file = __DIR__ . '/../resources/view/' . $view . '.html';

        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Metodo responsável por retornar o conteúdo renderizado
     * @param string $view
     * @return string 
     */
    public static function render($view){
        //conteúdo da view
        $contentView = self::getContentView($view);
        
        //retorna o conteúdo renderizado
        return $contentView;
    }

}