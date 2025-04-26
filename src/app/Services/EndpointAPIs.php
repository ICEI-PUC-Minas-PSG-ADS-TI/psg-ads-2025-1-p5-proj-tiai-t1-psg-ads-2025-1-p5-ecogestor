<?php
namespace App\Services;

use App\Services\APIGemini;
use App\Services\APINews;

require_once 'APIGemini.php'; 
require_once 'APINews.php';
require_once 'Spatie.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $input      = json_decode(file_get_contents('php://input'), true);

    $action     = $input['action'];
    $assunto    = $input['assunto'] ?? null;
    $titulo     = $input['titulo'] ?? null;
    $mensagem   = $input['mensagem'] ?? null;
    $url        = $input['url'] ?? null;
    $modo       = $input['modo'] ?? 'perguntar';
} else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $action     = $_GET['action'] ?? null;
    $mensagem   = $_GET['mensagem'] ?? null;
    $url        = $_GET['url'] ?? null;
    $assunto    = $_GET['assunto'] ?? null;
    $titulo     = $_GET['titulo'] ?? null;
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
                                Faça inspirado no site WikiHow. Exemplo do site do WikiHow no link https://pt.wikihow.com/Reciclar";
                    break;
                case 'perguntar':
                    if(!empty($url)) {
                        $mensagem = "A pergunta abaixo é de um usuário sobre um assunto disponivel no link " . $url . ". 
                                    Responda de forma clara e objetiva, utilizando uma linguagem simples e acessível. Caso a pergunta ou dúvida não tenha a ver
                                    com o conteúdo do site disponivél no link acima, por favor retorne a frase: 'Somente perguntas de acordo com o tema da noticia'." . "\n" . 
                                    "A PERGUNTA DO USUÁRIO: $mensagem";
                    } else {
                        $mensagem = "A pergunta abaixo é de um usuário sobre um assunto relacionado com reciclagem. 
                                    Responda de forma clara e objetiva, utilizando uma linguagem simples e acessível. Caso a pergunta ou dúvida não tenha a ver
                                    reclicagem ou coisas do ramo, por favor retorne a frase: 'Somente perguntas de acordo com o tema'." . "\n" . 
                                    "A PERGUNTA DO USUÁRIO: $mensagem";
                    }
                    break;
                case 'resumir':
                    if(!empty($url)) {
                        $mensagem = "Resuma o conteúdo do site disponivel no link " . $url . ". 
                                    Resuma de forma clara e objetiva, utilizando uma linguagem simples e acessível, não invente informação.";
                    } else {
                        $mensagem = "Resuma o conteúdo abaixo:" . "\n" . $mensagem;
                    }
                    break;
                default:
                    break;
            }

            $resposta = $gemini->Ask($mensagem);
            echo json_encode($resposta);
        } else {
            echo json_encode(['erro' => 'Mensagem não fornecida']);
        }
        break;
    case 'news':
        if (isset($assunto) && empty($titulo)) {
            $news = new APINews();
            $noticias = $news->GetAll($assunto);
            echo json_encode($noticias);
        } else if (isset($titulo)) {
            $news = new APINews();
            $noticias = $news->Get($titulo);
            echo json_encode($noticias);
        } else {
            echo json_encode(['erro' => 'Assunto não fornecido']);
        }
        break;
    case 'screenshot':
        if (isset($url)) {
            $spatie = new Spatie();
            $screenshot = $spatie->TakeScreenshot($url);
            echo json_encode($screenshot);
        } else {
            echo json_encode(['erro' => 'URL não fornecida']);
        }
        break;
    default:
        echo json_encode(['erro' => 'Ação inválida']);
        break;
}

