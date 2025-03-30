<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Controller\Home;

define('URL', 'http://localhost/eco-gestor');
$obRouter = new Router(URL);

echo '<pre>'; print_r($obRouter);echo '</pre>';exit;
echo Home::index();