<?php 

namespace App\Controller;

use \App\Utils\View;

class Sobre extends AbstractController{

    public static function index(){
        $data = [];
        try {
                        
            $data = [
                'titulo' => 'Sobre nós',
                'descricao1' => 'O EcoGestor nasceu com a missão de transformar a maneira como empresas e condomínios lidam com seus resíduos sólidos. Sabemos que o descarte incorreto de materiais é um dos grandes desafios ambientais da atualidade, e por isso desenvolvemos uma plataforma que vai além das instruções tradicionais.',
                'descricao2' => 'Nosso sistema oferece informações claras e práticas sobre reciclagem e compostagem, além de fornecer dicas personalizadas com o apoio da inteligência artificial Gemini. Essa integração com IA permite que os usuários tirem dúvidas em tempo real e recebam sugestões conforme sua realidade, promovendo mudanças conscientes no dia a dia.',
                'descricao3' => 'Acreditamos que a sustentabilidade começa com pequenas atitudes — e nossa proposta é tornar essas atitudes mais fáceis e acessíveis para todos. Com uma interface intuitiva e conteúdo educativo, o EcoGestor é voltado tanto para gestores quanto para moradores e funcionários, apoiando iniciativas sustentáveis em todos os níveis.',
                'descricao4' => 'Nosso compromisso é claro: contribuir para um futuro mais limpo, consciente e responsável.',
            ];
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        $conteudo = View::render('sobre', $data);

        //parametros(tituloPag, conteudo)
        return self::getBase('Sobre', $conteudo);

    }



}