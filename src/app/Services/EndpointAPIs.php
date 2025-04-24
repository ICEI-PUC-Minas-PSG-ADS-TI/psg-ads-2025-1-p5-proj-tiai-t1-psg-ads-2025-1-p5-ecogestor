<?php
namespace App\Services;

use App\Services\APIGemini;
use App\Services\APINews;

require_once 'APIGemini.php'; 
require_once 'APINews.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $input      = json_decode(file_get_contents('php://input'), true);

    $action     = $input['action'];
    $assunto    = $input['assunto'] ?? null;
    $mensagem   = $input['mensagem'] ?? null;
    $modo       = $input['modo'] ?? 'perguntar';
} else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $action     = $_GET['action'] ?? null;
    $mensagem   = $_GET['mensagem'] ?? null;
    $assunto    = $_GET['assunto'] ?? null;
    $modo       = $_GET['modo'] ?? 'perguntar';
}

if (!isset($action)) {
    echo json_encode(['erro' => 'Ação não fornecida']);
    exit;
}

switch ($action) {
    case 'gemini':
        if (isset($mensagem) || $modo == 'conteudo') {
            $gemini = new APIGemini();

            switch ($modo) {
                case 'gerar':
                    $mensagem = "Preciso que me retorne um array com um passo a passo para reciclar algo. 
                                Preciso que me retorne titulo e descrição de cada passo, cada posição do array deve ser um dos passos. 
                                Faça inspirado no site WikiHow.";
                    break;
                case 'perguntar':
                    $mensagem = "A pergunta abaixo é de um usuário sobre um assunto específico. 
                                Responda de forma clara e objetiva, utilizando uma linguagem simples e acessível." . "\n" . $mensagem;
                    break;
                case 'resumir':
                    $mensagem = "Resuma o conteúdo abaixo:" . "\n" . $mensagem;
                    break;
                default:
                    break;
            }

            $resposta = $gemini->Ask($mensagem);
            echo json_encode(['Resposta' => $resposta]);
        } else {
            echo json_encode(['erro' => 'Mensagem não fornecida']);
        }
        break;
    case 'news':
        if (isset($assunto)) {
            $news = new APINews();
            $noticias = $news->Get($assunto);
            echo json_encode(['Noticias' => $noticias]);
        } else {
            echo json_encode(['erro' => 'Assunto não fornecido']);
        }
        break;
    default:
        echo json_encode(['erro' => 'Ação inválida']);
        break;
}

