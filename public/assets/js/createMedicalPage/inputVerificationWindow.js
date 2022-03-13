import {
    circunferenciaInput,
    buttonFisicoWindow,
    temperaturaInput,
    buttonSaludWindow,
    discapacidadInput,
    buttonSendForm,
} from "./selectors.js";

export function verifyWindowFisico() {
    if (circunferenciaInput.value) {
        buttonFisicoWindow.disabled = false;
        buttonFisicoWindow.classList.remove("form__input-button--disabled");
    } else {
        buttonFisicoWindow.disabled = true;
        buttonFisicoWindow.classList.add("form__input-button--disabled");
    }
}

export function verifyWindowSalud() {
    if (temperaturaInput.value) {
        buttonSaludWindow.disabled = false;
        buttonSaludWindow.classList.remove("form__input-button--disabled");
    } else {
        buttonSaludWindow.disabled = true;
        buttonSaludWindow.classList.add("form__input-button--disabled");
    }
}

export function verifyWindowRegister() {
    if (discapacidadInput.value) {
        buttonSendForm.disabled = false;
        buttonSendForm.classList.remove("form__input-button--disabled");
    } else {
        buttonSendForm.disabled = true;
        buttonSendForm.classList.add("form__input-button--disabled");
    }
}
