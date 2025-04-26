<?php
namespace App\Services;

require_once __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client as Client;
use Dotenv\Dotenv;

// Manipular o .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

class APINews
{
    private $api_key;
    private $url;
    private $client;

    function __construct()
    {
        // Define a chave da API e a URL
        $this->api_key = $_ENV['NEWS_API_KEY'];
        $this->url = "https://newsapi.org/v2/everything?language=pt&apiKey=" . $this->api_key;

        // Cria o cliente Guzzle
        $this->client = new Client([
            'cookies' => true,
            'verify'  => false
        ]);
    }

    function GetAll($assunto){
        // Realiza a requisição para a API do NewsAPI para coletar por assunto
        try {
            $url = $this->url . "&q=" . $assunto;
            $response = $this->client->get($url);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        $response = $response->getBody()->getContents();
        $response = json_decode($response, true);

        return [
            'status' => $response['status'],
            'totalResults' => $response['totalResults'],
            'noticias' => $response['articles']
        ];
    }

    function Get($titulo){
        // Realiza a requisição para a API do NewsAPI para coletar por título
        try {
            $url = $this->url . "&qInTitle=" . $titulo;
            $response = $this->client->get($url);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        $response = $response->getBody()->getContents();
        $response = json_decode($response, true);

        return [
            'status' => $response['status'],
            'totalResults' => $response['totalResults'],
            'noticias' => $response['articles']
        ];
    }
}
?>