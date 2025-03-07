# 3. Especificações do Projeto

<span style="color:red"><a href="2-Planejamento-Projeto.md"> Planejamento do Projeto do Software (Cronograma) </a></span>

> Definição do problema e ideia de solução a partir da perspectiva do usuário. É composta pela definição das histórias de usuários, dos requisitos funcionais e não funcionais além das restrições do projeto.

> Apresente uma visão geral do que será abordado nesta parte do documento, enumerando as técnicas e/ou ferramentas utilizadas para realizar a especificação do projeto.

## 3.1 Classificação dos Requisitos Funcionais x Requisitos Não Funcionais

> Com base nas Histórias de Usuário, enumere os requisitos da sua solução. Classifique esses requisitos em dois grupos:

> - **[Requisitos Funcionais (RF)]**(https://pt.wikipedia.org/wiki/Requisito_funcional): correspondem a uma funcionalidade que deve estar presente na
  plataforma (ex: cadastro de usuário).
> - **[Requisitos Não Funcionais (RNF)]**(https://pt.wikipedia.org/wiki/Requisito_n%C3%A3o_funcional):
  correspondem a uma característica técnica, seja de usabilidade, desempenho, confiabilidade, segurança ou outro (ex: suporte a
  dispositivos iOS e Android).

### Requisitos Funcionais

| ID    | Descrição do Requisito                  | Prioridade |
|------|-----------------------------------------|------------|
|RF-001| O portal deve exibir cards clicáveis que enviam prompts pré-definidos diretamente para a IA Gemini. |    MÉDIA    |
|RF-002| O sistema deve permitir que o usuário envie perguntas personalizadas para a IA através de um campo de texto.   |    MÉDIA   |
|RF-003| O portal deve exibir respostas da IA em tempo real na própria página.   |    ALTA   |
|RF-004| Deve haver uma seção com informações sobre reciclagem e compostagem que são geradas automaticamente ao entrar na página.  |    ALTA   |
|RF-005| O portal deve exibir noticias reais que não são geradas por IA.  |  MEDIA  |

### Requisitos não Funcionais

| ID     | Descrição do Requisito                                            | Prioridade |
|-------|-------------------------------------------------------------------|-----------|
|RNF-001| O sistema deve ser responsivo para dispositivos móveis e desktop. |    BAIXA  |
|RNF-002| A interface deve ser simples, intuitiva e acessível para todos os públicos.  |    ALTA  |

### Restrições

| ID | Restrição                                               |
|--|---------------------------------------------------------|
|01| O sistema não deve utilizar banco de dados para armazenamento de informações.     |
|02| O sistema não deve exigir nenhum tipo de autenticação ou cadastro do usuário.|
|03| O sistema não deve armazenar ou processar dados pessoais dos usuários.|
|04| O sistema deve funcionar em navegadores modernos (Chrome, Firefox, Edge e Safari).|

## 3.2 Histórias de Usuários

> Apresente aqui as histórias de usuário que são RELEVANTES para o projeto de sua solução. É esperado que haja pelo menos 10 histórias de usuário, dependendo do projeto escolhido para desenvolver.

### Histórias de Usuário

| EU COMO... `PERSONA` | QUERO/PRECISO ... `FUNCIONALIDADE` | PARA ... `MOTIVO/VALOR` |
|--------------------|------------------------------------|----------------------------------------|
| Usuário do sistema  | Acessar informações sobre reciclagem e compostagem  | Melhorar minha separação de resíduos  |
| Usuário do sistema  | Enviar perguntas personalizadas para a IA | Esclarecer dúvidas específicas sobre reciclagem  |
| Administrador do site | Criar novos cards de informações | Atualizar o conteúdo conforme necessidade  |
| Usuário do sistema  | Receber respostas da IA em tempo real | Ter informações rápidas e precisas sobre resíduos |
| Usuário do sistema  | Acessar o site em qualquer dispositivo | Ter praticidade no uso |

## Tarefas Técnicas (Tasks)

Cada história do usuário é dividida em tarefas específicas para implementação:

### História de Usuário:
**Como usuário, quero acessar informações sobre reciclagem e compostagem para melhorar minha separação de resíduos.**

#### Tarefas Técnicas:
- Criar interface da seção de informações sobre reciclagem e compostagem.
- Implementar carregamento automático de informações ao acessar a página.
- Integrar com IA Gemini para fornecer sugestões adicionais.

### História de Usuário:
**Como usuário, quero enviar perguntas personalizadas para IA para esclarecer dúvidas específicas sobre reciclagem.**

#### Tarefas Técnicas:
- Criar interface da seção onde terá o chat específico.
- Criar um prompt que bloqueia qualquer interação que não tenha haver com reciclagem e compostagem.
