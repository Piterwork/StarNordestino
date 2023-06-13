// Selecionamento dos buttons para funcionar a tag: <dialog>
const OpenSobreNos = document.querySelector("#button-open-sobre-nos");

const DialogSobreNos = document.querySelector("#dialog-sobre-nos");

const ButtonCloseSobreNos = document.querySelector("#button-close-sobre-nos");

OpenSobreNos.onclick = function () {
    DialogSobreNos.showModal()
}

ButtonCloseSobreNos.onclick = function () {
    DialogSobreNos.close()
}

const OpenContato = document.querySelector("#button-open-contato");

const DialogContato = document.querySelector("#dialog-contato");

const ButtonCloseContato = document.querySelector("#button-close-contato");

OpenContato.onclick = function () {
    DialogContato.showModal()
}

ButtonCloseContato.onclick = function () {
    DialogContato.close()
}

const OpenPoliticaPrivacidade = document.querySelector("#button-open-politica-privacidade");

const DialogPoliticaPrivacidade = document.querySelector("#dialog-politica-privacidade");

const ButtonClosePoliticaPrivacidade = document.querySelector("#button-close-politica-privacidade");

OpenPoliticaPrivacidade.onclick = function () {
    DialogPoliticaPrivacidade.showModal()
}

ButtonClosePoliticaPrivacidade.onclick = function () {
    DialogPoliticaPrivacidade.close()
}