import {
    beneficiarioBox,
    buttonIdentification,
    optionalInputs,
    matriculaInput,
    token,
    beneficiariosSelect,
} from "./selectors.js";

function getBeneficiarios() {
    const matricula = this.value;
    buttonIdentification.disabled = true;
    buttonIdentification.classList.add("form__input-button--disabled");

    if (matricula) {
        optionalInputs.forEach((option) => {
            option.style.display = "none";
        });

        const message = document.createElement("p");
        message.textContent = "Espere...";
        message.classList.add("textMessage");
        matriculaInput.after(message);

        const xhr = new XMLHttpRequest();

        const data = new FormData();

        data.append("type", "obtenerBeneficiarios");
        data.append("matricula", matricula);

        xhr.open("POST", `/clpersonal/ajax?_token=${token.value}`, true);

        xhr.onload = function () {
            if (this.status === 200) {
                const response = JSON.parse(xhr.responseText);

                if (response.status === "correct") {
                    message.remove();
                    beneficiarioBox.style.display = "flex";

                    const optionsList =
                        document.querySelectorAll(".optionList");

                    optionsList.forEach((option) => {
                        option.remove();
                    });

                    for (let i = 0; i < response.no_beneficiarios; i++) {
                        let optionElement = document.createElement("option");
                        optionElement.value = i;
                        optionElement.textContent = i;
                        optionElement.classList.add("optionList");
                        beneficiariosSelect.appendChild(optionElement);
                    }
                } else {
                    message.textContent = `${response.text}`;

                    setTimeout(() => {
                        message.remove();
                    }, 3000);
                }
            }
        };

        xhr.send(data);
    }
}

export default getBeneficiarios;
