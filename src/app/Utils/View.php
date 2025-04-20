<?php 

namespace App\Utils;

class View{

    /** 
     * Variaveis padrões da View
     * @var array
     */
    private static $vars = [];

    /**
     * Metodo responsável por definir os dados iniciais da classe
     * @param array $vars
     */
    public static function init($vars = [])
    {
        self::$vars = $vars;
    }

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
     * @param array $vars
     * @return string 
     */
    public static function render($view, $vars = []){
        //conteúdo da view
        $contentView = self::getContentView($view);

        // Junta variaveis do layout
        $vars = array_merge(self::$vars, $vars);

        //Chaves do array de variaveis
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        }, $keys);

        //retorna o conteúdo renderizado
        return str_replace($keys, array_values($vars), $contentView);
    }

}