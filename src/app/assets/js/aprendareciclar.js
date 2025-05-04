/**
 * Autor: Bernardo Oliveira
 */
const aprendaReciclar = (function(){

    var modalValidacao;
    
    var init = () => {

        let conteudoValidacao = 'Você deve informar um objeto primeiro';
        modalValidacao = Utils.modal('modalValidacao', conteudoValidacao, 'Objeto Inválido');    
        $('#listaModal').html(modalValidacao);
        modalValidacao = new bootstrap.Modal(document.getElementById('modalValidacao'));

    }

    var buscaResposta = () => {
        $('#pesquisar').on('click', function(){

            let objeto = $('#inputPesquisa').val();
            if(objeto == ''){
                modalValidacao.show();
                return false;
            }

            $.ajax({
                url: '/eco-gestor/src/aprendareciclar/comoreciclar', 
                type: 'POST',
                data: {
                    nomeObjeto: objeto
                },
                success: function(data) {
                    let json = JSON.parse(data);
                    let cards = montaCards(json);

                  $('#divResposta').html(cards);
                  $('#divResposta')[0].scrollIntoView({ behavior: 'smooth' });
                },
                error: function(xhr, status, erro) {
                  console.error('Erro na requisição:', erro);
                }
              });

        })
    }
    var montaCards = (conteudo) => {
        let cards = ``;
        $.each(conteudo, function(chave, valor) {
            cards += 
            `<div class="card col-10 mb-2">
                <div class="card-body">
                    <h5 class="card-title">Passo ${valor.idPasso}</h5>
                    <p class="card-text">${valor.descricao}</p>
                </div>
            </div>`;
          });
          
        
        return cards;
    }

    var bindEvents = () => {
        init();
        buscaResposta();
    }

    return {
        bindEvents: bindEvents
    }
})()

$(document).ready(function() {
    aprendaReciclar.bindEvents();
})