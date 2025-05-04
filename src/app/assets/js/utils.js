/**
 * Autor: Bernardo Oliveira
 * Descrição: Arquivo de utilidades geral que estara disponível em todo sistema
 */
const Utils = (function(){

    var init = () => {
    }

    var modal = (idModal, conteudo, tituloModal = "Mensagem do Sistema", nomeBotaoFechar = "Fechar", possuiBotaoAcao = false, nomeBotaoAcao = "Salvar") => {
        
        var acao = '';
        
        if (possuiBotaoAcao) {
            acao = `<button type="button" id="${idModal}Acao" class="btn btn-primary">${nomeBotaoAcao}</button>`;
        }

        let modal = 
        `<div class="modal fade" id="${idModal}" tabindex="-1" aria-labelledby="${idModal}Label" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="${idModal}Label">${tituloModal}</h1>
                </div>
                <div class="modal-body">
                    ${conteudo}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">${nomeBotaoFechar}</button>
                ${acao}
                </div>
            </div>
            </div>
        </div>`;

        return modal;
    }

    // Aqui ficam as funções carregadas ao carregar a tela
    var bindEvents = () => {
        init();
    }

    // Aqui ficam as funções que são chamadas externamente em outros arquivos js
    return {
        bindEvents: bindEvents,
        modal: modal
    }
})()

$(document).ready(function() {
    Utils.bindEvents();
})