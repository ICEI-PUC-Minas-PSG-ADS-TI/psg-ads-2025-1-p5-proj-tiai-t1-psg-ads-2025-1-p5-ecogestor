<?php 

namespace App\Controller;

use \App\Utils\View;
use \App\Services\APIGemini;

class AprendaReciclar extends AbstractController{

    public static function index(){
        $data = [];
        try {

            $data = [
                'titulo' => 'Aprenda a Reciclar'
            ];
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        $conteudo = View::render('aprendareciclar', $data);

        return self::getBase('Aprenda a Reciclar', $conteudo);

    }

    public static function comoReciclar(){

        $promptValidacao = "Responda apenas com true ou false. 
            O seguinte objeto é reciclável: ".$_POST['nomeObjeto']."

            Não escreva mais nada além de true ou false.";


        $prompt = "Explique de forma simples como reciclar o objeto: ".$_POST['nomeObjeto'].". 
            Quero um passo a passo claro e didático.
            
            A resposta deve ser **somente** um JSON no seguinte formato:
            {
            \"passo1\": {
                \"idPasso\": 1,
                \"descricao\": \"Descrição do primeiro passo\"
            },
            \"passo2\": {
                \"idPasso\": 2,
                \"descricao\": \"Descrição do segundo passo\"
            },
            \"passo3\": {
                \"idPasso\": 3,
                \"descricao\": \"Descrição do terceiro passo\"
            }
            // Adicione mais passos conforme necessário
            }
            
            Não inclua nenhum texto fora do JSON";


        try {
            $api = new APIGemini();

            // validação não funcionando ainda, ver isso depois
            $validacao = $api->Ask($promptValidacao);
            if($validacao['Resposta'] == "false"){

                return "não é possível reciclar";
            }

            $respostaBruta = $api->Ask($prompt);
            $respostaLimpa = str_replace(["```json", "```"], "", $respostaBruta['Resposta']);
                        
            return $respostaLimpa;
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }


    }



}