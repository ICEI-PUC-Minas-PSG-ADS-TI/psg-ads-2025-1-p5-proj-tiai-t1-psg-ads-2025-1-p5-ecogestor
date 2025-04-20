<?php 

namespace App\Http;

use \Closure;
use \Exception;
use Reflection;
use \ReflectionFunction;

class Router{

    /**
     * URL completa do projeto (raiz)
     * @var string
     */
    private $url = '';

    /**
     * prefixo de todas as rotas
     * @var string
     */
    private $prefix = '';

    /**
     * Indices das rotas
     * @var array
     */
    private $routes = [];

    /**
     * Instancia de request
     * @var Request
     */
    private $request = '';
    
    /**
     * Método responsável por iniciar a classe
     * @param string $url
     */
    public function __construct($url)
    {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * Método responsável por definir o prefixo das rotas
     */
    private function setPrefix(){
        // Informaçoes da url atual
        $parseUrl = parse_url($this->url);

        $this->prefix = $parseUrl['path'] ?? ''; 
    }


    /**
     * Método responsável por adicionar uma rota na classe
     * @param string $method
     * @param string $route
     * @param array $params
     */
    private function addRoute($method, $route, $params = []){
        // Validação de parâmetros 
        foreach ($params as $key=>$value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        // Variaveis da rota
        $params['variables'] = [];

        // Padrão de validação das variaveis das rotas
        $patternVariable = '/{(.*?)}/';

        if (preg_match_all($patternVariable, $route, $matches)) {
            $route = preg_replace($patternVariable, '(.*?)', $route);
            $params['variables'] = $matches[1];
        }

        // Padrão de validação da URL
        $patternRoute = '/^'.str_replace('/', '\/', $route).'$/';

        // Adiciona a rota dentro da classe
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Método responsável por definir uma rota de get
     * @param string $route
     * @param array $params
     */
    public function get($route, $params = []){

        return $this->addRoute('GET', $route, $params);
    }

    /**
     * Método responsável por definir uma rota de post
     * @param string $route
     * @param array $params
     */
    public function post($route, $params = []){
        return $this->addRoute('POST', $route, $params);
    }

    /**
     * Método responsável por definir uma rota de PUT
     * @param string $route
     * @param array $params
     */
    public function put($route, $params = []){
        return $this->addRoute('PUT', $route, $params);
    }

    /**
     * Método responsável por definir uma rota de DELETE
     * @param string $route
     * @param array $params
     */
    public function delete($route, $params = []){
        return $this->addRoute('DELETE', $route, $params);
    }

    /**
     * Método responsável por retornar os dados da rota atual
     * @return array
     */
    private function getRoute()
    {
        $uri = $this->getUri();

        $httpMethod = $this->request->getHttpMethod();

        // Valida a URL
        foreach ($this->routes as $patternRoute => $methods) {
            // verifica se a rota uri com padrão

            if(preg_match($patternRoute, $uri, $matches)){

                // verifica o metodo
                if(isset($methods[$httpMethod])){
                    // Removendo primeira posição do regex completa
                    unset($matches[0]);

                    // Variáveis processadas
                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys, $matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;

                    // Retorno dos parametros da rota
                    return $methods[$httpMethod];
                }
                throw new Exception("Método não permitido",405);
                
            }
        }
        // URL não encontrada
        throw new Exception("URL não encontrada",404);
    }

    /**
     * Método responsável por retornar a uri desconsiderando o prefixo "/eco-gestor/src/"
     * @return string
     */
    private function getUri()
    {
        // URI da Request
        $uri = $this->request->getUri();
        // separa o prefixo da URI
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        // retorna a uri sem o prefixo
        return end($xUri);
    }


    /**
     * Método responsável por executar a rota atual
     * @return Response
     */
    public function run()
    {
        try {
            
            // Obtém a rota atual
            $route = $this->getRoute();

            // Verifica a controller
            if(!isset($route['controller'])){
                throw new Exception("A URL não pôde ser processada", 500);
                
            }
            // Argumentos da função
            $args = [];

            // Reflection 
            $reflection = new ReflectionFunction($route['controller']);
            foreach ($reflection->getParameters() as $key => $parameter) {
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';
            }
            
            // Retorna a execução da função
            return call_user_func_array($route['controller'], $args);

        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}