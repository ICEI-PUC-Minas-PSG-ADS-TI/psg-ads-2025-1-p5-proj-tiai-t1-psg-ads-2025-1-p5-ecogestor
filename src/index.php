<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;

define('URL', 'http://localhost/eco-gestor/src');
// Define o valor padrão das variaveis
View::init([
    'URL' => URL
]);

$obRouter = new Router(URL);

// inclui as rotas de paginas
include __DIR__.'/routes/pages.php';

// Imprime o response da rota
$obRouter->run()->sendResponse();

//  echo '<pre>'; print_r($obRouter);echo '</pre>';exit;
// // echo '<pre>'; print_r($obRouter);echo '</pre>';exit;
// echo Home::index();