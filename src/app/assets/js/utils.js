/**
 * Autor: Bernardo Oliveira
 * Descrição: Arquivo de utilidades geral que estara disponível em todo sistema
 */
const Utils = (function(){


    var init = () => {
        // Carrega tolltips, que são uma melhor alternativa ao atributo tittle que demora a carregar, mostram um balão mais fluido
        // exemplo de como usar: adicione `data-bs-toggle="tooltip" data-bs-title=""` a sua tag e coloque o titulo
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))    
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

    // Cria um loading na div passada pela tag
    // ATENÇÃO: no parametro larguraAuturaEmPX passe um valor de no mínimo 30 e no máximo 1000 para evitar deformações
    var mostrarLoading = (tag, larguraAuturaEmPX = 120, tempoAnimacao = 6.2) => {
        
        let loading = 
        `<div class="container">
            <div class="row justify-content-center">
                <div class="loader col-12" id="loader" style="
                            border: ${larguraAuturaEmPX / 7.5}px solid #efeee8;
                            border-top: ${larguraAuturaEmPX / 7.5}px solid #74c22b;
                            border-radius: 50%;
                            width: ${larguraAuturaEmPX}px;
                            height: ${larguraAuturaEmPX}px;
                            animation: spin ${tempoAnimacao}s linear infinite;
                            ">
                </div>
            </div>
        </div>`;

        $(tag).html(loading);

    }

    // Remove o loading criado na função mostrarLoading
    var removerLoading = () => {

        $("#loader").remove();
    }

    // Aqui ficam as funções carregadas ao carregar a tela
    var bindEvents = () => {
        init();
    }

    // Aqui ficam as funções que são chamadas externamente em outros arquivos js
    return {
        bindEvents: bindEvents,
        modal: modal,
        mostrarLoading: mostrarLoading,
        removerLoading: removerLoading
    }
})()

$(document).ready(function() {
    Utils.bindEvents();
})