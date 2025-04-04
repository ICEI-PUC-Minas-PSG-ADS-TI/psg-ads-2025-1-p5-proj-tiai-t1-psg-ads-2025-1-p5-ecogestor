## 4. Projeto da Solução

<span style="color:red">Pré-requisitos: <a href="03-Modelagem do Processo de Negocio.md"> Modelagem do Processo de Negocio</a></span>

## 4.1. Arquitetura da solução

### Camadas da Arquitetura:

- Frontend:
  O frontend é responsável pela interface gráfica do usuário e a interação com o sistema. Ele inclui:
  - HTML para a estrutura das páginas.
  - CSS e Bootstrap para estilização e design responsivo.
  - JavaScript para interatividade e manipulação do DOM.
    
- Backend:
  O backend gerencia a lógica da aplicação, manipulação de dados e integração com APIs externas. Ele inclui:
  - PHP como linguagem principal, seguindo o padrão MVC para organizar a aplicação.
  - Manipulação de rotas para definir quais controladores e métodos serão executados em cada requisição.
  - Integração com APIs como a API Gemini para IA e a API News para notícias.

Geração dinâmica de páginas através de templates. 
 
 **Exemplo do diagrama de Arquitetura**:
 
 ![Exemplo de Arquitetura](./images/arquitetura-exemplo.png)
 

### 4.2. Protótipos de telas

Visão geral da interação do usuário pelas telas do sistema e protótipo interativo das telas com as funcionalidades que fazem parte do sistema (wireframes).
Apresente as principais interfaces da plataforma. Discuta como ela foi elaborada de forma a atender os requisitos funcionais, não funcionais e histórias de usuário abordados nas <a href="02-Especificação do Projeto.md"> Especificação do Projeto</a>.
A partir das atividades de usuário identificadas na seção anterior, elabore o protótipo de tela de cada uma delas.
![Exemplo de Wireframe](images/wireframe-example.png)

São protótipos usados em design de interface para sugerir a estrutura de um site web e seu relacionamentos entre suas páginas. Um wireframe web é uma ilustração semelhante do layout de elementos fundamentais na interface.
 
> **Links Úteis**:
> - [Protótipos vs Wireframes](https://www.nngroup.com/videos/prototypes-vs-wireframes-ux-projects/)
> - [Ferramentas de Wireframes](https://rockcontent.com/blog/wireframes/)
> - [MarvelApp](https://marvelapp.com/developers/documentation/tutorials/)
> - [Figma](https://www.figma.com/)
> - [Adobe XD](https://www.adobe.com/br/products/xd.html#scroll)
> - [Axure](https://www.axure.com/edu) (Licença Educacional)
> - [InvisionApp](https://www.invisionapp.com/) (Licença Educacional)


## Diagrama de Classes

![image](https://github.com/user-attachments/assets/119edf7c-54ca-4e90-af99-25fe00425790)

### 4.3. Modelo de dados

Não será utilizado no projeto um banco de dados, pois o projeto não necessita de guardar qualquer informação devido a utilização de APIs para compor as informações disponibilizadas no portal. Será utilizado API de noticias e a API do Gemini.

### 4.4. Tecnologias

_Descreva qual(is) tecnologias você vai usar para resolver o seu problema, ou seja, implementar a sua solução. Liste todas as tecnologias envolvidas, linguagens a serem utilizadas, serviços web, frameworks, bibliotecas, IDEs de desenvolvimento, e ferramentas._

Apresente também uma figura explicando como as tecnologias estão relacionadas ou como uma interação do usuário com o sistema vai ser conduzida, por onde ela passa até retornar uma resposta ao usuário.


| **Dimensão**   | **Tecnologia**  |
| ---            | ---             |
| Front end      | HTML+CSS+JS+Bootstrap    |
| Back end       | PHP, Biblioteca Guzzle |
| Deploy         | Github Pages    |
| IDE            | Visual Studio Code |
| APIs           | API de Notícias, API do Gemini |



