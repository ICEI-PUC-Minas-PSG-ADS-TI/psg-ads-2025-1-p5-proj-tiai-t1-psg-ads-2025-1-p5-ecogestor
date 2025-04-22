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

#### Diagrama de Arquitetura:

![diagrama_arquitetura_ecogestor](https://github.com/user-attachments/assets/af963666-270a-4213-a517-0e7568d819ef)

### 4.2. Protótipos de telas

#### Home:

![image](https://github.com/user-attachments/assets/1b0f3559-12b9-4113-b1d7-f8e7cb27ccff)

#### Noticias:

![image](https://github.com/user-attachments/assets/75281aae-fd08-415b-9b9e-d1e407dee06e)

#### Modal ao clicar em uma noticia:

![image](https://github.com/user-attachments/assets/40c52451-0b9e-4c19-b04f-a3267aaf0fe6)

#### Aprenda a reclicar:

![image](https://github.com/user-attachments/assets/d60356e9-8d3f-41c5-ba04-975c59df28fe)

##### Após pesquisar:

![image](https://github.com/user-attachments/assets/55c94931-4dcb-4983-b0f8-21955a349bf2)

#### Sobre:

![image](https://github.com/user-attachments/assets/2b2cb874-caac-4c89-a7e0-870b6d38f73c)

## Diagrama de Classes

![image](https://github.com/user-attachments/assets/119edf7c-54ca-4e90-af99-25fe00425790)

### 4.3. Modelo de dados

Não será utilizado no projeto um banco de dados, pois o projeto não necessita de guardar qualquer informação devido a utilização de APIs para compor as informações disponibilizadas no portal. Será utilizado API de noticias e a API do Gemini.

### 4.4. Tecnologias

| **Dimensão**   | **Tecnologia**  |
| ---            | ---             |
| Front end      | HTML+CSS+JS+Bootstrap    |
| Back end       | PHP, Biblioteca Guzzle |
| Deploy         | Github Pages    |
| IDE            | Visual Studio Code |
| APIs           | API de Notícias, API do Gemini |

#### Diagrama de Tecnologias

![diagrama_tecnologias_ecogestor_2](https://github.com/user-attachments/assets/281d9953-620f-4967-857b-1e54ea974d95)




