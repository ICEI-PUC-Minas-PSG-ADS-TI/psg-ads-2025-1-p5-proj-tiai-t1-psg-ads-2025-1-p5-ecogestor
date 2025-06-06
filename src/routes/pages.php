<?php 

use \App\Http\Response;
use \App\Controller;

//Rota Home
$obRouter->get('/', [
    function(){
        return new Response(200, Controller\Home::index());
    }
]);

//Rota Notícias
$obRouter->get('/noticias', [
    function(){
        return new Response(200, Controller\Noticias::index());
    }
]);

//Rota AprendaReciclar
$obRouter->get('/aprendareciclar', [
    function(){
        return new Response(200, Controller\AprendaReciclar::index());
    }
]);

//Rota Dinamica POST
$obRouter->post('/aprendareciclar/comoreciclar', [ 
    function(){
        return new Response(200, Controller\AprendaReciclar::comoReciclar());
    }
]);

//Rota Descrição
$obRouter->get('/descricao{}', [
    function(){
        return new Response(200, Controller\Descricao::index());
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
        return new Response(200, 'Pagina '.$idPagina);
    }
]);

