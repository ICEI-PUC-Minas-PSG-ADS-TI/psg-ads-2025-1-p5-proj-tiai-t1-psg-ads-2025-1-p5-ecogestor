<?php

namespace App\Controller;

use App\Utils\View;
use App\Services\APIGemini;

class Home extends AbstractController
{
    public static function index()
    {
        $api = new APIGemini();


        $prompt = <<<'PROMPT'
Forneça exatamente 6 sugestões detalhadas de reciclagem no formato de "Dica do Dia". Cada sugestão deve ser um objeto JSON com duas propriedades:

1. "titulo": um título curto, objetivo e chamativo (até 6 palavras).  
2. "descricao": uma explicação prática com no máximo três frases, fornecendo contexto e passo a passo sucinto.

Retorne apenas um array JSON contendo esses objetos, sem blocos de código (```), sem markdown, sem texto extra e sem comentários.  
Exemplo de saída:

[
  {
    "titulo": "Lave e seque plásticos",
    "descricao": "Antes de descartar, enxágue restos de alimento e deixe suas embalagens plásticas secarem para evitar contaminação dos recicláveis."
  },
  {
    "titulo": "Óleo de cozinha pode virar sabão!",
    "descricao": "Não jogue óleo usado no ralo! Armazene em garrafa PET e doe para projetos que transformam em sabão ou biodiesel."
  }
]
PROMPT;


        // 1) Chama o Gemini
        $raw = $api->Ask($prompt)['Resposta'] ?? '';
        // 2) Limpa markdown e faz decode
        $json = str_replace(['```json', '```'], '', $raw);
        $arr = json_decode(trim($json), true);

        // 3) Fallback mínimo
        if (!is_array($arr) || count($arr) === 0) {
            $arr = [
                [
                    'titulo' => 'Lave e seque plásticos',
                    'descricao' => 'Enxágue restos de alimento e deixe secar antes de descartar.'
                ]
            ];
        }

        // 4) Escolhe um item aleatório
        if (isset($arr[0]) && is_array($arr[0])) {
            $item = $arr[array_rand($arr)];
            $titulo = $item['titulo'];
            $descricao = $item['descricao'];
        } else {
            $titulo = 'Dica do Dia';
            $descricao = 'Cada gesto importa: recicle e preserve o futuro.';
        }

        // 5) Prepara dados para a view
        $data = [
            'texto' => 'A Ecogestor é uma empresa comprometida com o futuro do planeta...',
            'DICA_TITULO' => $titulo,
            'DICA_DESCRICAO' => $descricao
        ];

        $conteudo = View::render('home', $data);
        return self::getBase('Home', $conteudo);
    }
}
