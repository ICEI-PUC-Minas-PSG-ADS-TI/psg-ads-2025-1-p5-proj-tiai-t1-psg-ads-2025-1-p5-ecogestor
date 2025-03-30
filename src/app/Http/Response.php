<?php 

namespace App\Http;

class Response{

    /**
     * Codigo do Http
     * @var integer
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteúdo que está sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Tipo de conteúdo que está sendo retornado
     * @var mixed
     */
    private $content;

    /**
     * Método responsável por iniciar a classe e definir valores
     * @param integer $httpCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }
    
    /** 
     * Método responsável por alterar o content type da response
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /** 
     * Método responsável por adicionar um registro no cabeçalho da response
     * @param string $key
     * @param string $value
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
        
    }

    
    /**
     * Método responsável por enviar os headers para o navegador
     */
    public function sendHeaders()
    {
        // STATUS
        http_response_code($this->httpCode);

        // ENVIAR HEADERS
        foreach ($this->headers as $key => $value) {
            header($key. ': ' .$value);
        }
    }

    /**
     * Método responsável por enviar a resposta para o usuário
     */
    public function sendResponse()
    {
        // ENVIA OS HEADERS
        $this->sendHeaders();
        
        // IMPRIME O CONTEUDO
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
                break;            
        }
    }
}