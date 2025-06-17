<?php 

namespace App\Controller;

use \App\Utils\View;
use \App\Services\APINews;
use \App\Services\APIGemini;

class Home extends AbstractController
{
    public static function index()
    {
        $api = new APIGemini();

        // Sorteia tipo de mensagem
        $modo = rand(0, 1);

        if ($modo === 0) {
            $prompt = <<<'PROMPT'
Forneça exatamente 8 dicas curtas, objetivas e práticas de reciclagem (máx. duas frases cada). Retorne apenas um array JSON puro com essas dicas, sem blocos de código, sem markdown e sem texto extra.
Exemplo:
[
  "Lave e seque embalagens plásticas antes de descartá-las.",
  "Dobre caixas de papelão para otimizar espaço no coletor.",
  "…"
]
PROMPT;
        } else {
            $prompt = <<<'PROMPT'
Forneça exatamente 5 mensagens motivacionais curtas (máx. duas frases cada) que incentivem a reciclagem e a conscientização ambiental. Retorne apenas um array JSON puro com essas frases, sem blocos de código, sem markdown e sem texto extra.
Exemplo:
[
  "Cada pequena ação conta: recicle hoje e cuide do amanhã.",
  "Separar seu lixo é um gesto de amor pelo planeta.",
  "…"
]
PROMPT;
        }

        $raw  = $api->Ask($prompt)['Resposta'] ?? '';
        $json = str_replace(['```json','```'], '', $raw);
        $arr  = json_decode(trim($json), true);

        if (!is_array($arr) || count($arr) === 0) {
            $arr = $modo === 0
                ? ['Lave e seque embalagens antes de reciclar.']
                : ['Cada gesto importa: recicle e preserve o futuro.'];
        }

        // Escolhe mensagem do array
        $mensagem = $arr[array_rand($arr)];

        $data = [
            'texto'    => 'A Ecogestor é uma empresa …',
            'DICA_DIA' => $mensagem
        ];

        $conteudo = View::render('home', $data);
        return self::getBase('Home', $conteudo);
    }
}