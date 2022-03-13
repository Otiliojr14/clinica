import {
    token,
    matriculaInput,
    beneficiariosSelect,
    optionalInputs,
    nombreBoxText,
    telefonoBoxText,
    relacionBoxText,
    buttonIdentification,
} from "./selectors.js";

function searchPerson() {
    const noBeneficiario = this.value;
    const matricula = matriculaInput.value;

    if (noBeneficiario) {
        const message = document.createElement("p");
        message.textContent = "Espere...";
        message.classList.add("textMessage");
        beneficiariosSelect.after(message);

        const xhr = new XMLHttpRequest();

        const data = new FormData();

        data.append("type", "datosPersona");
        data.append("matricula", matricula);
        data.append("no_beneficiario", noBeneficiario);

        xhr.open("POST", `/clpersonal/ajax?_token=${token.value}`, true);

        xhr.onload = function () {
            if (this.status === 200) {
                message.remove();
                optionalInputs.forEach((option) => {
                    option.style.display = "flex";
                });
                const response = JSON.parse(xhr.responseText);

                nombreBoxText.textContent = response.nombre;
                telefonoBoxText.textContent = response.telefono;
                relacionBoxText.textContent = response.parentesco;

                buttonIdentification.disabled = false;
                buttonIdentification.classList.remove(
                    "form__input-button--disabled"
                );
            }
        };

        xhr.send(data);
    }
}

export default searchPerson;
