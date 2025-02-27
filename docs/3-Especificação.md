
# 3. Especificações do Projeto

<span style="color:red">Pré-requisitos: <a href="2-Planejamento-Projeto.md"> Planejamento do Projeto do Software (Cronograma) </a></span>

> Definição do problema e ideia de solução a partir da perspectiva do usuário. É composta pela definição das histórias de usuários, dos requisitos funcionais e não funcionais além das restrições do projeto.

> Apresente uma visão geral do que será abordado nesta parte do documento, enumerando as técnicas e/ou ferramentas utilizadas para realizar a especificações do projeto

## 3.1 Classificação dos Requisitos Funcionais x Requisitos não Funcionais 

> Com base nas Histórias de Usuário, enumere os requisitos da sua solução. Classifique esses requisitos em dois grupos:

> - **[Requisitos Funcionais (RF)]**(https://pt.wikipedia.org/wiki/Requisito_funcional): correspondem a uma funcionalidade que deve estar presente na
  plataforma (ex: cadastro de usuário).
> - **[Requisitos Não Funcionais (RNF)]**(https://pt.wikipedia.org/wiki/Requisito_n%C3%A3o_funcional):
  correspondem a uma característica técnica, seja de usabilidade, desempenho, confiabilidade, segurança ou outro (ex: suporte a
  dispositivos iOS e Android).

> Lembre-se que cada requisito deve corresponder à uma e somente uma característica alvo da sua solução. Além disso, certifique-se de que
todos os aspectos capturados nas Histórias de Usuário foram cobertos.


### a) Modifique os quadros abaixo, inserindo os Requisitos Funcionais e Não Funcionais do seu projeto. 

Lembre-se de classificá-los de acordo com a prioridade: ALTA, MÉDIA ou BAIXA.

### Requisitos Funcionais

|ID    | Descrição do Requisito                  | Prioridade |
|------|-----------------------------------------|------------|
|RF-001| O portal deve exibir cards clicáveis que enviam prompts pré-definidos diretamente para a IA Gemini. |    MÉDIA    | 
|RF-002| O sistema deve permitir que o usuário envie perguntas personalizadas para a IA através de um campo de texto.   |    MÉDIA   |
|RF-003| O portal deve exibir respostas da IA em tempo real na própria página.   |    ALTA   |
|RF-004| Deve haver uma seção com informações sobre reciclagem e compostagem que são geradas automaticamente ao entrar na página.  |    ALTA   |


### Requisitos não Funcionais

|ID     | Descrição do Requisito                                            |Prioridade |
|-------|-------------------------------------------------------------------|-----------|
|RNF-001| O sistema deve ser responsivo para dispositivos móveis e desktop |    BAIXA  | 
|RNF-002| A interface deve ser simples, intuitiva e acessível para todos os públicos.  |    ALTA  | 



### b) Modifique o Quadro abaixo e insira as Restrições para o seu projeto.

O projeto está restrito pelos itens apresentados na tabela a seguir.

## Restrições

|ID| Restrição                                               |
|--|---------------------------------------------------------|
|01| O sistema não deve utilizar banco de dados para armazenamento de informações.     |
|02| O sistema não deve exigir nenhum tipo de autenticação ou cadastro do usuário.|
|03| O sistema não deve armazenar ou processar dados pessoais dos usuários.|
|04| O sistema deve funcionar em navegadores modernos (Chrome, Firefox, Edge e Safari).|

**Enumere as restrições à sua solução. Lembre-se de que as restrições geralmente limitam a solução candidata.**

> **Links Úteis**:
> - [O que são Requisitos Funcionais e Requisitos Não Funcionais?](https://codificar.com.br/requisitos-funcionais-nao-funcionais/)
> - [O que são requisitos funcionais e requisitos não funcionais?](https://analisederequisitos.com.br/requisitos-funcionais-e-requisitos-nao-funcionais-o-que-sao/)



## 3.2 Histórias de Usuários
> Apresente aqui as histórias de usuário que são RELEVANTES para o projeto de sua solução. É esperado que haja pelo menos 10 histórias de usuário, dependendo do projeto escolhido para desenvolver.

**OBS:** Se possível, agrupe as histórias de usuário por contexto, para facilitar consultas recorrentes à essa parte do documento.

### a) Modifique o Quadro abaixo e insira as histórias de usuários para o seu projeto.

|EU COMO... `PERSONA`| QUERO/PRECISO ... `FUNCIONALIDADE` |PARA ... `MOTIVO/VALOR`                 |
|--------------------|------------------------------------|----------------------------------------|
|Usuário do sistema  | Registrar minhas tarefas           | Não esquecer de fazê-las               |
|Administrador       | Alterar permissões                 | Permitir que possam administrar contas |
|  xxxx              | Registrar minhas tarefas           | Não esquecer de fazê-las               |
|  yyy               | Alterar permissões                 | Permitir que possam administrar contas |




> **Links Úteis**:
> - [Histórias de usuários com exemplos e template](https://www.atlassian.com/br/agile/project-management/user-stories)
> - [Como escrever boas histórias de usuário (User Stories)](https://medium.com/vertice/como-escrever-boas-users-stories-hist%C3%B3rias-de-usu%C3%A1rios-b29c75043fac)
> - [User Stories: requisitos que humanos entendem](https://www.luiztools.com.br/post/user-stories-descricao-de-requisitos-que-humanos-entendem/)
> - [Histórias de Usuários: mais exemplos](https://www.reqview.com/doc/user-stories-example.html)
> - [9 Common User Story Mistakes](https://airfocus.com/blog/user-story-mistakes/)


-------------------------------------------------------------------------------------------------------------------------------------------

## Tarefas Técnicas (Tasks)

Cada história do usuário é dividida em tarefas específicas para implementação, confome o exemplo abaixo:

## História de Usuário: 
                     Como cliente, eu quero fazer login no sistema para acessar meu perfil.

## As tarefas técnicas referente a história podem ser:
                   Criar a interface de login: Implementar a página com os campos de nome de usuário e senha.
                   Criar validação de entradas: Implementar a verificação de que o usuário inseriu o nome e a senha corretos.
                   Tratar erros de login: Implementar a lógica que exibe mensagens de erro caso nome e senha incorretos.





> **Links Úteis**:
> - [O que são Requisitos Funcionais e Requisitos Não Funcionais?](https://codificar.com.br/requisitos-funcionais-nao-funcionais/)
> - [O que são requisitos funcionais e requisitos não funcionais?](https://analisederequisitos.com.br/requisitos-funcionais-e-requisitos-nao-funcionais-o-que-sao/)
