/**
 * Autor: Bernardo Oliveira e Arthur
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
        $('#formPesquisa').on('submit', function(e){
            e.preventDefault();
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
                },beforeSend: function(){
                    Utils.mostrarLoading('#divResposta');
                    $('#divResposta')[0].scrollIntoView({ behavior: 'smooth' });
                },
                success: function(data) {
                    let json = JSON.parse(data);
                    console.log(data)
                    let cards = montaCards(json);
                    Utils.removerLoading('#divResposta');

                $('#divResposta').html(cards + gerarBotaoExportarPDF());
                $('#divResposta')[0].scrollIntoView({ behavior: 'smooth' });

                $('#exportarPDF').on('click', function() {
                    exportarParaPDF();
                });
            },
                error: function(xhr, status, erro) {
                    $('#divResposta').html(`<div class="text-center col-10 mb-2">
                                                Houve um erro ao processar sua requisição, tente novamente mais tarde!
                                            </div>`);
                    $('#divResposta')[0].scrollIntoView({ behavior: 'smooth' });
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

var gerarBotaoExportarPDF = () => {
    return `
        <div class="text-center col-10 mt-3">
            <button id="exportarPDF" class="btn btn-danger">
                Exportar Dicas para PDF
            </button>
        </div>
    `;
}

var exportarParaPDF = () => {
    const { jsPDF } = window.jspdf;
    const elemento = document.getElementById('divResposta');
    const botao = document.getElementById('exportarPDF');

    // Logo da empresa
    const logoImg = new Image();
    logoImg.src = 'app/assets/images/logo-ecogestor.png';

    botao.style.display = 'none'; 

    logoImg.onload = function () {
        html2canvas(elemento).then(canvas => {
            const imgData = canvas.toDataURL('image/png');

            const pdfWidth = canvas.width / 3.78;
            const pdfHeight = canvas.height / 3.78;

            const pdf = new jsPDF('p', 'mm', [pdfWidth, pdfHeight + 60]); // altura extra para cabeçalho

            // Inserir logo
            pdf.addImage(logoImg, 'PNG', 10, 10, 20, 20);

            // Cabeçalho
            pdf.setFont("helvetica", "bold");
            pdf.setFontSize(18);
            pdf.text("Guia de Reciclagem", pdfWidth / 2, 20, { align: "center" });

            pdf.setFont("helvetica", "normal");
            pdf.setFontSize(12);
            pdf.text("Dicas para descartar corretamente seus resíduos", pdfWidth / 2, 28, { align: "center" });

            const margemSuperior = 40;
            pdf.addImage(imgData, 'PNG', 0, margemSuperior, pdfWidth, pdfHeight);

            pdf.save("dicas-reciclagem.pdf");

            botao.style.display = 'inline-block'; 
        });
    };
}

