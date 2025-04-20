<?php 

use \App\Http\Response;
use \App\Controller;

//Rota Home
$obRouter->get('/', [
    function(){
        return new Response(200, Controller\Home::index());
    }
]);

//Rota Sobre
$obRouter->get('/sobre', [
    function(){
        return new Response(200, Controller\Sobre::index());
    }
]);

//Rota Dinamica
$obRouter->get('/pagina/{idPagina}', [
    function($idPagina){
        return new Response(200, 'Pagina'.$idPagina);
    }
]);
