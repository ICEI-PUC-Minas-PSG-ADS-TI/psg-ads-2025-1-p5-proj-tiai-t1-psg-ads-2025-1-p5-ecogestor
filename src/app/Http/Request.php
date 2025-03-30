<?php 

namespace App\Http;

class Request{

    /**
     * Método Http da requisição
     * @var string
     */
    private $httpMethod;

    /**
     * Uri da página
     * @var string
     */
    private $uri;

    /**
     * Parametros da url ($_GET)
     * @var array
     */
    private $queryParams = [];

    /**
     * Variáveis recebidas no POST da pagina ($_POST)
     * @var array
     */
    private $postVars = [];

    /**
     * Cabeçalho da requisição
     * @var array
     */
    private $headers = [];

    public function __construct()
    {
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';

    }

    /**
     * Método responsável por retornar o método Http da requisição
     */
    public function getHttpMethod(){
        return $this->httpMethod;
    }

    /**
     * Método responsável por retornar a uri da requisição
     */
    public function getUri(){
        return $this->uri;
    }

    /**
     * Método responsável por retornar os headers da requisição
     */
    public function getHeaders(){
        return $this->headers;
    }

    /**
     * Método responsável por retornar os parametros da URL da requisição
     */
    public function getQueryParams(){
        return $this->queryParams;
    }

    /**
     * Método responsável por retornar as variaveis POST da requisição
     */
    public function getPostVars() {
        return $this->postVars;        
    }

    
}