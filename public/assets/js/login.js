import {
    formularioLogin,
    token,
    matriculaInput,
    passwordInput,
    tipoUsuarioInput,
} from "./selectors.js";

window.onload = () => {
    formularioLogin.addEventListener("submit", userCheck);
};

function userCheck(e) {
    e.preventDefault();

    const matricula = matriculaInput.value;
    const password = passwordInput.value;
    const tipoUsuario = tipoUsuarioInput.value;

    if (matricula === "" || password === "" || tipoUsuario === "") {
        swal({
            type: "error",
            title: "Error!",
            text: "Ingrese todos los datos",
        });
    } else {
        const xhr = new XMLHttpRequest();

        const data = new FormData();

        data.append("matricula", matricula);
        data.append("password", password);
        data.append("tipoUsuario", tipoUsuario);

        xhr.open("POST", `/clpersonal/login?_token=${token}`, true);

        xhr.onload = function () {
            if (this.status === 200) {
                const response = JSON.parse(xhr.responseText);

                if (response.status === "correct") {
                    swal({
                        type: "success",
                        title: `${response.title}`,
                        text: `${response.text}`,
                    }).then((resultado) => {
                        if (resultado.value) {
                            window.location.href = "/medical_history/create";
                        }
                    });
                } else {
                    swal({
                        type: "error",
                        title: `${response.title}`,
                        text: `${response.text}`,
                    });
                }
            }
        };

        xhr.send(data);
    }
}
