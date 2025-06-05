<?php 

namespace App\Controller;

use \App\Utils\View;

class Sobre extends AbstractController{

    public static function index(){
        $data = [];
        try {
                        
            $data = [
                'titulo' => 'Sobre nós',
                'descricao1' => 'O <strong>EcoGestor</strong> é uma plataforma criada para revolucionar a forma como organizações e comunidades lidam com seus resíduos sólidos. Mais do que uma ferramenta de gestão, o EcoGestor é um aliado no processo de transformação cultural e ambiental, voltado especialmente para empresas, condomínios residenciais, gestores, moradores e funcionários que buscam integrar práticas sustentáveis ao seu dia a dia.',
                'descricao2' => 'O projeto nasceu do entendimento de que o descarte inadequado de resíduos é um dos maiores desafios ambientais enfrentados pelas cidades modernas. Em condomínios, por exemplo, a alta geração de lixo combinada com a falta de orientação prática sobre reciclagem e compostagem torna a gestão de resíduos um problema recorrente. Já no setor corporativo, muitas vezes falta tempo e estrutura para implementar ações ecológicas eficazes. O EcoGestor surge justamente para preencher essa lacuna, tornando o processo mais eficiente, educativo e acessível.',
                'descricao3' => 'A plataforma oferece conteúdos claros, didáticos e atualizados sobre separação correta de materiais, reaproveitamento, compostagem e economia circular. Por meio de uma interface intuitiva, qualquer usuário — seja ele um síndico, colaborador da limpeza, morador ou gerente ambiental — pode acessar informações e dicas úteis que se aplicam diretamente à sua realidade.',
                'descricao4' => 'Um dos grandes diferenciais do EcoGestor é a <strong>integração com a inteligência artificial Gemini</strong>, que permite que os usuários tirem dúvidas em tempo real e recebam orientações personalizadas com base nas suas necessidades e no tipo de resíduo gerado. Com isso, promovemos autonomia, agilidade e mais consciência no processo de tomada de decisões relacionadas ao meio ambiente.',
                'descricao5' => 'O sistema também funciona como um canal de engajamento e aprendizado, promovendo a educação ambiental de forma leve, prática e contínua. Acreditamos que a mudança começa com o conhecimento — e é por isso que investimos em uma experiência simples, fluida e capaz de alcançar tanto grandes empresas quanto comunidades residenciais.',
                'descricao6' => 'O EcoGestor foi pensado para ser uma ponte entre a tecnologia e a sustentabilidade. Nossa proposta é clara: <strong>tornar as boas práticas ambientais acessíveis, aplicáveis e impactantes.</strong> Por isso, acompanhamos de perto as tendências do setor, ouvimos nossos usuários e evoluímos continuamente para entregar uma solução que seja ao mesmo tempo funcional, educativa e transformadora.',
                'descricao7' => 'Convidamos você a fazer parte dessa jornada. Com pequenas atitudes no presente, estamos moldando um futuro mais limpo, consciente e responsável — juntos.',
            ];
            
        } catch (\Throwable $th) {
            echo($th->getMessage());
        }
        $conteudo = View::render('sobre', $data);

        //parametros(tituloPag, conteudo)
        return self::getBase('Sobre', $conteudo);

    }



}