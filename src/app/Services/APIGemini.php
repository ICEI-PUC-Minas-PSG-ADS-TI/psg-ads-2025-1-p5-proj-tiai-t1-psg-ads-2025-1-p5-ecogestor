<?php
namespace App\Services;

require_once __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client as Client;
use Dotenv\Dotenv;

// Manipular o .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

class APIGemini
{
    private $api_key;
    private $url;
    private $client;

    function __construct()
    {
        // Define a chave da API e a URL
        $this->api_key = $_ENV['GEMINI_API_KEY'];
        $this->url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" . $this->api_key;

        // Cria o cliente Guzzle
        $this->client = new Client([
            'cookies' => true,
            'verify'  => false
        ]);
    }

    function Ask($pergunta){
        // Realiza a requisição para a API do Gemini
        try {
            $response = $this->client->post($this->url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'contents' => [
                        'parts' => [
                            'text' => $pergunta
                        ]
                    ]
                ]
            ]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        $response = $response->getBody()->getContents();
        $response = json_decode($response, true);

        // Pega o texto de retorno da IA
        $text = $response['candidates'][0]['content']['parts'][0]['text'];
        return ['Resposta' => $text];
    }
}
?>