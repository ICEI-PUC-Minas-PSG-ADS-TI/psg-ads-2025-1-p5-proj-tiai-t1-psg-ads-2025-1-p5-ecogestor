<?php
namespace App\Services;

require_once __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client as Client;
use Dotenv\Dotenv;

// Manipular o .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
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

    function Ask($pergunta)
    {
        try {
            // Realiza a requisição para a API do Gemini
            $response = $this->client->post($this->url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $pergunta]
                            ]
                        ]
                    ]
                ]
            ]);

            $body = $response->getBody()->getContents();
            $responseData = json_decode($body, true);

            // Pega o texto de retorno da IA
            $text = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? 'Sem resposta da IA.';
            return ['Resposta' => $text];

        } catch (\Throwable $th) {
            // Se der qualquer erro (inclusive 503), retorna uma mensagem amigável
            return ['Resposta' => '⚠️ O serviço Gemini está temporariamente fora do ar. Por favor, volte em alguns instantes.'];
        }
    }
}
?>
